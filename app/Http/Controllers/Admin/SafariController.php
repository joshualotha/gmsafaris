<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Safari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SafariController extends Controller
{
    public function index()
    {
        $safaris = Safari::ordered()->paginate(20);
        return view('admin.safaris.index', compact('safaris'));
    }

    public function create()
    {
        return view('admin.safaris.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'subtitle' => 'nullable|max:255',
            'short_description' => 'nullable',
            'description' => 'nullable',
            'duration' => 'nullable|max:100',
            'location' => 'nullable|max:255',
            'type' => 'nullable|max:100',
            'price_tier' => 'nullable|max:50',
            'badge_text' => 'nullable|max:255',
            'price_from' => 'nullable|numeric',
            'price_label' => 'nullable|max:255',
            'pricing_tiers' => 'nullable|array',
            'pricing_tiers.*.label' => 'nullable|string|max:255',
            'pricing_tiers.*.amount' => 'nullable|string|max:255',
            'pricing_tiers.*.note' => 'nullable|string|max:255',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'highlights' => 'nullable|array',
            'itinerary' => 'nullable|array',
            'itinerary.*.day' => 'nullable|integer',
            'itinerary.*.title' => 'nullable|string|max:255',
            'itinerary.*.location' => 'nullable|string|max:255',
            'itinerary.*.description' => 'nullable|string',
            'itinerary.*.meals' => 'nullable|string|max:255',
            'itinerary.*.accommodation' => 'nullable|string|max:255',
            'inclusions' => 'nullable|array',
            'exclusions' => 'nullable|array',
            'faq' => 'nullable|array',
            'faq.*.question' => 'nullable|string|max:255',
            'faq.*.answer' => 'nullable|string',
            'important_notes' => 'nullable|array',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
            'sort_order' => 'integer|min:0',
            'seo_title' => 'nullable|max:255',
            'seo_description' => 'nullable',
            'seo_keywords' => 'nullable|max:255',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        // Handle file uploads
        if ($request->hasFile('hero_image')) {
            $validated['hero_image'] = $request->file('hero_image')->store('safaris', 'public');
        }
        if ($request->hasFile('thumbnail_image')) {
            $validated['thumbnail_image'] = $request->file('thumbnail_image')->store('safaris/thumbnails', 'public');
        }

        // Handle gallery uploads
        if ($request->hasFile('gallery_images')) {
            $gallery = [];
            foreach ($request->file('gallery_images') as $image) {
                $gallery[] = $image->store('safaris/gallery', 'public');
            }
            $validated['gallery_images'] = $gallery;
        }

        if ($request->boolean('is_published') && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        Safari::create($validated);

        return redirect()->route('admin.safaris.index')
            ->with('success', 'Safari created successfully.');
    }

    public function edit(Safari $safari)
    {
        return view('admin.safaris.edit', compact('safari'));
    }

    public function update(Request $request, Safari $safari)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'subtitle' => 'nullable|max:255',
            'short_description' => 'nullable',
            'description' => 'nullable',
            'duration' => 'nullable|max:100',
            'location' => 'nullable|max:255',
            'type' => 'nullable|max:100',
            'price_tier' => 'nullable|max:50',
            'badge_text' => 'nullable|max:255',
            'price_from' => 'nullable|numeric',
            'price_label' => 'nullable|max:255',
            'pricing_tiers' => 'nullable|array',
            'pricing_tiers.*.label' => 'nullable|string|max:255',
            'pricing_tiers.*.amount' => 'nullable|string|max:255',
            'pricing_tiers.*.note' => 'nullable|string|max:255',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'delete_gallery_images' => 'nullable|array',
            'delete_gallery_images.*' => 'integer|min:0',
            'highlights' => 'nullable|array',
            'itinerary' => 'nullable|array',
            'itinerary.*.day' => 'nullable|integer',
            'itinerary.*.title' => 'nullable|string|max:255',
            'itinerary.*.location' => 'nullable|string|max:255',
            'itinerary.*.description' => 'nullable|string',
            'itinerary.*.meals' => 'nullable|string|max:255',
            'itinerary.*.accommodation' => 'nullable|string|max:255',
            'inclusions' => 'nullable|array',
            'exclusions' => 'nullable|array',
            'faq' => 'nullable|array',
            'faq.*.question' => 'nullable|string|max:255',
            'faq.*.answer' => 'nullable|string',
            'important_notes' => 'nullable|array',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
            'sort_order' => 'integer|min:0',
            'seo_title' => 'nullable|max:255',
            'seo_description' => 'nullable',
            'seo_keywords' => 'nullable|max:255',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('hero_image')) {
            if ($safari->hero_image) {
                Storage::disk('public')->delete($safari->hero_image);
            }
            $validated['hero_image'] = $request->file('hero_image')->store('safaris', 'public');
        }

        if ($request->hasFile('thumbnail_image')) {
            if ($safari->thumbnail_image) {
                Storage::disk('public')->delete($safari->thumbnail_image);
            }
            $validated['thumbnail_image'] = $request->file('thumbnail_image')->store('safaris/thumbnails', 'public');
        }

        // Handle gallery image deletion and addition
        $gallery = [];
        $deleteIndices = $request->input('delete_gallery_images', []);

        if ($safari->gallery_images) {
            foreach ($safari->gallery_images as $index => $existing) {
                // Skip images marked for deletion
                if (in_array($index, $deleteIndices)) {
                    $path = is_array($existing) ? ($existing['full'] ?? $existing['thumb'] ?? '') : $existing;
                    if ($path && !str_starts_with($path, 'img/')) {
                        Storage::disk('public')->delete($path);
                    }
                    continue;
                }
                $gallery[] = is_array($existing) ? ($existing['full'] ?? $existing['thumb'] ?? '') : $existing;
            }
        }

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $gallery[] = $image->store('safaris/gallery', 'public');
            }
        }

        $validated['gallery_images'] = $gallery;

        if ($request->boolean('is_published') && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        $safari->update($validated);

        return redirect()->route('admin.safaris.index')
            ->with('success', 'Safari updated successfully.');
    }

    public function destroy(Safari $safari)
    {
        // Clean up files
        if ($safari->hero_image) {
            Storage::disk('public')->delete($safari->hero_image);
        }
        if ($safari->thumbnail_image) {
            Storage::disk('public')->delete($safari->thumbnail_image);
        }
        if ($safari->gallery_images) {
            foreach ($safari->gallery_images as $image) {
                $imagePath = is_array($image) ? ($image['full'] ?? $image['thumb'] ?? '') : $image;
                if ($imagePath) {
                    Storage::disk('public')->delete($imagePath);
                }
            }
        }

        $safari->delete();

        return redirect()->route('admin.safaris.index')
            ->with('success', 'Safari deleted successfully.');
    }

    public function toggleFeatured(Safari $safari)
    {
        $safari->update(['is_featured' => !$safari->is_featured]);
        return back()->with('success', 'Featured status updated.');
    }

    public function toggleActive(Safari $safari)
    {
        $safari->update(['is_active' => !$safari->is_active]);
        return back()->with('success', 'Active status updated.');
    }

    public function togglePublish(Safari $safari)
    {
        $safari->update([
            'is_published' => !$safari->is_published,
            'published_at' => !$safari->is_published ? now() : $safari->published_at,
        ]);
        return back()->with('success', 'Publication status updated.');
    }
}
