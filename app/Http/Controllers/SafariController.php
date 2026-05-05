<?php

namespace App\Http\Controllers;

use App\Models\Safari;
use Illuminate\Http\Request;

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

        return view('safari-detail', compact('safari', 'relatedSafaris'));
    }
}
