<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::ordered()->paginate(15);
        return view('admin.destinations.index', compact('destinations'));
    }

    public function create()
    {
        return view('admin.destinations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'subtitle' => 'nullable|max:255',
            'badge_text' => 'nullable|max:255',
            'short_description' => 'nullable',
            'description' => 'nullable',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'highlights' => 'nullable|array',
            'features' => 'nullable|array',
            'features.*.icon' => 'nullable|max:255',
            'features.*.title' => 'nullable|max:255',
            'features.*.description' => 'nullable',
            'quick_facts' => 'nullable|array',
            'location' => 'nullable|max:255',
            'category' => 'nullable|max:255',
            'best_time_to_visit' => 'nullable|array',
            'best_time_to_visit.dry_season.title' => 'nullable|max:255',
            'best_time_to_visit.dry_season.items' => 'nullable|array',
            'best_time_to_visit.wet_season.title' => 'nullable|max:255',
            'best_time_to_visit.wet_season.items' => 'nullable|array',
            'key_attractions' => 'nullable|max:255',
            'wildlife_highlights' => 'nullable|array',
            'wildlife_highlights.*.title' => 'nullable|max:255',
            'wildlife_highlights.*.description' => 'nullable',
            'activities' => 'nullable|array',
            'activities.*.title' => 'nullable|max:255',
            'activities.*.description' => 'nullable',
            'faq' => 'nullable|array',
            'faq.*.question' => 'nullable|max:255',
            'faq.*.answer' => 'nullable',
            'cta_text' => 'nullable|max:255',
            'cta_url' => 'nullable|max:255',
            'map_embed_url' => 'nullable|max:500',
            'video_url' => 'nullable|max:500',
            'related_destinations' => 'nullable|array',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
            'seo_title' => 'nullable|max:255',
            'seo_description' => 'nullable',
            'seo_keywords' => 'nullable|max:255',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        if ($request->hasFile('hero_image')) {
            $validated['hero_image'] = $request->file('hero_image')->store('destinations', 'public');
        }
        if ($request->hasFile('thumbnail_image')) {
            $validated['thumbnail_image'] = $request->file('thumbnail_image')->store('destinations/thumbnails', 'public');
        }
        if ($request->hasFile('gallery_images')) {
            $gallery = [];
            foreach ($request->file('gallery_images') as $image) {
                $gallery[] = $image->store('destinations/gallery', 'public');
            }
            $validated['gallery_images'] = $gallery;
        }

        Destination::create($validated);

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination created successfully.');
    }

    public function edit(Destination $destination)
    {
        return view('admin.destinations.edit', compact('destination'));
    }

    public function update(Request $request, Destination $destination)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'subtitle' => 'nullable|max:255',
            'badge_text' => 'nullable|max:255',
            'short_description' => 'nullable',
            'description' => 'nullable',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'highlights' => 'nullable|array',
            'features' => 'nullable|array',
            'features.*.icon' => 'nullable|max:255',
            'features.*.title' => 'nullable|max:255',
            'features.*.description' => 'nullable',
            'quick_facts' => 'nullable|array',
            'location' => 'nullable|max:255',
            'category' => 'nullable|max:255',
            'best_time_to_visit' => 'nullable|array',
            'best_time_to_visit.dry_season.title' => 'nullable|max:255',
            'best_time_to_visit.dry_season.items' => 'nullable|array',
            'best_time_to_visit.wet_season.title' => 'nullable|max:255',
            'best_time_to_visit.wet_season.items' => 'nullable|array',
            'key_attractions' => 'nullable|max:255',
            'wildlife_highlights' => 'nullable|array',
            'wildlife_highlights.*.title' => 'nullable|max:255',
            'wildlife_highlights.*.description' => 'nullable',
            'activities' => 'nullable|array',
            'activities.*.title' => 'nullable|max:255',
            'activities.*.description' => 'nullable',
            'faq' => 'nullable|array',
            'faq.*.question' => 'nullable|max:255',
            'faq.*.answer' => 'nullable',
            'cta_text' => 'nullable|max:255',
            'cta_url' => 'nullable|max:255',
            'map_embed_url' => 'nullable|max:500',
            'video_url' => 'nullable|max:500',
            'related_destinations' => 'nullable|array',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
            'seo_title' => 'nullable|max:255',
            'seo_description' => 'nullable',
            'seo_keywords' => 'nullable|max:255',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        if ($request->hasFile('hero_image')) {
            if ($destination->hero_image) {
                Storage::disk('public')->delete($destination->hero_image);
            }
            $validated['hero_image'] = $request->file('hero_image')->store('destinations', 'public');
        }

        if ($request->hasFile('thumbnail_image')) {
            if ($destination->thumbnail_image) {
                Storage::disk('public')->delete($destination->thumbnail_image);
            }
            $validated['thumbnail_image'] = $request->file('thumbnail_image')->store('destinations/thumbnails', 'public');
        }

        if ($request->hasFile('gallery_images')) {
            $gallery = $destination->gallery_images ?? [];
            foreach ($request->file('gallery_images') as $image) {
                $gallery[] = $image->store('destinations/gallery', 'public');
            }
            $validated['gallery_images'] = $gallery;
        }

        $destination->update($validated);

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination updated successfully.');
    }

    public function destroy(Destination $destination)
    {
        if ($destination->hero_image) {
            Storage::disk('public')->delete($destination->hero_image);
        }
        if ($destination->thumbnail_image) {
            Storage::disk('public')->delete($destination->thumbnail_image);
        }
        if ($destination->gallery_images) {
            foreach ($destination->gallery_images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $destination->delete();

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination deleted successfully.');
    }
}
