<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Display a listing of all active destinations grouped by category.
     */
    public function index()
    {
        $destinations = Destination::active()->ordered()->get();

        // Group destinations by category
        $grouped = $destinations->groupBy('category');

        return view('destinations', compact('destinations', 'grouped'));
    }

    /**
     * Display the specified destination.
     */
    public function show($slug)
    {
        $destination = Destination::where('slug', $slug)->active()->firstOrFail();

        // Get related destinations by slugs
        $relatedDestinations = collect();
        if (is_array($destination->related_destinations) && count($destination->related_destinations) > 0) {
            $relatedDestinations = Destination::whereIn('slug', $destination->related_destinations)
                ->where('id', '!=', $destination->id)
                ->active()
                ->get();
        }

        // If no related destinations configured, get random ones from same category
        if ($relatedDestinations->count() === 0) {
            $relatedDestinations = Destination::where('id', '!=', $destination->id)
                ->where('category', $destination->category)
                ->active()
                ->inRandomOrder()
                ->take(3)
                ->get();
        }

        return view('destination-detail', compact('destination', 'relatedDestinations'));
    }
}
