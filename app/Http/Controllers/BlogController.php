<?php

namespace App\Http\Controllers;

use App\Models\Safari;
use App\Models\Destination;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of all published blog posts.
     */
    public function index()
    {
        $posts = BlogPost::published()->recent()->paginate(10);

        return view('blog', compact('posts'));
    }

    /**
     * Display the specified blog post.
     */
    public function show($slug)
    {
        $post = BlogPost::where('slug', $slug)->published()->firstOrFail();

        // Get related posts
        $relatedPosts = $post->relatedPosts();

        // If no related posts configured, get recent posts excluding current
        if ($relatedPosts->count() === 0) {
            $relatedPosts = BlogPost::where('id', '!=', $post->id)
                ->published()
                ->recent()
                ->take(3)
                ->get();
        }

        // --- INTERNAL LINKING: Related Safaris ---
        // Match blog post tags, category, and title to safari locations, types, and categories
        $postKeywords = collect();
        if ($post->category) {
            $postKeywords->push(Str::lower($post->category));
        }
        if (is_array($post->tags)) {
            foreach ($post->tags as $tag) {
                $postKeywords->push(Str::lower($tag));
            }
        }
        // Also extract keywords from the title
        $titleWords = explode(' ', Str::lower($post->title));
        foreach ($titleWords as $word) {
            // Only use meaningful words (3+ chars)
            if (strlen($word) >= 3) {
                $postKeywords->push($word);
            }
        }
        $postKeywords = $postKeywords->filter()->unique();

        $relatedSafaris = collect();
        if ($postKeywords->isNotEmpty()) {
            $allSafaris = Safari::active()->published()->get();
            $relatedSafaris = $allSafaris->filter(function ($safari) use ($postKeywords) {
                $safariText = Str::lower($safari->title . ' ' . ($safari->location ?? '') . ' ' . ($safari->type ?? '') . ' ' . ($safari->category ?? ''));
                // Also check itinerary locations
                if (is_array($safari->itinerary)) {
                    foreach ($safari->itinerary as $day) {
                        if (isset($day['location'])) {
                            $safariText .= ' ' . Str::lower($day['location']);
                        }
                    }
                }
                foreach ($postKeywords as $keyword) {
                    if (Str::contains($safariText, $keyword)) {
                        return true;
                    }
                }
                return false;
            })->take(3);
        }

        // --- INTERNAL LINKING: Related Destinations ---
        $relatedDestinations = collect();
        if ($postKeywords->isNotEmpty()) {
            $allDestinations = Destination::active()->get();
            $relatedDestinations = $allDestinations->filter(function ($dest) use ($postKeywords) {
                $destText = Str::lower($dest->name . ' ' . ($dest->slug ?? '') . ' ' . ($dest->category ?? ''));
                foreach ($postKeywords as $keyword) {
                    if (Str::contains($destText, $keyword)) {
                        return true;
                    }
                }
                return false;
            })->take(3);
        }

        return view('blog-detail', compact(
            'post',
            'relatedPosts',
            'relatedSafaris',
            'relatedDestinations'
        ));
    }
}
