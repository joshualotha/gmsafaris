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
        $safaris = Safari::active()->ordered()->get();
        $selectedSafari = null;

        if ($slug) {
            $selectedSafari = Safari::where('slug', $slug)->active()->first();
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

            // Send notification to admin
            Mail::html(
                $this->buildAdminNotificationHtml($booking),
                function ($message) use ($adminEmail, $booking) {
                    $message->to($adminEmail)
                        ->subject('New Booking: ' . $booking->booking_reference)
                        ->from(env('MAIL_FROM_ADDRESS', 'noreply@gmsafaris.co.tz'), 'Golden Memories Safaris');
                }
            );

            // Send auto-reply to customer
            Mail::html(
                $this->buildCustomerConfirmationHtml($booking),
                function ($message) use ($booking) {
                    $message->to($booking->email, $booking->full_name)
                        ->subject('Booking Confirmation - ' . $booking->booking_reference)
                        ->from(env('MAIL_FROM_ADDRESS', 'noreply@gmsafaris.co.tz'), 'Golden Memories Safaris');
                }
            );
        } catch (\Throwable $e) {
            // Log email error but don't break the booking flow
            \Log::error('Booking email failed: ' . $e->getMessage());
        }
    }

    /**
     * Build HTML email for admin notification.
     */
    private function buildAdminNotificationHtml(Booking $booking): string
    {
        $safariName = $booking->safari ? $booking->safari->title : ($booking->safari_type ?? 'N/A');
        return "
            <h2>New Booking Received</h2>
            <p><strong>Reference:</strong> {$booking->booking_reference}</p>
            <p><strong>Package:</strong> {$safariName}</p>
            <p><strong>Customer:</strong> {$booking->full_name}</p>
            <p><strong>Email:</strong> {$booking->email}</p>
            <p><strong>Phone:</strong> {$booking->phone}</p>
            <p><strong>Travel Month:</strong> {$booking->travel_month}</p>
            <p><strong>Adults:</strong> {$booking->number_of_adults}</p>
            <p><strong>Children:</strong> {$booking->number_of_children}</p>
            <p><strong>Accommodation:</strong> {$booking->accommodation_style}</p>
            <p><strong>Message:</strong> {$booking->special_requests}</p>
            <p><a href='" . route('admin.bookings.show', $booking) . "'>View in Admin Panel</a></p>
        ";
    }

    /**
     * Build HTML email for customer confirmation.
     */
    private function buildCustomerConfirmationHtml(Booking $booking): string
    {
        $safariName = $booking->safari ? $booking->safari->title : ($booking->safari_type ?? 'N/A');
        return "
            <h2>Thank You for Your Booking Request!</h2>
            <p>Dear {$booking->full_name},</p>
            <p>Thank you for choosing Golden Memories Safaris! We have received your booking request and our team will review it shortly.</p>
            <h3>Booking Summary</h3>
            <p><strong>Reference:</strong> {$booking->booking_reference}</p>
            <p><strong>Package:</strong> {$safariName}</p>
            <p><strong>Travel Month:</strong> {$booking->travel_month}</p>
            <p><strong>Adults:</strong> {$booking->number_of_adults}</p>
            <p><strong>Children:</strong> {$booking->number_of_children}</p>
            <p><strong>Accommodation:</strong> {$booking->accommodation_style}</p>
            <h3>Next Steps</h3>
            <p>One of our safari specialists will contact you within 24 hours to discuss your trip, refine details, and provide a personalized quote.</p>
            <p>If you have any immediate questions, please contact us:</p>
            <p>Phone: +255 786 383 273</p>
            <p>Email: info@gmsafaris.co.tz</p>
            <p>Warm regards,<br>Golden Memories Safaris Team</p>
        ";
    }
}
