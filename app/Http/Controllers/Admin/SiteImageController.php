<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SiteImageController extends Controller
{
    public function index(Request $request)
    {
        $query = SiteImage::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('key', 'like', "%{$search}%")
                  ->orWhere('alt_text', 'like', "%{$search}%")
                  ->orWhere('filepath', 'like', "%{$search}%");
            });
        }

        $images = $query->orderBy('category')->orderBy('key')->paginate(24);
        $categories = SiteImage::select('category')->distinct()->whereNotNull('category')->pluck('category');

        return view('admin.site-images.index', compact('images', 'categories'));
    }

    public function edit(SiteImage $siteImage)
    {
        return view('admin.site-images.edit', compact('siteImage'));
    }

    public function update(Request $request, SiteImage $siteImage)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,avif|max:10240',
            'alt_text' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $siteImage->key . '.' . $file->getClientOriginalExtension();

            $siteDir = public_path('img/site');
            if (!is_dir($siteDir)) {
                mkdir($siteDir, 0755, true);
            }

            $file->move($siteDir, $filename);
            $siteImage->filepath = 'img/site/' . $filename;
        }

        $siteImage->alt_text = $request->alt_text;
        $siteImage->save();

        Cache::forget('site_images');

        return redirect()->route('admin.site-images.index')->with('success', "Image '{$siteImage->key}' updated successfully.");
    }

    public function flushCache()
    {
        Cache::forget('site_images');

        return redirect()->route('admin.site-images.index')->with('success', 'Image cache cleared successfully.');
    }
}
