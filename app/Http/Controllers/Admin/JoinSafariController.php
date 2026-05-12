<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JoinSafari;
use App\Models\JoinSafariParticipant;
use App\Models\JoinSafariVehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class JoinSafariController extends Controller
{
    public function index()
    {
        $joinSafaris = JoinSafari::withCount('participants')
            ->orderBy('start_date', 'desc')
            ->paginate(20);
        return view('admin.join-safaris.index', compact('joinSafaris'));
    }

    public function create()
    {
        return view('admin.join-safaris.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'duration' => 'nullable|max:100',
            'location' => 'nullable|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'max_participants' => 'nullable|integer|min:1',
            'min_participants' => 'nullable|integer|min:1',
            'price_per_person' => 'nullable|numeric|min:0',
            'price_label' => 'nullable|max:255',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'highlights' => 'nullable|array',
            'itinerary' => 'nullable|array',
            'inclusions' => 'nullable|array',
            'exclusions' => 'nullable|array',
            'important_notes' => 'nullable',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        // Make slug unique
        $baseSlug = $validated['slug'];
        $counter = 1;
        while (JoinSafari::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $baseSlug . '-' . $counter++;
        }

        if ($request->hasFile('hero_image')) {
            $validated['hero_image'] = $request->file('hero_image')->store('join-safaris', 'public');
        }

        $joinSafari = JoinSafari::create($validated);

        // Auto-create Vehicle #1 with 7 seats
        $joinSafari->vehicles()->create([
            'vehicle_number' => 1,
            'capacity' => 7,
            'min_required' => $validated['min_participants'] ?? 5,
            'status' => 'open',
        ]);

        return redirect()->route('admin.join-safaris.index')
            ->with('success', 'Join Safari created successfully.');
    }

    public function edit(JoinSafari $joinSafari)
    {
        return view('admin.join-safaris.edit', compact('joinSafari'));
    }

    public function update(Request $request, JoinSafari $joinSafari)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'duration' => 'nullable|max:100',
            'location' => 'nullable|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'max_participants' => 'nullable|integer|min:1',
            'min_participants' => 'nullable|integer|min:1',
            'price_per_person' => 'nullable|numeric|min:0',
            'price_label' => 'nullable|max:255',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'highlights' => 'nullable|array',
            'itinerary' => 'nullable|array',
            'inclusions' => 'nullable|array',
            'exclusions' => 'nullable|array',
            'important_notes' => 'nullable',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('hero_image')) {
            if ($joinSafari->hero_image) {
                Storage::disk('public')->delete($joinSafari->hero_image);
            }
            $validated['hero_image'] = $request->file('hero_image')->store('join-safaris', 'public');
        }

        $joinSafari->update($validated);

        return redirect()->route('admin.join-safaris.index')
            ->with('success', 'Join Safari updated successfully.');
    }

    public function show(JoinSafari $joinSafari)
    {
        $joinSafari->load(['vehicles' => function ($q) {
            $q->withCount(['participants', 'confirmedParticipants']);
        }]);
        $participants = $joinSafari->participants()->with('vehicle')->latest()->paginate(20);
        return view('admin.join-safaris.show', compact('joinSafari', 'participants'));
    }

    public function destroy(JoinSafari $joinSafari)
    {
        if ($joinSafari->hero_image) {
            Storage::disk('public')->delete($joinSafari->hero_image);
        }
        $joinSafari->delete();
        return redirect()->route('admin.join-safaris.index')
            ->with('success', 'Join Safari deleted successfully.');
    }

    public function toggleFeatured(JoinSafari $joinSafari)
    {
        $joinSafari->update(['is_featured' => !$joinSafari->is_featured]);
        return back()->with('success', 'Featured status updated.');
    }

    /**
     * Toggle active status.
     */
    public function toggleActive(JoinSafari $joinSafari)
    {
        $joinSafari->update(['is_active' => !$joinSafari->is_active]);
        return back()->with('success', 'Active status updated.');
    }

    /**
     * Update status (open, confirmed, cancelled, completed).
     */
    public function updateStatus(Request $request, JoinSafari $joinSafari)
    {
        $validated = $request->validate([
            'status' => 'required|in:open,confirmed,cancelled,completed',
        ]);

        $joinSafari->update($validated);

        $statusLabels = [
            'open' => 'Open for joining',
            'confirmed' => 'Confirmed (minimum met)',
            'cancelled' => 'Cancelled (minimum not met)',
            'completed' => 'Completed',
        ];

        return back()->with('success', 'Status updated to: ' . ($statusLabels[$validated['status']] ?? $validated['status']));
    }

    // ─── Vehicle Management ──────────────────────────────────────────────────

    /**
     * Check all open vehicles for a join safari.
     * Auto-confirms vehicles meeting minimum, auto-cancels those that don't,
     * and sends cancellation emails to affected participants.
     */
    public function checkVehicles(JoinSafari $joinSafari)
    {
        $vehicles = $joinSafari->vehicles()->open()->get();

        $confirmedCount = 0;
        $cancelledCount = 0;

        foreach ($vehicles as $vehicle) {
            if ($vehicle->seats_filled >= $vehicle->min_required) {
                // Auto-confirm
                $vehicle->update(['status' => 'confirmed']);
                $confirmedCount++;
            } else {
                // Auto-cancel
                $this->cancelVehicle($vehicle);
                $cancelledCount++;
            }
        }

        // Determine overall safari status
        $remainingOpen = $joinSafari->vehicles()->open()->count();
        $hasConfirmed = $joinSafari->vehicles()->confirmed()->count() > 0;

        if ($hasConfirmed && $remainingOpen === 0) {
            $joinSafari->update(['status' => 'confirmed']);
        } elseif (!$hasConfirmed && $remainingOpen === 0) {
            $joinSafari->update(['status' => 'cancelled']);
        }

        $message = "Vehicles checked: {$confirmedCount} confirmed, {$cancelledCount} cancelled.";
        return back()->with('success', $message);
    }

    /**
     * Cancel a specific vehicle and notify its confirmed participants via email.
     */
    public function cancelVehicle(JoinSafariVehicle $vehicle)
    {
        $vehicle->update(['status' => 'cancelled']);

        // Send cancellation emails to all confirmed participants
        $participants = $vehicle->confirmedParticipants()->get();

        foreach ($participants as $participant) {
            try {
                Mail::send(
                    'emails.join-safari.vehicle-cancelled',
                    [
                        'participant' => $participant,
                        'vehicle' => $vehicle,
                        'joinSafari' => $vehicle->joinSafari,
                    ],
                    function ($message) use ($participant, $vehicle) {
                        $message->to($participant->email, $participant->name)
                            ->subject('Vehicle Cancelled — ' . $vehicle->joinSafari->title);
                    }
                );
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error(
                    'Failed to send vehicle cancellation email to ' . $participant->email,
                    ['error' => $e->getMessage()]
                );
            }
        }
    }

    // ─── Participant Management ───────────────────────────────────────────────

    /**
     * Confirm a participant.
     */
    public function confirmParticipant(JoinSafariParticipant $participant)
    {
        $participant->update(['is_confirmed' => true]);
        return back()->with('success', 'Participant confirmed successfully.');
    }

    /**
     * Remove a participant.
     */
    public function destroyParticipant(JoinSafariParticipant $participant)
    {
        $participant->delete();
        return back()->with('success', 'Participant removed successfully.');
    }
}
