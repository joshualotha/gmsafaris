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
        $safaris = Safari::active()->ordered()->get();
        $selectedSafari = null;

        if ($slug) {
            $selectedSafari = Safari::where('slug', $slug)->active()->first();
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
            $brandColor = '#C8A45C'; // Gold accent
            $darkBg = '#1a1a2e';     // Dark navy

            // Notify admin — professional branded HTML email
            Mail::html(
                '<!DOCTYPE html>
                <html>
                <head><meta charset="UTF-8"></head>
                <body style="margin:0;padding:0;background-color:#f4f4f4;font-family:Arial,Helvetica,sans-serif;">
                    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f4;padding:20px 0;">
                        <tr>
                            <td align="center">
                                <table width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,0.1);">
                                    <!-- Header -->
                                    <tr>
                                        <td style="background-color:' . $darkBg . ';padding:30px 40px;text-align:center;">
                                            <h1 style="color:#ffffff;margin:0;font-size:22px;font-weight:700;">Golden Memories Safaris</h1>
                                            <p style="color:' . $brandColor . ';margin:5px 0 0 0;font-size:14px;">New Inquiry Received</p>
                                        </td>
                                    </tr>
                                    <!-- Badge -->
                                    <tr>
                                        <td style="padding:0 40px;">
                                            <table width="100%" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td style="background-color:' . $brandColor . ';padding:10px 20px;text-align:center;border-radius:0 0 4px 4px;">
                                                        <span style="color:#ffffff;font-size:14px;font-weight:700;">&#9888; Action Required — Respond within 24 hours</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <!-- Body -->
                                    <tr>
                                        <td style="padding:30px 40px;">
                                            <table width="100%" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td style="padding:8px 0;border-bottom:1px solid #eeeeee;">
                                                        <strong style="color:' . $darkBg . ';font-size:13px;text-transform:uppercase;">Name</strong>
                                                        <p style="margin:4px 0 0 0;color:#333333;font-size:15px;">' . e($inquiry->name) . '</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:8px 0;border-bottom:1px solid #eeeeee;">
                                                        <strong style="color:' . $darkBg . ';font-size:13px;text-transform:uppercase;">Email</strong>
                                                        <p style="margin:4px 0 0 0;color:#333333;font-size:15px;"><a href="mailto:' . e($inquiry->email) . '" style="color:' . $brandColor . ';text-decoration:none;">' . e($inquiry->email) . '</a></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:8px 0;border-bottom:1px solid #eeeeee;">
                                                        <strong style="color:' . $darkBg . ';font-size:13px;text-transform:uppercase;">Phone</strong>
                                                        <p style="margin:4px 0 0 0;color:#333333;font-size:15px;">' . e($inquiry->phone ?? '—') . '</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:8px 0;border-bottom:1px solid #eeeeee;">
                                                        <strong style="color:' . $darkBg . ';font-size:13px;text-transform:uppercase;">Country</strong>
                                                        <p style="margin:4px 0 0 0;color:#333333;font-size:15px;">' . e($inquiry->country ?? '—') . '</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:8px 0;border-bottom:1px solid #eeeeee;">
                                                        <strong style="color:' . $darkBg . ';font-size:13px;text-transform:uppercase;">Subject</strong>
                                                        <p style="margin:4px 0 0 0;color:#333333;font-size:15px;">' . e($inquiry->subject ?? '—') . '</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:8px 0;border-bottom:1px solid #eeeeee;">
                                                        <strong style="color:' . $darkBg . ';font-size:13px;text-transform:uppercase;">Package</strong>
                                                        <p style="margin:4px 0 0 0;color:#333333;font-size:15px;">' . e($safariName) . '</p>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div style="margin-top:20px;padding:15px;background-color:#f9f9f9;border-left:4px solid ' . $brandColor . ';border-radius:4px;">
                                                <strong style="color:' . $darkBg . ';font-size:13px;text-transform:uppercase;">Message</strong>
                                                <p style="margin:8px 0 0 0;color:#555555;font-size:14px;line-height:1.6;">' . nl2br(e($inquiry->message)) . '</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Footer -->
                                    <tr>
                                        <td style="background-color:' . $darkBg . ';padding:20px 40px;text-align:center;">
                                            <p style="color:#999999;font-size:12px;margin:0;">Golden Memories Safaris &bull; Arusha, Tanzania</p>
                                            <p style="color:#666666;font-size:11px;margin:5px 0 0 0;">Phone: +255 786 383 273 &bull; Email: info@gmsafaris.co.tz</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </body>
                </html>',
                function ($message) use ($adminEmail) {
                    $message->to($adminEmail)
                        ->subject('New Inquiry from ' . request()->input('name') . ' — Golden Memories Safaris')
                        ->from(env('MAIL_FROM_ADDRESS', 'noreply@gmsafaris.co.tz'), 'Golden Memories Safaris');
                }
            );

            // Auto-reply to customer — warm, branded, trust-building
            Mail::html(
                '<!DOCTYPE html>
                <html>
                <head><meta charset="UTF-8"></head>
                <body style="margin:0;padding:0;background-color:#f4f4f4;font-family:Arial,Helvetica,sans-serif;">
                    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f4;padding:20px 0;">
                        <tr>
                            <td align="center">
                                <table width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,0.1);">
                                    <!-- Header -->
                                    <tr>
                                        <td style="background-color:' . $darkBg . ';padding:30px 40px;text-align:center;">
                                            <h1 style="color:#ffffff;margin:0;font-size:22px;font-weight:700;">&#127775; Thank You!</h1>
                                            <p style="color:' . $brandColor . ';margin:5px 0 0 0;font-size:14px;">Your inquiry has been received</p>
                                        </td>
                                    </tr>
                                    <!-- Body -->
                                    <tr>
                                        <td style="padding:30px 40px;">
                                            <p style="color:#333333;font-size:16px;line-height:1.6;margin:0 0 20px 0;">Dear <strong>' . e($inquiry->name) . '</strong>,</p>
                                            <p style="color:#555555;font-size:15px;line-height:1.6;margin:0 0 20px 0;">Thank you for reaching out to <strong>Golden Memories Safaris</strong>! We have received your inquiry and our team will review it shortly.</p>

                                            <div style="background-color:' . $brandColor . ';padding:15px 20px;border-radius:6px;margin:20px 0;text-align:center;">
                                                <p style="color:#ffffff;font-size:16px;font-weight:700;margin:0;">We will contact you within 24 hours</p>
                                            </div>

                                            <h3 style="color:' . $darkBg . ';font-size:15px;margin:20px 0 10px 0;text-transform:uppercase;">Your Inquiry Summary</h3>
                                            <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f9f9f9;border-radius:6px;">
                                                <tr>
                                                    <td style="padding:15px 20px;">
                                                        <p style="margin:0 0 5px 0;color:#999999;font-size:12px;text-transform:uppercase;">Subject</p>
                                                        <p style="margin:0 0 15px 0;color:#333333;font-size:15px;">' . e($inquiry->subject ?? 'General Inquiry') . '</p>
                                                        <p style="margin:0 0 5px 0;color:#999999;font-size:12px;text-transform:uppercase;">Package</p>
                                                        <p style="margin:0 0 15px 0;color:#333333;font-size:15px;">' . e($safariName) . '</p>
                                                        <p style="margin:0 0 5px 0;color:#999999;font-size:12px;text-transform:uppercase;">Your Message</p>
                                                        <p style="margin:0;color:#555555;font-size:14px;line-height:1.5;">' . nl2br(e($inquiry->message)) . '</p>
                                                    </td>
                                                </tr>
                                            </table>

                                            <h3 style="color:' . $darkBg . ';font-size:15px;margin:25px 0 10px 0;text-transform:uppercase;">Next Steps</h3>
                                            <ol style="color:#555555;font-size:14px;line-height:1.8;padding-left:20px;margin:0 0 20px 0;">
                                                <li>One of our safari specialists will review your inquiry</li>
                                                <li>We will create a personalized itinerary tailored to your preferences</li>
                                                <li>You will receive a detailed quote within 24 hours</li>
                                                <li>Feel free to ask questions — we are here to help!</li>
                                            </ol>

                                            <div style="border-top:2px solid #eeeeee;margin:25px 0 20px 0;padding-top:20px;">
                                                <p style="color:#555555;font-size:14px;line-height:1.6;margin:0 0 10px 0;">If you have any immediate questions, please contact us directly:</p>
                                                <table cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td style="padding:5px 15px 5px 0;color:#333333;font-size:14px;">&#128222;</td>
                                                        <td style="color:#333333;font-size:14px;">+255 786 383 273</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:5px 15px 5px 0;color:#333333;font-size:14px;">&#9993;</td>
                                                        <td style="color:#333333;font-size:14px;"><a href="mailto:info@gmsafaris.co.tz" style="color:' . $brandColor . ';text-decoration:none;">info@gmsafaris.co.tz</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:5px 15px 5px 0;color:#333333;font-size:14px;">&#127760;</td>
                                                        <td style="color:#333333;font-size:14px;"><a href="https://gmsafaris.co.tz" style="color:' . $brandColor . ';text-decoration:none;">gmsafaris.co.tz</a></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Footer -->
                                    <tr>
                                        <td style="background-color:' . $darkBg . ';padding:20px 40px;text-align:center;">
                                            <p style="color:#ffffff;font-size:14px;margin:0 0 5px 0;font-weight:700;">Golden Memories Safaris</p>
                                            <p style="color:#999999;font-size:12px;margin:0;">Arusha, Tanzania &bull; Experience the Wild, Live the Memories</p>
                                            <p style="color:#666666;font-size:11px;margin:10px 0 0 0;">This email was sent automatically. Please do not reply directly to this message.</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </body>
                </html>',
                function ($message) use ($inquiry) {
                    $message->to($inquiry->email, $inquiry->name)
                        ->subject('Thank You for Your Inquiry — Golden Memories Safaris')
                        ->from(env('MAIL_FROM_ADDRESS', 'noreply@gmsafaris.co.tz'), 'Golden Memories Safaris');
                }
            );
        } catch (\Throwable $e) {
            \Log::error('Inquiry email failed: ' . $e->getMessage());
        }
    }
}
