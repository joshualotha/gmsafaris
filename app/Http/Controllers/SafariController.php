<?php

namespace App\Http\Controllers;

use App\Models\Safari;
use App\Models\Destination;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SafariController extends Controller
{
    /**
     * Display a listing of all active safaris with search & filters.
     */
    public function index(Request $request)
    {
        $query = Safari::active()->ordered();

        // Search by keyword (title, short_description, location)
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('type', 'like', "%{$search}%");
            });
        }

        // Filter by duration
        if ($duration = $request->input('duration')) {
            $query->where('duration', $duration);
        }

        $safaris = $query->paginate(12)->withQueryString();

        // Get distinct duration options for the filter dropdown
        $durations = Safari::active()->select('duration')->distinct()->whereNotNull('duration')->orderBy('duration')->pluck('duration');

        return view('safaris', compact('safaris', 'durations'));
    }

    /**
     * AJAX search endpoint — returns rendered HTML partial for live filtering.
     */
    public function search(Request $request)
    {
        $query = Safari::active()->ordered();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('type', 'like', "%{$search}%");
            });
        }

        if ($duration = $request->input('duration')) {
            $query->where('duration', $duration);
        }

        $page = $request->input('page', 1);
        $safaris = $query->paginate(12, ['*'], 'page', $page)->withQueryString();

        $html = view('partials.safari-cards', compact('safaris'))->render();

        return response()->json(['html' => $html]);
    }

    /**
     * Display the specified safari package.
     */
    public function show($slug)
    {
        $safari = Safari::where('slug', $slug)->active()->firstOrFail();
        
        // Get related safaris (same category, excluding current)
        $relatedSafaris = Safari::where('id', '!=', $safari->id)
            ->active()
            ->inRandomOrder()
            ->take(3)
            ->get();

        // --- INTERNAL LINKING: Related Destinations ---
        // Extract location keywords from the safari's location field and itinerary
        $locationKeywords = collect();
        if ($safari->location) {
            $locationKeywords->push($safari->location);
        }
        if (is_array($safari->itinerary)) {
            foreach ($safari->itinerary as $day) {
                if (isset($day['location'])) {
                    // Split compound locations like "Zanzibar - Arusha - Zanzibar"
                    $parts = preg_split('/[-,]+/', $day['location']);
                    foreach ($parts as $part) {
                        $locationKeywords->push(trim($part));
                    }
                }
            }
        }
        // Remove empties and normalize
        $locationKeywords = $locationKeywords->filter()->unique()->map(function ($loc) {
            return Str::lower(trim($loc));
        });

        // Find destinations matching these location keywords
        $relatedDestinations = collect();
        if ($locationKeywords->isNotEmpty()) {
            $allDestinations = Destination::active()->get();
            $relatedDestinations = $allDestinations->filter(function ($dest) use ($locationKeywords) {
                $destName = Str::lower($dest->name);
                $destSlug = Str::lower($dest->slug);
                foreach ($locationKeywords as $keyword) {
                    // Match if keyword appears in destination name or slug
                    if (Str::contains($destName, $keyword) || Str::contains($keyword, $destName)
                        || Str::contains($destSlug, $keyword) || Str::contains($keyword, $destSlug)) {
                        return true;
                    }
                }
                return false;
            })->take(3);
        }

        // --- INTERNAL LINKING: Related Blog Posts ---
        // Match safari location/type keywords to blog post tags and categories
        $blogKeywords = collect([$safari->type, $safari->category, $safari->location]);
        if (is_array($safari->itinerary)) {
            foreach ($safari->itinerary as $day) {
                if (isset($day['location'])) {
                    $parts = preg_split('/[-,]+/', $day['location']);
                    foreach ($parts as $part) {
                        $blogKeywords->push(trim($part));
                    }
                }
            }
        }
        $blogKeywords = $blogKeywords->filter()->unique()->map(function ($kw) {
            return Str::lower(trim($kw));
        });

        $relatedBlogPosts = collect();
        if ($blogKeywords->isNotEmpty()) {
            $allPosts = BlogPost::published()->recent()->get();
            $relatedBlogPosts = $allPosts->filter(function ($post) use ($blogKeywords) {
                $postTitle = Str::lower($post->title);
                $postCategory = $post->category ? Str::lower($post->category) : '';
                $postTags = is_array($post->tags) ? array_map('Str::lower', $post->tags) : [];
                $allPostText = $postTitle . ' ' . $postCategory . ' ' . implode(' ', $postTags);
                foreach ($blogKeywords as $keyword) {
                    if (Str::contains($allPostText, $keyword)) {
                        return true;
                    }
                }
                return false;
            })->take(3);
        }

        return view('safari-detail', compact(
            'safari',
            'relatedSafaris',
            'relatedDestinations',
            'relatedBlogPosts'
        ));
    }
}
