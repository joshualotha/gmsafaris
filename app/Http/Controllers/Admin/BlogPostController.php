<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        $posts = BlogPost::orderBy('title')->get();
        return view('admin.blog.create', compact('posts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'nullable',
            'content' => 'nullable',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'author' => 'nullable|max:255',
            'category' => 'nullable|max:100',
            'tags' => 'nullable',
            'reading_time' => 'nullable|integer|min:1|max:999',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
            'is_trending' => 'boolean',
            'related_post_ids' => 'nullable|array',
            'related_post_ids.*' => 'integer|exists:blog_posts,id',
            'published_at' => 'nullable|date',
            'seo_title' => 'nullable|max:255',
            'seo_description' => 'nullable',
            'seo_keywords' => 'nullable|max:255',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        // Convert comma-separated tags to array
        if (!empty($validated['tags']) && is_string($validated['tags'])) {
            $tagString = $validated['tags'];
            $validated['tags'] = array_map('trim', explode(',', $tagString));
            $validated['tags'] = array_filter($validated['tags']);
            $validated['tags'] = array_values($validated['tags']);
        } else {
            $validated['tags'] = null;
        }

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('blog', 'public');
        }

        if ($request->boolean('is_published') && !$validated['published_at']) {
            $validated['published_at'] = now();
        }

        BlogPost::create($validated);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post created successfully.');
    }

    public function edit($slug)
    {
        $blogPost = BlogPost::where('slug', $slug)->firstOrFail();
        $posts = BlogPost::where('id', '!=', $blogPost->id)->orderBy('title')->get();
        return view('admin.blog.edit', compact('blogPost', 'posts'));
    }

    public function update(Request $request, $slug)
    {
        $blogPost = BlogPost::where('slug', $slug)->firstOrFail();
        
        $validated = $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'nullable',
            'content' => 'nullable',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'author' => 'nullable|max:255',
            'category' => 'nullable|max:100',
            'tags' => 'nullable',
            'reading_time' => 'nullable|integer|min:1|max:999',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
            'is_trending' => 'boolean',
            'related_post_ids' => 'nullable|array',
            'related_post_ids.*' => 'integer|exists:blog_posts,id',
            'published_at' => 'nullable|date',
            'seo_title' => 'nullable|max:255',
            'seo_description' => 'nullable',
            'seo_keywords' => 'nullable|max:255',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        // Convert comma-separated tags to array
        if (!empty($validated['tags']) && is_string($validated['tags'])) {
            $tagString = $validated['tags'];
            $validated['tags'] = array_map('trim', explode(',', $tagString));
            $validated['tags'] = array_filter($validated['tags']);
            $validated['tags'] = array_values($validated['tags']);
        } else {
            $validated['tags'] = null;
        }

        if ($request->hasFile('featured_image')) {
            if ($blogPost->featured_image) {
                Storage::disk('public')->delete($blogPost->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('blog', 'public');
        }

        $blogPost->update($validated);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post updated successfully.');
    }

    public function destroy($slug)
    {
        $blogPost = BlogPost::where('slug', $slug)->firstOrFail();
        
        if ($blogPost->featured_image) {
            Storage::disk('public')->delete($blogPost->featured_image);
        }

        $blogPost->delete();

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post deleted successfully.');
    }

    public function togglePublish($slug)
    {
        $blogPost = BlogPost::where('slug', $slug)->firstOrFail();
        
        $blogPost->update([
            'is_published' => !$blogPost->is_published,
            'published_at' => !$blogPost->is_published ? now() : $blogPost->published_at,
        ]);

        return back()->with('success', 'Publication status updated.');
    }

    /**
     * Handle TinyMCE image upload.
     */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $path = $request->file('file')->store('blog/editor', 'public');

        return response()->json([
            'location' => Storage::url($path),
        ]);
    }
}
