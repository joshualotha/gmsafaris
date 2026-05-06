<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=DM+Sans:wght@400;500;700&display=swap');
    
    body { margin: 0; padding: 0; background-color: #ffffff; font-family: 'DM Sans', Arial, sans-serif; color: #000000; }
    table { border-collapse: collapse; }
    .email-container { max-width: 600px; margin: 40px auto; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.08); border: 1px solid #eeeeee; }
    .email-header { background-color: #ffffff; padding: 40px 30px; text-align: center; border-bottom: 2px solid #d69c40; }
    .email-header img { max-width: 180px; height: auto; }
    .email-body { padding: 40px 30px; background-color: #ffffff; }
    .email-footer { background-color: #f9f9f9; padding: 30px; text-align: center; border-top: 1px solid rgba(0,0,0,0.05); }
    h1, h2, h3 { font-family: 'Cormorant Garamond', Georgia, serif; color: #000000; font-weight: 600; margin-top: 0; }
    h1 { font-size: 32px; line-height: 1.2; margin-bottom: 20px; }
    h2 { font-size: 24px; color: #d69c40; margin-bottom: 15px; }
    h3 { font-size: 20px; color: #000000; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 1px; font-family: 'DM Sans', Arial, sans-serif; font-weight: 700; font-size: 14px; }
    p { font-size: 16px; line-height: 1.6; color: #000000; margin: 0 0 16px 0; }
    .btn { display: inline-block; background-color: #d69c40; color: #ffffff !important; text-decoration: none; padding: 14px 36px; border-radius: 999px; font-weight: bold; text-transform: uppercase; letter-spacing: 1.5px; font-size: 13px; margin-top: 10px; margin-bottom: 10px; }
    .summary-box { background-color: #fafafa; padding: 25px; border-radius: 12px; margin: 25px 0; border-left: 4px solid #d69c40; }
    .summary-item { margin-bottom: 15px; }
    .summary-item:last-child { margin-bottom: 0; }
    .summary-label { font-size: 11px; text-transform: uppercase; color: #d69c40; letter-spacing: 1.5px; display: block; margin-bottom: 4px; font-weight: 700; }
    .summary-value { font-size: 16px; color: #000000; font-weight: 500; margin: 0; }
    .divider { height: 1px; background-color: rgba(0,0,0,0.08); margin: 30px 0; }
    .alert { background-color: #d69c40; color: #ffffff; padding: 12px 20px; text-align: center; border-radius: 8px; font-weight: 700; font-size: 14px; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 25px; }
</style>
<!--[if mso]>
<style>
    body, table, td, h1, h2, h3, p, a { font-family: Arial, sans-serif !important; }
</style>
<![endif]-->
</head>
<body style="margin: 0; padding: 0; background-color: #ffffff;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #ffffff; padding: 40px 10px;">
        <tr>
            <td align="center">
                <table class="email-container" width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 16px; overflow: hidden; max-width: 600px; margin: 0 auto; box-shadow: 0 4px 20px rgba(0,0,0,0.08); border: 1px solid #eeeeee;">
                    <!-- Header -->
                    <tr>
                        <td class="email-header" style="background-color: #ffffff; padding: 40px 30px; text-align: center; border-bottom: 2px solid #d69c40;">
                            <a href="{{ url('/') }}">
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
                        <td class="email-footer" style="background-color: #f9f9f9; padding: 35px 30px; text-align: center; border-top: 1px solid rgba(0,0,0,0.05);">
                            <p style="font-family: 'Cormorant Garamond', Georgia, serif; font-size: 22px; color: #000000; font-style: italic; margin-bottom: 12px;">Experience the Wild, Live the Memories</p>
                            <p style="font-size: 13px; color: #000000; margin-bottom: 5px;">Golden Memories Safaris &bull; Arusha, Tanzania</p>
                            <p style="font-size: 13px; color: #000000; margin-bottom: 0;">+255 786 383 273 &bull; <a href="mailto:info@gmsafaris.co.tz" style="color: #d69c40; text-decoration: none; font-weight: bold;">info@gmsafaris.co.tz</a></p>
                        </td>
                    </tr>
                </table>
                <!-- Unsubscribe / Meta text -->
                <table width="600" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: 0 auto;">
                    <tr>
                        <td style="padding: 20px; text-align: center;">
                            <p style="font-size: 11px; color: #888888; margin: 0;">This email was sent automatically from Golden Memories Safaris.</p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
