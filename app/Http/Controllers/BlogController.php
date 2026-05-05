<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

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

        return view('blog-detail', compact('post', 'relatedPosts'));
    }
}
