<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\ContactMessage;
use App\Models\Inquiry;
use App\Models\Safari;
use App\Models\Destination;
use App\Models\BlogPost;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_safaris' => Safari::count(),
            'active_safaris' => Safari::active()->count(),
            'total_destinations' => Destination::count(),
            'total_blog_posts' => BlogPost::count(),
            'published_posts' => BlogPost::published()->count(),
            'total_bookings' => Booking::count(),
            'pending_bookings' => Booking::pending()->count(),
            'total_inquiries' => Inquiry::count(),
            'unread_inquiries' => Inquiry::unread()->count(),
            'total_messages' => ContactMessage::count(),
            'unread_messages' => ContactMessage::unread()->count(),
        ];

        $recent_bookings = Booking::recent()->take(5)->get();
        $recent_inquiries = Inquiry::unread()->recent()->take(5)->get();
        $recent_messages = ContactMessage::unread()->recent()->take(5)->get();

        $monthly_bookings = Booking::select(
            DB::raw("strftime('%Y-%m', created_at) as month"),
            DB::raw('count(*) as total')
        )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'recent_bookings',
            'recent_inquiries',
            'recent_messages',
            'monthly_bookings'
        ));
    }
}
