<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Cancelled — {{ $joinSafari->title }}</title>
    <style>
        body { margin: 0; padding: 0; font-family: Arial, sans-serif; background: #f4f4f4; }
        .container { max-width: 600px; margin: 0 auto; background: #ffffff; }
        .header { background: #c0392b; padding: 30px; text-align: center; }
        .header h1 { color: #ffffff; margin: 0; font-size: 22px; }
        .content { padding: 30px; }
        .vehicle-box { background: #fff3cd; border: 1px solid #ffc107; border-radius: 8px; padding: 15px; margin: 20px 0; }
        .details { background: #f8f9fa; padding: 15px; border-radius: 8px; margin: 20px 0; }
        .details table { width: 100%; border-collapse: collapse; }
        .details table td, .details table th { padding: 8px; border-bottom: 1px solid #dee2e6; text-align: left; }
        .warning { color: #c0392b; font-weight: bold; }
        .footer { background: #2c3e50; padding: 20px; text-align: center; color: #ffffff; font-size: 13px; }
        .btn { display: inline-block; background: #c0392b; color: #ffffff; text-decoration: none; padding: 12px 25px; border-radius: 5px; font-weight: bold; }
        .btn-primary { background: #007bff; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>⚠️ Vehicle Cancellation Notice</h1>
        </div>
        <div class="content">
            <p>Dear {{ $participant->name }},</p>

            <p>We regret to inform you that <strong>Vehicle #{{ $vehicle->vehicle_number }}</strong> for your upcoming group safari has been <span class="warning">cancelled</span>.</p>

            <div class="vehicle-box">
                <p style="margin: 0;">
                    <strong>Reason:</strong> The minimum requirement of {{ $vehicle->min_required }} participants was not met (only {{ $vehicle->seats_filled }} confirmed).
                </p>
            </div>

            <p>Here are the details of the affected safari:</p>

            <div class="details">
                <table>
                    <tr>
                        <th style="width: 40%;">Safari</th>
                        <td>{{ $joinSafari->title }}</td>
                    </tr>
                    @if($joinSafari->location)
                    <tr>
                        <th>Location</th>
                        <td>{{ $joinSafari->location }}</td>
                    </tr>
                    @endif
                    <tr>
                        <th>Start Date</th>
                        <td>{{ $joinSafari->start_date->format('F d, Y') }}</td>
                    </tr>
                    @if($joinSafari->end_date)
                    <tr>
                        <th>End Date</th>
                        <td>{{ $joinSafari->end_date->format('F d, Y') }}</td>
                    </tr>
                    @endif
                    <tr>
                        <th>Vehicle</th>
                        <td>Vehicle #{{ $vehicle->vehicle_number }}</td>
                    </tr>
                    <tr>
                        <th>Your Booking</th>
                        <td>{{ $participant->number_of_people }} person(s)</td>
                    </tr>
                </table>
            </div>

            <p><strong>What happens next?</strong></p>
            <ul>
                <li>Your booking for this specific vehicle has been cancelled at no charge.</li>
                <li>If there are other available vehicles for this safari, you may be able to join one of them.</li>
                <li>You can also browse other available group safaris or contact us for a private safari arrangement.</li>
            </ul>

            <p style="margin: 25px 0;">
                <a href="{{ route('join-safari.index') }}" class="btn">Browse Other Safaris</a>
                <a href="{{ route('contact') }}" class="btn btn-primary" style="margin-left: 10px;">Contact Us</a>
            </p>

            <p>We sincerely apologize for any inconvenience. If you have any questions or need assistance finding an alternative safari, please don't hesitate to reach out.</p>

            <p>Warm regards,<br><strong>GMS Safaris Team</strong></p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} GMS Safaris. All rights reserved.</p>
            <p style="margin: 5px 0;">Tanzania Safari Experts</p>
        </div>
    </div>
</body>
</html>
