@extends('emails.layout')

@section('content')
    <div class="alert" style="background-color: #3D5A3E;">New Inquiry Received</div>

    <h1>Inquiry from {{ $inquiry->name }}</h1>
    <p>A new general or package inquiry has been received. Please review and reply to the customer within 24 hours.</p>

    <div class="summary-box">
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td class="summary-item">
                    <span class="summary-label">Name</span>
                    <p class="summary-value">{{ $inquiry->name }}</p>
                </td>
            </tr>
            <tr>
                <td class="summary-item">
                    <span class="summary-label">Email</span>
                    <p class="summary-value"><a href="mailto:{{ $inquiry->email }}" style="color: #C4714A; text-decoration: none;">{{ $inquiry->email }}</a></p>
                </td>
            </tr>
            <tr>
                <td class="summary-item">
                    <span class="summary-label">Phone</span>
                    <p class="summary-value">{{ $inquiry->phone ?? '—' }}</p>
                </td>
            </tr>
            <tr>
                <td class="summary-item">
                    <span class="summary-label">Country</span>
                    <p class="summary-value">{{ $inquiry->country ?? '—' }}</p>
                </td>
            </tr>
            <tr>
                <td class="summary-item">
                    <span class="summary-label">Subject</span>
                    <p class="summary-value">{{ $inquiry->subject ?? '—' }}</p>
                </td>
            </tr>
            <tr>
                <td class="summary-item">
                    <span class="summary-label">Package of Interest</span>
                    <p class="summary-value">{{ $safariName }}</p>
                </td>
            </tr>
        </table>
    </div>

    <div class="summary-box" style="background-color: #ffffff; border: 1px solid rgba(28,24,18,0.1); border-left: 4px solid #C4714A;">
        <span class="summary-label" style="color: #C4714A;">Message</span>
        <p style="margin: 0; color: #1C1812; font-size: 15px; white-space: pre-wrap;">{{ $inquiry->message }}</p>
    </div>

    <div style="text-align: center; margin-top: 30px;">
        <a href="mailto:{{ $inquiry->email }}" class="btn" style="background-color: #3D5A3E;">Reply to Customer</a>
    </div>
@endsection
