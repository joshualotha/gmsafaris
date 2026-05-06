@extends('emails.layout')

@section('content')
    <h1 style="text-align: center;">Your Journey Begins.</h1>
    <p>Dear {{ $booking->full_name }},</p>
    <p>Thank you for choosing Golden Memories Safaris. We have safely received your booking request, and we are thrilled at the prospect of guiding you through the wonders of Tanzania.</p>
    
    <p>Our safari specialists are currently reviewing your preferences and will be crafting a tailored experience just for you. We will be in touch within 24 hours.</p>

    <div class="divider"></div>

    <h3>Booking Summary</h3>
    <div class="summary-box">
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td class="summary-item">
                    <span class="summary-label">Reference ID</span>
                    <p class="summary-value">{{ $booking->booking_reference }}</p>
                </td>
            </tr>
            <tr>
                <td class="summary-item">
                    <span class="summary-label">Package</span>
                    <p class="summary-value">{{ $safariName }}</p>
                </td>
            </tr>
            <tr>
                <td class="summary-item">
                    <span class="summary-label">Travel Window</span>
                    <p class="summary-value">{{ $booking->travel_month }}</p>
                </td>
            </tr>
            <tr>
                <td class="summary-item">
                    <span class="summary-label">Travelers</span>
                    <p class="summary-value">{{ $booking->number_of_adults }} Adults, {{ $booking->number_of_children }} Children</p>
                </td>
            </tr>
        </table>
    </div>

    <h3>Next Steps</h3>
    <p>1. Our specialists will review your preferences.<br>
       2. We will curate a personalized itinerary.<br>
       3. You will receive a detailed proposal and quote within 24 hours.</p>

    <div style="text-align: center; margin-top: 30px;">
        <a href="{{ url('/') }}" class="btn">Explore More Destinations</a>
    </div>
@endsection
