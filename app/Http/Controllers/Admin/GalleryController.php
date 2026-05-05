<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a grid of all gallery images.
     */
    public function index(Request $request)
    {
        $query = GalleryImage::query();

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Filter by active status
        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        // Search by caption or alt text
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('caption', 'like', "%{$search}%")
                  ->orWhere('alt_text', 'like', "%{$search}%")
                  ->orWhere('original_name', 'like', "%{$search}%");
            });
        }

        $images = $query->ordered()->paginate(24);
        $categories = GalleryImage::select('category')->distinct()->whereNotNull('category')->pluck('category');
        $stats = [
            'total' => GalleryImage::count(),
            'active' => GalleryImage::where('is_active', true)->count(),
            'inactive' => GalleryImage::where('is_active', false)->count(),
        ];

        return view('admin.gallery.index', compact('images', 'categories', 'stats'));
    }

    /**
     * Show the upload form.
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Upload new gallery images.
     */
    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'category' => 'nullable|string|max:50',
            'caption' => 'nullable|string|max:255',
        ]);

        $uploaded = 0;
        $errors = [];

        foreach ($request->file('images') as $file) {
            try {
                $originalName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();

                // Generate a unique filename
                $filename = Str::random(20) . '.' . $extension;

                // Store full-size image in public/img/gallery/full/
                $fullDir = public_path('img/gallery/full');
                if (!is_dir($fullDir)) {
                    mkdir($fullDir, 0755, true);
                }
                $file->move($fullDir, $filename);

                // Create and store thumbnail (300px wide) in public/img/gallery/thumb/
                $thumbDir = public_path('img/gallery/thumb');
                if (!is_dir($thumbDir)) {
                    mkdir($thumbDir, 0755, true);
                }
                $thumbPath = $thumbDir . '/' . $filename;
                try {
                    // Use GD directly for thumbnail creation
                    $sourcePath = $fullDir . '/' . $filename;
                    $info = getimagesize($sourcePath);
                    $mime = $info['mime'];
                    switch ($mime) {
                        case 'image/jpeg':
                            $srcImg = imagecreatefromjpeg($sourcePath);
                            break;
                        case 'image/png':
                            $srcImg = imagecreatefrompng($sourcePath);
                            break;
                        case 'image/gif':
                            $srcImg = imagecreatefromgif($sourcePath);
                            break;
                        case 'image/webp':
                            $srcImg = imagecreatefromwebp($sourcePath);
                            break;
                        default:
                            $srcImg = imagecreatefromjpeg($sourcePath);
                    }
                    $origWidth = imagesx($srcImg);
                    $origHeight = imagesy($srcImg);
                    $thumbWidth = 300;
                    $thumbHeight = intval($origHeight * ($thumbWidth / $origWidth));
                    $thumbImg = imagecreatetruecolor($thumbWidth, $thumbHeight);
                    imagecopyresampled($thumbImg, $srcImg, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $origWidth, $origHeight);
                    switch ($mime) {
                        case 'image/jpeg':
                            imagejpeg($thumbImg, $thumbPath, 85);
                            break;
                        case 'image/png':
                            imagepng($thumbImg, $thumbPath, 6);
                            break;
                        case 'image/gif':
                            imagegif($thumbImg, $thumbPath);
                            break;
                        case 'image/webp':
                            imagewebp($thumbImg, $thumbPath, 85);
                            break;
                        default:
                            imagejpeg($thumbImg, $thumbPath, 85);
                    }
                    imagedestroy($srcImg);
                    imagedestroy($thumbImg);
                } catch (\Exception $e) {
                    // If thumbnail creation fails, copy the original as thumbnail
                    copy($sourcePath, $thumbPath);
                }

                // Get max sort order
                $maxSort = GalleryImage::max('sort_order') ?? 0;

                // Create database record
                GalleryImage::create([
                    'filename' => $filename,
                    'original_name' => $originalName,
                    'caption' => $request->caption,
                    'alt_text' => $request->caption,
                    'category' => $request->category ?? 'general',
                    'sort_order' => $maxSort + 1,
                    'is_active' => true,
                ]);

                $uploaded++;
            } catch (\Exception $e) {
                $errors[] = "Failed to upload {$file->getClientOriginalName()}: {$e->getMessage()}";
            }
        }

        $message = "{$uploaded} image(s) uploaded successfully.";
        if (!empty($errors)) {
            $message .= ' Errors: ' . implode(', ', $errors);
            return redirect()->route('admin.gallery.index')->with('error', $message);
        }

        return redirect()->route('admin.gallery.index')->with('success', $message);
    }

    /**
     * Update image details (caption, alt text, category).
     */
    public function update(Request $request, GalleryImage $galleryImage)
    {
        $request->validate([
            'caption' => 'nullable|string|max:255',
            'alt_text' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:50',
        ]);

        $galleryImage->update($request->only(['caption', 'alt_text', 'category']));

        return redirect()->route('admin.gallery.index')->with('success', 'Image updated successfully.');
    }

    /**
     * Toggle active status.
     */
    public function toggleActive(GalleryImage $galleryImage)
    {
        $galleryImage->update(['is_active' => !$galleryImage->is_active]);

        $status = $galleryImage->is_active ? 'activated' : 'deactivated';
        return redirect()->route('admin.gallery.index')->with('success', "Image {$status} successfully.");
    }

    /**
     * Delete a gallery image.
     */
    public function destroy(GalleryImage $galleryImage)
    {
        // Delete files from public/img/gallery/
        $fullPath = public_path('img/gallery/full/' . $galleryImage->filename);
        $thumbPath = public_path('img/gallery/thumb/' . $galleryImage->filename);

        if (file_exists($fullPath)) {
            @unlink($fullPath);
        }
        if (file_exists($thumbPath)) {
            @unlink($thumbPath);
        }

        $galleryImage->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Image deleted successfully.');
    }

    /**
     * Bulk upload from existing filesystem images (sync).
     * Scans the gallery/full directory and imports any images not yet in the database.
     */
    public function syncFromFilesystem()
    {
        $fullDir = public_path('img/gallery/full');
        if (!is_dir($fullDir)) {
            return redirect()->route('admin.gallery.index')->with('error', 'Gallery directory not found at public/img/gallery/full/.');
        }

        $files = scandir($fullDir);
        $imported = 0;
        $existingFilenames = GalleryImage::pluck('filename')->toArray();

        foreach ($files as $file) {
            if ($file === '.' || $file === '..') continue;
            if (in_array($file, $existingFilenames)) continue;

            $extension = pathinfo($file, PATHINFO_EXTENSION);
            if (!in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) continue;

            // Ensure thumbnail exists
            $thumbPath = public_path('img/gallery/thumb/' . $file);
            if (!file_exists($thumbPath)) {
                try {
                    $sourcePath = $fullDir . '/' . $file;
                    $thumbDir = public_path('img/gallery/thumb');
                    if (!is_dir($thumbDir)) {
                        mkdir($thumbDir, 0755, true);
                    }
                    $info = getimagesize($sourcePath);
                    $mime = $info['mime'];
                    switch ($mime) {
                        case 'image/jpeg': $srcImg = imagecreatefromjpeg($sourcePath); break;
                        case 'image/png': $srcImg = imagecreatefrompng($sourcePath); break;
                        case 'image/gif': $srcImg = imagecreatefromgif($sourcePath); break;
                        case 'image/webp': $srcImg = imagecreatefromwebp($sourcePath); break;
                        default: $srcImg = imagecreatefromjpeg($sourcePath);
                    }
                    $origWidth = imagesx($srcImg);
                    $origHeight = imagesy($srcImg);
                    $thumbWidth = 300;
                    $thumbHeight = intval($origHeight * ($thumbWidth / $origWidth));
                    $thumbImg = imagecreatetruecolor($thumbWidth, $thumbHeight);
                    imagecopyresampled($thumbImg, $srcImg, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $origWidth, $origHeight);
                    switch ($mime) {
                        case 'image/jpeg': imagejpeg($thumbImg, $thumbPath, 85); break;
                        case 'image/png': imagepng($thumbImg, $thumbPath, 6); break;
                        case 'image/gif': imagegif($thumbImg, $thumbPath); break;
                        case 'image/webp': imagewebp($thumbImg, $thumbPath, 85); break;
                        default: imagejpeg($thumbImg, $thumbPath, 85);
                    }
                    imagedestroy($srcImg);
                    imagedestroy($thumbImg);
                } catch (\Exception $e) {
                    continue;
                }
            }

            $maxSort = GalleryImage::max('sort_order') ?? 0;

            GalleryImage::create([
                'filename' => $file,
                'original_name' => $file,
                'caption' => null,
                'alt_text' => null,
                'category' => 'general',
                'sort_order' => $maxSort + 1,
                'is_active' => true,
            ]);

            $imported++;
        }

        if ($imported > 0) {
            return redirect()->route('admin.gallery.index')->with('success', "{$imported} images synced from filesystem.");
        }

        return redirect()->route('admin.gallery.index')->with('info', 'No new images found to sync.');
    }

    /**
     * Reorder images (drag & drop).
     */
    public function reorder(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'integer|exists:gallery_images,id',
        ]);

        foreach ($request->ids as $index => $id) {
            GalleryImage::where('id', $id)->update(['sort_order' => $index]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Bulk delete selected images.
     */
    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'integer|exists:gallery_images,id',
        ]);

        $images = GalleryImage::whereIn('id', $request->ids)->get();

        foreach ($images as $image) {
            $fullPath = public_path('img/gallery/full/' . $image->filename);
            $thumbPath = public_path('img/gallery/thumb/' . $image->filename);
            if (file_exists($fullPath)) @unlink($fullPath);
            if (file_exists($thumbPath)) @unlink($thumbPath);
            $image->delete();
        }

        return redirect()->route('admin.gallery.index')->with('success', count($images) . ' images deleted successfully.');
    }

    /**
     * API endpoint for frontend gallery page.
     */
    public function apiImages(Request $request)
    {
        $query = GalleryImage::active()->ordered();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $images = $query->get()->map(function ($image) {
            return [
                'id' => $image->id,
                'full_url' => $image->full_url,
                'thumb_url' => $image->thumb_url,
                'caption' => $image->caption,
                'alt_text' => $image->alt_text ?: 'Tanzania Safari Gallery Image',
                'category' => $image->category,
            ];
        });

        return response()->json($images);
    }
}
