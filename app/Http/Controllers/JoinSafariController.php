<?php

namespace App\Http\Controllers;

use App\Models\JoinSafari;
use App\Models\JoinSafariParticipant;
use Illuminate\Http\Request;

class JoinSafariController extends Controller
{
    /**
     * Display a listing of join safaris.
     */
    public function index()
    {
        $joinSafaris = JoinSafari::open()
            ->withCount('vehicles')
            ->orderBy('start_date')
            ->paginate(12);

        $featured = JoinSafari::open()
            ->featured()
            ->withCount('vehicles')
            ->orderBy('start_date')
            ->take(3)
            ->get();

        return view('join-safari.index', compact('joinSafaris', 'featured'));
    }

    /**
     * Display the specified join safari with join form.
     */
    public function show($slug)
    {
        $joinSafari = JoinSafari::where('slug', $slug)
            ->where('is_active', true)
            ->with(['vehicles' => function ($q) {
                $q->orderBy('vehicle_number');
            }])
            ->firstOrFail();

        return view('join-safari.show', compact('joinSafari'));
    }

    /**
     * Store a new participant joining a safari.
     * Vehicle-aware: assigns to an open vehicle, auto-creates new vehicles when needed,
     * and splits large parties across vehicles if necessary.
     */
    public function join(Request $request, $slug)
    {
        $joinSafari = JoinSafari::where('slug', $slug)
            ->where('is_active', true)
            ->where('status', 'open')
            ->with(['vehicles' => function ($q) {
                $q->orderBy('vehicle_number');
            }])
            ->firstOrFail();

        $requestedPeople = (int) $request->input('number_of_people', 1);

        // Total available seats across all open vehicles
        $totalOpenSeats = $joinSafari->spots_remaining;

        if ($requestedPeople > $totalOpenSeats) {
            return back()->withErrors([
                'number_of_people' => 'Sorry, only ' . $totalOpenSeats . ' total seat(s) remaining across all vehicles.'
            ])->withInput();
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'country' => 'nullable|string|max:255',
            'number_of_people' => 'required|integer|min:1|max:' . $totalOpenSeats,
            'special_requests' => 'nullable|string|max:2000',
        ]);

        $baseData = [
            'join_safari_id' => $joinSafari->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'country' => $validated['country'] ?? null,
            'special_requests' => $validated['special_requests'] ?? null,
            'is_confirmed' => true,
        ];

        $remaining = $requestedPeople;
        $warnings = [];
        $assignmentMessages = [];

        // Get open vehicles, sorted by number
        $openVehicles = $joinSafari->vehicles->where('status', 'open');

        foreach ($openVehicles as $vehicle) {
            if ($remaining <= 0) break;

            $seatsAvailable = $vehicle->seats_available;
            if ($seatsAvailable <= 0) continue;

            $toAssign = min($remaining, $seatsAvailable);

            if ($toAssign > 0) {
                // Create participant record for this vehicle
                JoinSafariParticipant::create(array_merge($baseData, [
                    'number_of_people' => $toAssign,
                    'join_safari_vehicle_id' => $vehicle->id,
                ]));

                $assignmentMessages[] = "{$toAssign} in Vehicle #{$vehicle->vehicle_number}";
                $remaining -= $toAssign;

                // Auto-confirm vehicle if it now meets its minimum
                // Reload to get fresh seat counts
                $vehicle->refresh();
                if ($vehicle->status === 'open' && $vehicle->seats_filled >= $vehicle->min_required) {
                    $vehicle->update(['status' => 'confirmed']);
                }
            }
        }

        // If still remaining people, create new vehicles
        while ($remaining > 0) {
            $nextNumber = $joinSafari->vehicles()->max('vehicle_number') + 1;

            $newVehicle = $joinSafari->vehicles()->create([
                'vehicle_number' => $nextNumber,
                'capacity' => 7,
                'min_required' => $joinSafari->min_participants ?? 5,
                'status' => 'open',
            ]);

            $toAssign = min($remaining, 7);

            JoinSafariParticipant::create(array_merge($baseData, [
                'number_of_people' => $toAssign,
                'join_safari_vehicle_id' => $newVehicle->id,
            ]));

            $assignmentMessages[] = "{$toAssign} in Vehicle #{$newVehicle->vehicle_number} (new)";
            $remaining -= $toAssign;

            if ($toAssign >= ($joinSafari->min_participants ?? 5)) {
                $newVehicle->update(['status' => 'confirmed']);
            }
        }

        // Build warning message if party was split
        if (count($assignmentMessages) > 1) {
            $warnings[] = 'Your party of ' . $requestedPeople . ' was split across vehicles: ' . implode(', ', $assignmentMessages) . '.';
        }

        $message = 'You have successfully joined this safari! ' . implode(' ', $assignmentMessages) . '. We will contact you shortly with more details.';

        if (!empty($warnings)) {
            return redirect()->route('join-safari.show', $joinSafari->slug)
                ->with('success', $message)
                ->with('warning', implode(' ', $warnings));
        }

        return redirect()->route('join-safari.show', $joinSafari->slug)
            ->with('success', $message);
    }
}
