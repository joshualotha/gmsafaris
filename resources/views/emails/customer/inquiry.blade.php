@extends('emails.layout')

@section('content')
    <h1 style="text-align: center;">Thank You.</h1>
    <p>Dear {{ $inquiry->name }},</p>
    <p>Thank you for reaching out to Golden Memories Safaris. We have safely received your inquiry.</p>
    
    <p>Whether you're dreaming of witnessing the Great Migration or relaxing on the shores of Zanzibar, our specialists are reviewing your questions right now. We promise to get back to you within 24 hours with the answers and guidance you need.</p>

    <div class="divider"></div>

    <h3>Your Inquiry Summary</h3>
    <div class="summary-box" style="background-color: #fafafa; border-left-color: #d69c40;">
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td class="summary-item">
                    <span class="summary-label" style="color: #d69c40;">Subject</span>
                    <p class="summary-value">{{ $inquiry->subject ?? 'General Inquiry' }}</p>
                </td>
            </tr>
            <tr>
                <td class="summary-item">
                    <span class="summary-label" style="color: #d69c40;">Package of Interest</span>
                    <p class="summary-value">{{ $safariName }}</p>
                </td>
            </tr>
            <tr>
                <td class="summary-item">
                    <span class="summary-label" style="color: #d69c40;">Your Message</span>
                    <p style="margin: 0; color: #000000; font-size: 15px; font-style: italic;">"{{ \Illuminate\Support\Str::limit($inquiry->message, 150) }}"</p>
                </td>
            </tr>
        </table>
    </div>

    <p>If you have any immediate details to add, simply reply directly to this email.</p>

    <div style="text-align: center; margin-top: 30px;">
        <a href="{{ route('safaris') }}" class="btn">Discover More Journeys</a>
    </div>
@endsection
