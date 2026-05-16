<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Safari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InquiryController extends Controller
{
    /**
     * Show the inquiry form.
     * Optional $slug pre-fills the package reference.
     */
    public function create($slug = null)
    {
        $safaris = Safari::active()->published()->ordered()->get();
        $selectedSafari = null;

        if ($slug) {
            $selectedSafari = Safari::where('slug', $slug)->active()->published()->first();
        }

        return view('inquiry.create', compact('safaris', 'selectedSafari'));
    }

    /**
     * Store a new inquiry.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'country' => 'nullable|string|max:255',
            'subject' => 'nullable|string|max:255',
            'safari_id' => 'nullable|exists:safaris,id',
            'message' => 'required|string|max:5000',
        ]);

        $inquiry = Inquiry::create($validated);

        try {
            $this->sendInquiryNotifications($inquiry);
        } catch (\Exception $e) {
            // Continue even if email fails
        }

        // Return JSON for AJAX requests (used by contact, kilimanjaroroutes, zanzibarbeachholiday forms)
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your inquiry has been sent. We will contact you within 24 hours.',
                'inquiry_name' => $inquiry->name,
            ]);
        }

        return redirect()->route('inquiry.thank-you')
            ->with('success', 'Thank you! Your inquiry has been sent. We will contact you within 24 hours.')
            ->with('inquiry_name', $inquiry->name);
    }

    /**
     * Show the thank you page after inquiry submission.
     */
    public function thankYou()
    {
        $name = session('inquiry_name', '');
        return view('inquiry.thank-you', compact('name'));
    }

    /**
     * Send inquiry notification emails.
     */
    private function sendInquiryNotifications(Inquiry $inquiry): void
    {
        try {
            $adminEmail = env('MAIL_ADMIN_ADDRESS', 'info@gmsafaris.co.tz');
            $safariName = $inquiry->safari ? $inquiry->safari->title : 'General Inquiry';

            // Notify admin
            Mail::send('emails.admin.inquiry', ['inquiry' => $inquiry, 'safariName' => $safariName], function ($message) use ($adminEmail, $inquiry) {
                $message->to($adminEmail)
                    ->subject('Action Required: New Inquiry from ' . $inquiry->name)
                    ->from(env('MAIL_FROM_ADDRESS', 'noreply@gmsafaris.co.tz'), 'Golden Memories Safaris');
            });

            // Auto-reply to customer
            Mail::send('emails.customer.inquiry', ['inquiry' => $inquiry, 'safariName' => $safariName], function ($message) use ($inquiry) {
                $message->to($inquiry->email, $inquiry->name)
                    ->subject('Thank You for Your Inquiry — Golden Memories Safaris')
                    ->from(env('MAIL_FROM_ADDRESS', 'noreply@gmsafaris.co.tz'), 'Golden Memories Safaris');
            });
        } catch (\Throwable $e) {
            \Log::error('Inquiry email failed: ' . $e->getMessage());
        }
    }
}
