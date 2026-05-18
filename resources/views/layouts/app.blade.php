<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-K1D1ZVHS4L"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-K1D1ZVHS4L');
    </script>

    <meta charset="utf-8">
    <title>@yield('title', 'Golden Memories Safaris - Tanzania Tour Operator')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="@yield('keywords', 'Tanzania safari, Serengeti tours, Kilimanjaro climbs, Zanzibar holidays, wildlife adventures, Golden Memories Safaris')" name="keywords">
    <meta content="@yield('description', 'Golden Memories Safaris - Premium Tanzania safari tours, wildlife adventures, Kilimanjaro treks, and Zanzibar escapes. Create lifelong memories.')" name="description">
    <link rel="icon" href="{{ asset('img/logo.webp') }}" type="image/webp">
    <link rel="alternate icon" href="{{ asset('img/logo.png') }}" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="https://use.fontawesome.com">

    <!-- Preload hero image with responsive media queries for LCP optimization -->
    <link rel="preload" as="image" href="{{ asset('img/serengeti-wildlife-safari-480w.webp') }}" media="(max-width: 480px)" fetchpriority="high">
    <link rel="preload" as="image" href="{{ asset('img/serengeti-wildlife-safari-768w.webp') }}" media="(min-width: 481px) and (max-width: 768px)" fetchpriority="high">
    <link rel="preload" as="image" href="{{ asset('img/serengeti-wildlife-safari.webp') }}" media="(min-width: 769px)" fetchpriority="high">

    <!-- SEO Meta Tags -->
    <link rel="canonical" href="@yield('canonical', 'https://www.gmsafaris.co.tz/')">

    <!-- Hreflang Tags for International SEO -->
    <!-- Currently only English content is available. Language-specific routes (/de/, /fr/, /it/) do not exist yet.
         When multilingual pages are created, add proper hreflang tags pointing to each language version. -->
    <link rel="alternate" href="https://www.gmsafaris.co.tz/" hreflang="en" />
    <link rel="alternate" href="https://www.gmsafaris.co.tz/" hreflang="x-default" />

    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og_title', 'Golden Memories Safaris | Premium Tanzania Safari Tours')">
    <meta property="og:description" content="@yield('og_description', 'Golden Memories Safaris - Premium Tanzania safari tours, wildlife adventures, Kilimanjaro treks, and Zanzibar escapes. Create lifelong memories.')">
    <meta property="og:url" content="@yield('og_url', 'https://www.gmsafaris.co.tz/')">
    <meta property="og:image" content="@yield('og_image', 'https://www.gmsafaris.co.tz/img/serengeti-wildlife-safari.webp')">
    <meta property="og:site_name" content="Golden Memories Safaris">
    <meta property="og:locale" content="en_US">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'Golden Memories Safaris | Premium Tanzania Safari Tours')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Golden Memories Safaris - Premium Tanzania safari tours, wildlife adventures, Kilimanjaro treks, and Zanzibar escapes. Create lifelong memories.')">
    <meta name="twitter:image" content="@yield('twitter_image', 'https://www.gmsafaris.co.tz/img/serengeti-wildlife-safari.webp')">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Golden Memories Safaris">
    <meta name="geo.region" content="TZ-01">
    <meta name="geo.placename" content="Arusha, Tanzania">

    <!-- Google Web Fonts (preconnect for performance) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playball&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playball&display=swap" rel="stylesheet"></noscript>

    <!-- Bootstrap CSS (synchronous; required for site layout/styling) -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Deferred Non-Critical Stylesheets -->
    <link rel="preload" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"></noscript>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet"></noscript>
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet"></noscript>
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet"></noscript>
    <link href="{{ asset('lib/owlcarousel/owl.carousel.min.css') }}" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link href="{{ asset('lib/owlcarousel/owl.carousel.min.css') }}" rel="stylesheet"></noscript>

    <!-- Template Stylesheet (minified for production) -->
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    @yield('extra_styles')

    <!-- Structured Data (JSON-LD) -->
    @yield('structured_data')
</head>

<body>
    <!-- Spinner Start (hidden by default to avoid blocking LCP) -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center" style="display:none;">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    @include('partials.navbar')
    @include('partials.search-modal')

    @yield('content')
    @yield('body_content')

    @include('partials.footer')
    @include('partials.scripts')

    @yield('extra_scripts')

    <!-- GTranslate Widget (deferred) -->
    <div class="gtranslate_wrapper"></div>
    <script>window.gtranslateSettings = {"default_language":"en","languages":["en","de","it","pl","sv","fr"],"wrapper_selector":".gtranslate_wrapper"}</script>
    <script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>

    <!--Start of Tawk.to Script (loaded after page is fully interactive to avoid blocking LCP)-->
    <script>
    window.addEventListener('load', function() {
        setTimeout(function() {
            var s1=document.createElement("script");
            s1.async=true;
            s1.src='https://embed.tawk.to/6877db8bd0ac26190c844b7d/1j0a3372l';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            document.body.appendChild(s1);
        }, 3000); // 3s delay to let LCP and critical resources load first
    });
    </script>
    <!--End of Tawk.to Script-->

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/255786383273?text=Hello!%20I'm%20interested%20in%20booking%20a%20Tanzania%20safari."
       class="whatsapp-float"
       target="_blank"
       rel="noopener noreferrer"
       aria-label="Chat with us on WhatsApp">
        <div class="whatsapp-float-inner">
            <i class="fab fa-whatsapp whatsapp-icon"></i>
            <span class="whatsapp-text">Chat with us</span>
        </div>
    </a>
    <style>
        .whatsapp-float {
            position: fixed;
            bottom: 24px;
            right: 24px;
            z-index: 9999;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .whatsapp-float:hover {
            transform: translateY(-3px);
        }
        .whatsapp-float-inner {
            display: flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, #25D366, #128C7E);
            color: white;
            padding: 14px 22px;
            border-radius: 50px;
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
            font-family: 'Open Sans', sans-serif;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
        }
        .whatsapp-float:hover .whatsapp-float-inner {
            box-shadow: 0 6px 28px rgba(37, 211, 102, 0.55);
        }
        .whatsapp-float .whatsapp-icon {
            font-size: 26px;
            line-height: 1;
        }
        .whatsapp-float .whatsapp-text {
            white-space: nowrap;
        }
        /* Show only icon on very small screens, full button on larger */
        @media (max-width: 480px) {
            .whatsapp-float {
                bottom: 16px;
                right: 16px;
            }
            .whatsapp-float-inner {
                padding: 12px 14px;
                border-radius: 50px;
            }
            .whatsapp-float .whatsapp-text {
                display: none;
            }
            .whatsapp-float .whatsapp-icon {
                font-size: 30px;
            }
        }
        /* Animate a subtle pulse effect */
        @keyframes whatsapp-pulse {
            0% { box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4); }
            50% { box-shadow: 0 4px 30px rgba(37, 211, 102, 0.7); }
            100% { box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4); }
        }
        .whatsapp-float-inner {
            animation: whatsapp-pulse 2s infinite;
        }
    </style>
    <!-- End Floating WhatsApp Button -->

    <!-- Sticky Mobile Booking Bar (visible only on small screens) -->
    <div class="mobile-booking-bar">
        <div class="container-fluid d-lg-none">
            <div class="row g-0 text-center">
                <div class="col-4">
                    <a href="tel:+255786383273" class="d-block py-2 text-white text-decoration-none mobile-bar-btn">
                        <i class="fas fa-phone-alt me-1"></i> Call
                    </a>
                </div>
                <div class="col-4">
                    <a href="https://wa.me/255786383273?text=Hello!%20I'm%20interested%20in%20booking%20a%20Tanzania%20safari."
                       target="_blank" rel="noopener noreferrer"
                       class="d-block py-2 text-white text-decoration-none mobile-bar-btn">
                        <i class="fab fa-whatsapp me-1"></i> WhatsApp
                    </a>
                </div>
                <div class="col-4">
                    <a href="{{ route('booking') }}" class="d-block py-2 text-white text-decoration-none mobile-bar-btn">
                        <i class="fas fa-calendar-check me-1"></i> Book
                    </a>
                </div>
            </div>
        </div>
    </div>
    <style>
        .mobile-booking-bar {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 9998;
            background: linear-gradient(135deg, #1a1a2e, #16213e);
            box-shadow: 0 -2px 15px rgba(0,0,0,0.2);
            display: none;
        }
        @media (max-width: 991.98px) {
            .mobile-booking-bar {
                display: block !important;
            }
            body {
                padding-bottom: 52px;
            }
        }
        .mobile-bar-btn {
            font-size: 0.85rem;
            font-weight: 600;
            transition: background 0.2s;
        }
        .mobile-bar-btn:hover {
            background: rgba(255,255,255,0.1);
        }
        /* Ensure Tawk.to and WhatsApp float don't overlap the mobile bar */
        @media (max-width: 991.98px) {
            .whatsapp-float {
                bottom: 72px;
            }
        }
    </style>
    <!-- End Sticky Mobile Booking Bar -->
</body>

</html>