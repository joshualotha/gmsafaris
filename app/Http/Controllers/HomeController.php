<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Destination;
use App\Models\Safari;

class HomeController extends Controller
{
    public function index()
    {
        $featuredSafaris = Safari::featured()->active()->published()->ordered()->take(4)->get();

        if ($featuredSafaris->count() < 4) {
            $featuredSafaris = Safari::active()->published()->ordered()->take(4)->get();
        }

        $destinations = Destination::active()->ordered()->take(6)->get();
        $latestPosts = BlogPost::published()->recent()->take(3)->get();

        return view('index', compact('featuredSafaris', 'destinations', 'latestPosts'));
    }
}
