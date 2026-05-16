<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Safari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    /**
     * Show the multi-step booking form.
     * Optional $slug pre-selects a safari package.
     */
    public function create($slug = null)
    {
        $safaris = Safari::active()->published()->ordered()->get();
        $selectedSafari = null;

        if ($slug) {
            $selectedSafari = Safari::where('slug', $slug)->active()->published()->first();
        }

        // Retrieve any existing session data to resume a partial booking
        $stepData = session('booking_step', 1);
        $bookingData = session('booking_data', []);

        return view('booking.create', compact(
            'safaris',
            'selectedSafari',
            'stepData',
            'bookingData'
        ));
    }

    /**
     * Handle Step 1: Package & Dates
     */
    public function postStep1(Request $request)
    {
        $validated = $request->validate([
            'safari_id' => 'nullable|exists:safaris,id',
            'travel_month' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
        ]);

        $data = session('booking_data', []);
        $data['step1'] = $validated;
        session(['booking_data' => $data]);
        session(['booking_step' => 2]);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'step' => 2]);
        }

        return redirect()->route('booking.create');
    }

    /**
     * Handle Step 2: Travelers & Preferences
     */
    public function postStep2(Request $request)
    {
        $validated = $request->validate([
            'number_of_adults' => 'required|integer|min:1|max:50',
            'number_of_children' => 'nullable|integer|min:0|max:50',
            'accommodation_style' => 'required|string|max:255',
            'preferred_destinations' => 'nullable|string|max:500',
            'special_requests' => 'nullable|string|max:2000',
        ]);

        $data = session('booking_data', []);
        $data['step2'] = $validated;
        session(['booking_data' => $data]);
        session(['booking_step' => 3]);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'step' => 3]);
        }

        return redirect()->route('booking.create');
    }

    /**
     * Handle Step 3: Contact Information
     */
    public function postStep3(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'country' => 'required|string|max:255',
            'hear_about_us' => 'nullable|string|max:255',
        ]);

        $data = session('booking_data', []);
        $data['step3'] = $validated;
        session(['booking_data' => $data]);
        session(['booking_step' => 4]);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'step' => 4]);
        }

        return redirect()->route('booking.create');
    }

    /**
     * Final submit: create the booking record from all session data.
     */
    public function submit(Request $request)
    {
        $bookingData = session('booking_data', []);

        // Ensure all steps are completed
        if (!isset($bookingData['step1'], $bookingData['step2'], $bookingData['step3'])) {
            return redirect()->route('booking.create')
                ->with('error', 'Please complete all steps before submitting.');
        }

        $step1 = $bookingData['step1'];
        $step2 = $bookingData['step2'];
        $step3 = $bookingData['step3'];

        // Look up safari for additional info
        $safari = null;
        if (!empty($step1['safari_id'])) {
            $safari = Safari::find($step1['safari_id']);
        }

        $booking = Booking::create([
            'safari_id' => $step1['safari_id'] ?? null,
            'safari_type' => $safari ? $safari->title : ($step1['safari_type'] ?? null),
            'duration' => $step1['duration'] ?? null,
            'travel_month' => $step1['travel_month'] ?? null,
            'number_of_adults' => $step2['number_of_adults'] ?? null,
            'number_of_children' => $step2['number_of_children'] ?? 0,
            'number_of_travelers' => ($step2['number_of_adults'] ?? 0) + ($step2['number_of_children'] ?? 0),
            'accommodation_style' => $step2['accommodation_style'] ?? null,
            'accommodation_level' => $step2['accommodation_style'] ?? null,
            'preferred_destinations' => $step2['preferred_destinations'] ?? null,
            'special_requests' => $step2['special_requests'] ?? null,
            'first_name' => $step3['first_name'] ?? null,
            'last_name' => $step3['last_name'] ?? null,
            'email' => $step3['email'] ?? null,
            'phone' => $step3['phone'] ?? null,
            'country' => $step3['country'] ?? null,
            'hear_about_us' => $step3['hear_about_us'] ?? null,
            'status' => 'pending',
            'booking_type' => 'booking',
            'booking_data' => $bookingData, // Store full session data for audit
        ]);

        // Clear the session
        session()->forget(['booking_data', 'booking_step']);

        // Send email notifications
        $this->sendBookingConfirmation($booking);

        return redirect()->route('booking.confirmation', $booking->booking_reference);
    }

    /**
     * Show the booking confirmation page.
     */
    public function confirmation($reference)
    {
        $booking = Booking::where('booking_reference', $reference)->firstOrFail();
        return view('booking.confirmation', compact('booking'));
    }

    /**
     * Send booking confirmation emails.
     */
    private function sendBookingConfirmation(Booking $booking): void
    {
        try {
            $adminEmail = env('MAIL_ADMIN_ADDRESS', 'info@gmsafaris.co.tz');
            $safariName = $booking->safari ? $booking->safari->title : ($booking->safari_type ?? 'N/A');

            // Send notification to admin
            Mail::send('emails.admin.booking', ['booking' => $booking, 'safariName' => $safariName], function ($message) use ($adminEmail, $booking) {
                $message->to($adminEmail)
                    ->subject('Action Required: New Booking - ' . $booking->booking_reference)
                    ->from(env('MAIL_FROM_ADDRESS', 'noreply@gmsafaris.co.tz'), 'Golden Memories Safaris');
            });

            // Send auto-reply to customer
            Mail::send('emails.customer.booking', ['booking' => $booking, 'safariName' => $safariName], function ($message) use ($booking) {
                $message->to($booking->email, $booking->full_name)
                    ->subject('Your Journey Begins: Booking Received - ' . $booking->booking_reference)
                    ->from(env('MAIL_FROM_ADDRESS', 'noreply@gmsafaris.co.tz'), 'Golden Memories Safaris');
            });
        } catch (\Throwable $e) {
            // Log email error but don't break the booking flow
            \Log::error('Booking email failed: ' . $e->getMessage());
        }
    }
}
