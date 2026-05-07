<?php

namespace App\Http\Controllers;

use App\Models\Safari;
use App\Models\Destination;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

        // --- INTERNAL LINKING: Related Safaris ---
        // Match destination name/slug to safari locations
        $destName = Str::lower($destination->name);
        $destSlug = Str::lower($destination->slug);
        $allSafaris = Safari::active()->get();
        $relatedSafaris = $allSafaris->filter(function ($safari) use ($destName, $destSlug) {
            $safariLocation = $safari->location ? Str::lower($safari->location) : '';
            // Check main location field
            if (Str::contains($safariLocation, $destName) || Str::contains($destName, $safariLocation)
                || Str::contains($safariLocation, $destSlug) || Str::contains($destSlug, $safariLocation)) {
                return true;
            }
            // Check itinerary locations
            if (is_array($safari->itinerary)) {
                foreach ($safari->itinerary as $day) {
                    if (isset($day['location'])) {
                        $dayLoc = Str::lower($day['location']);
                        if (Str::contains($dayLoc, $destName) || Str::contains($destName, $dayLoc)
                            || Str::contains($dayLoc, $destSlug) || Str::contains($destSlug, $dayLoc)) {
                            return true;
                        }
                    }
                }
            }
            return false;
        })->take(4);

        // --- INTERNAL LINKING: Related Blog Posts ---
        // Match destination name to blog post tags, categories, and title
        $relatedBlogPosts = collect();
        $allPosts = BlogPost::published()->recent()->get();
        $relatedBlogPosts = $allPosts->filter(function ($post) use ($destName, $destSlug) {
            $postTitle = Str::lower($post->title);
            $postCategory = $post->category ? Str::lower($post->category) : '';
            $postTags = is_array($post->tags) ? array_map('Str::lower', $post->tags) : [];
            $allPostText = $postTitle . ' ' . $postCategory . ' ' . implode(' ', $postTags);
            return Str::contains($allPostText, $destName) || Str::contains($allPostText, $destSlug);
        })->take(3);

        return view('destination-detail', compact(
            'destination',
            'relatedDestinations',
            'relatedSafaris',
            'relatedBlogPosts'
        ));
    }
}
