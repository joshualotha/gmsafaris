@extends('emails.layout')

@section('content')
    <div class="alert">Action Required — New Booking</div>

    <h1>New Booking Received</h1>
    <p>A new safari booking request has been submitted. Please review the details below and respond within 24 hours.</p>

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
                    <span class="summary-label">Customer</span>
                    <p class="summary-value">{{ $booking->full_name }}</p>
                </td>
            </tr>
            <tr>
                <td class="summary-item">
                    <span class="summary-label">Contact</span>
                    <p class="summary-value"><a href="mailto:{{ $booking->email }}" style="color: #d69c40; text-decoration: none;">{{ $booking->email }}</a><br>{{ $booking->phone }}</p>
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
                    <span class="summary-label">Travel Month</span>
                    <p class="summary-value">{{ $booking->travel_month }}</p>
                </td>
            </tr>
            <tr>
                <td class="summary-item">
                    <span class="summary-label">Travelers</span>
                    <p class="summary-value">{{ $booking->number_of_adults }} Adults, {{ $booking->number_of_children }} Children</p>
                </td>
            </tr>
            <tr>
                <td class="summary-item">
                    <span class="summary-label">Accommodation</span>
                    <p class="summary-value">{{ $booking->accommodation_style }}</p>
                </td>
            </tr>
        </table>
    </div>

    @if($booking->special_requests)
    <div class="summary-box" style="background-color: #ffffff; border: 1px solid rgba(0,0,0,0.1); border-left: 4px solid #d69c40;">
        <span class="summary-label" style="color: #d69c40;">Special Requests</span>
        <p style="margin: 0; color: #000000; font-size: 15px;">{{ $booking->special_requests }}</p>
    </div>
    @endif

    <div style="text-align: center; margin-top: 30px;">
        <a href="{{ route('admin.bookings.show', $booking) }}" class="btn">View in Admin Panel</a>
    </div>
@endsection
