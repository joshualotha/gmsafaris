<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=DM+Sans:wght@400;500;700&display=swap');
    
    body { margin: 0; padding: 0; background-color: #F2EBE0; font-family: 'DM Sans', Arial, sans-serif; color: #1C1812; }
    table { border-collapse: collapse; }
    .email-container { max-width: 600px; margin: 40px auto; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(28,24,18,0.08); }
    .email-header { background-color: #1C1812; padding: 40px 30px; text-align: center; }
    .email-header img { max-width: 180px; height: auto; }
    .email-body { padding: 40px 30px; background-color: #ffffff; }
    .email-footer { background-color: #F9F7F3; padding: 30px; text-align: center; border-top: 1px solid rgba(28,24,18,0.05); }
    h1, h2, h3 { font-family: 'Cormorant Garamond', Georgia, serif; color: #1C1812; font-weight: 600; margin-top: 0; }
    h1 { font-size: 32px; line-height: 1.2; margin-bottom: 20px; }
    h2 { font-size: 24px; color: #C4714A; margin-bottom: 15px; }
    h3 { font-size: 20px; color: #1C1812; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 1px; font-family: 'DM Sans', Arial, sans-serif; font-weight: 700; font-size: 14px; }
    p { font-size: 16px; line-height: 1.6; color: #3D5A3E; margin: 0 0 16px 0; }
    .btn { display: inline-block; background-color: #C4714A; color: #F2EBE0 !important; text-decoration: none; padding: 14px 36px; border-radius: 999px; font-weight: bold; text-transform: uppercase; letter-spacing: 1.5px; font-size: 13px; margin-top: 10px; margin-bottom: 10px; }
    .summary-box { background-color: #F9F7F3; padding: 25px; border-radius: 12px; margin: 25px 0; border-left: 4px solid #C4714A; }
    .summary-item { margin-bottom: 15px; }
    .summary-item:last-child { margin-bottom: 0; }
    .summary-label { font-size: 11px; text-transform: uppercase; color: #C4714A; letter-spacing: 1.5px; display: block; margin-bottom: 4px; font-weight: 700; }
    .summary-value { font-size: 16px; color: #1C1812; font-weight: 500; margin: 0; }
    .divider { height: 1px; background-color: rgba(28,24,18,0.08); margin: 30px 0; }
    .alert { background-color: #C4714A; color: #ffffff; padding: 12px 20px; text-align: center; border-radius: 8px; font-weight: 700; font-size: 14px; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 25px; }
</style>
<!--[if mso]>
<style>
    body, table, td, h1, h2, h3, p, a { font-family: Arial, sans-serif !important; }
</style>
<![endif]-->
</head>
<body style="margin: 0; padding: 0; background-color: #F2EBE0;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #F2EBE0; padding: 40px 10px;">
        <tr>
            <td align="center">
                <table class="email-container" width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 16px; overflow: hidden; max-width: 600px; margin: 0 auto; box-shadow: 0 4px 20px rgba(28,24,18,0.08);">
                    <!-- Header -->
                    <tr>
                        <td class="email-header" style="background-color: #1C1812; padding: 40px 30px; text-align: center;">
                            <a href="{{ url('/') }}">
                                <!-- Assuming the logo is white text on dark bg, or a golden logo -->
                                <img src="{{ asset('img/logo.png') }}" alt="Golden Memories Safaris" style="max-width: 180px; height: auto;">
                            </a>
                        </td>
                    </tr>
                    
                    <!-- Content -->
                    <tr>
                        <td class="email-body" style="padding: 40px 30px; background-color: #ffffff;">
                            @yield('content')
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td class="email-footer" style="background-color: #F9F7F3; padding: 35px 30px; text-align: center; border-top: 1px solid rgba(28,24,18,0.05);">
                            <p style="font-family: 'Cormorant Garamond', Georgia, serif; font-size: 22px; color: #1C1812; font-style: italic; margin-bottom: 12px;">Experience the Wild, Live the Memories</p>
                            <p style="font-size: 13px; color: #3D5A3E; margin-bottom: 5px;">Golden Memories Safaris &bull; Arusha, Tanzania</p>
                            <p style="font-size: 13px; color: #3D5A3E; margin-bottom: 0;">+255 786 383 273 &bull; <a href="mailto:info@gmsafaris.co.tz" style="color: #C4714A; text-decoration: none; font-weight: bold;">info@gmsafaris.co.tz</a></p>
                        </td>
                    </tr>
                </table>
                <!-- Unsubscribe / Meta text -->
                <table width="600" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: 0 auto;">
                    <tr>
                        <td style="padding: 20px; text-align: center;">
                            <p style="font-size: 11px; color: #8C6D52; margin: 0;">This email was sent automatically from Golden Memories Safaris.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
