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
            ->upcoming()
            ->paginate(12);

        $featured = JoinSafari::open()
            ->featured()
            ->upcoming()
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
            ->firstOrFail();

        return view('join-safari.show', compact('joinSafari'));
    }

    /**
     * Store a new participant joining a safari.
     */
    public function join(Request $request, $slug)
    {
        $joinSafari = JoinSafari::where('slug', $slug)
            ->where('is_active', true)
            ->where('status', 'open')
            ->firstOrFail();

        // Check if there are enough spots
        $requestedPeople = (int) $request->input('number_of_people', 1);
        if ($requestedPeople > $joinSafari->spots_remaining) {
            return back()->withErrors([
                'number_of_people' => 'Sorry, only ' . $joinSafari->spots_remaining . ' spot(s) remaining.'
            ])->withInput();
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'country' => 'nullable|string|max:255',
            'number_of_people' => 'required|integer|min:1|max:' . $joinSafari->spots_remaining,
            'special_requests' => 'nullable|string|max:2000',
        ]);

        $validated['join_safari_id'] = $joinSafari->id;
        $validated['is_confirmed'] = true; // Auto-confirm on public signup

        JoinSafariParticipant::create($validated);

        return redirect()->route('join-safari.show', $joinSafari->slug)
            ->with('success', 'You have successfully joined this safari! We will contact you shortly with more details.');
    }
}
