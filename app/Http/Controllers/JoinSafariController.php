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
     * No vehicle assignment — participants go into a shared pool.
     * Vehicles auto-expand when total confirmed exceeds open capacity.
     */
    public function join(Request $request, $slug)
    {
        $joinSafari = JoinSafari::where('slug', $slug)
            ->where('is_active', true)
            ->where('status', 'open')
            ->firstOrFail();

        $requestedPeople = (int) $request->input('number_of_people', 1);

        // Check if there's still room (auto-expand always true while open)
        $currentFilled = $joinSafari->spots_filled;
        $openCapacity = $joinSafari->vehicles()->open()->sum('capacity');
        $remainingOpen = max(0, $openCapacity - $currentFilled);

        // Auto-expand: if not enough room, create more vehicles
        $newTotal = $currentFilled + $requestedPeople;
        $totalCapacity = $joinSafari->vehicles()->sum('capacity');

        while ($newTotal > $totalCapacity) {
            $nextNumber = $joinSafari->vehicles()->max('vehicle_number') + 1;
            $joinSafari->vehicles()->create([
                'vehicle_number' => $nextNumber,
                'capacity' => 7,
                'min_required' => $joinSafari->min_participants ?? 5,
                'status' => 'open',
            ]);
            $totalCapacity += 7;
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'country' => 'nullable|string|max:255',
            'number_of_people' => 'required|integer|min:1',
            'special_requests' => 'nullable|string|max:2000',
        ]);

        JoinSafariParticipant::create([
            'join_safari_id' => $joinSafari->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'country' => $validated['country'] ?? null,
            'number_of_people' => $validated['number_of_people'],
            'special_requests' => $validated['special_requests'] ?? null,
            'is_confirmed' => true,
        ]);

        return redirect()->route('join-safari.show', $joinSafari->slug)
            ->with('success', 'You have successfully joined this safari! We will contact you shortly with more details.');
    }
}
