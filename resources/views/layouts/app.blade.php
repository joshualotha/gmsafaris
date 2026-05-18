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
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="https://use.fontawesome.com">
    <link rel="preconnect" href="https://cdn.gtranslate.net">
    <link rel="preconnect" href="https://www.google-analytics.com">

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

    <!-- Preload critical CSS (starts download early, doesn't block render) -->
    <link rel="preload" href="{{ asset('css/bootstrap.min.css') }}" as="style" fetchpriority="high">
    <link rel="preload" href="{{ asset('css/style.min.css') }}" as="style">

    <!-- Bootstrap CSS (deferred via media-swap to avoid render-blocking) -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" media="print" onload="this.media='all'; this.onload=null;">
    <noscript><link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"></noscript>

    <!-- Template Stylesheet (deferred the same way) -->
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet" media="print" onload="this.media='all'; this.onload=null;">
    <noscript><link href="{{ asset('css/style.min.css') }}" rel="stylesheet"></noscript>

    <!-- Critical inline styles — applied immediately to prevent FOUC on hero + layout -->
    <style>
        /* Base reset so page is usable while CSS loads */
        body { font-family: 'Open Sans', sans-serif; color: #333; background: #fff; margin: 0; padding: 0; }
        img { max-width: 100%; height: auto; display: block; }
        .hero-section { position: relative; overflow: hidden; background: #111; }
        .hero-carousel .owl-item { position: relative; }
        .hero-carousel .carousel-image-container img { width: 100%; height: 100%; object-fit: cover; filter: brightness(.45); }
        .hero-carousel .carousel-caption-gms { position: absolute; top: 50%; left: 8%; transform: translateY(-50%); color: #fff; z-index: 3; max-width: 50%; }
        .hero-carousel .carousel-caption-gms h1 { color: #fff; font-size: 5rem; font-weight: 900; letter-spacing: 1px; text-shadow: 0 4px 16px rgba(0,0,0,.7); }
        .hero-carousel .carousel-caption-gms .gold-text { color: #d69c40; }
        .hero-carousel .carousel-caption-gms p { font-size: 1.4rem; line-height: 1.7; text-shadow: 0 2px 8px rgba(0,0,0,.6); }
        .gold-btn { background-color: #d69c40; color: #fff; padding: 10px 20px; border-radius: 5px; font-weight: bold; text-decoration: none; display: inline-block; }
        .gold-outline-btn { color: #d69c40; border: 2px solid #d69c40; padding: 10px 20px; border-radius: 5px; font-weight: bold; text-decoration: none; display: inline-block; background: transparent; }
        .nav-bar { background: #fff; }
        .topbar { background: linear-gradient(135deg,#d69c40,#e8b84b); padding: 3px 0; }
        @media (max-width: 992px) {
            .hero-carousel .carousel-caption-gms { left: 0; right: 0; max-width: 96%; margin: 0 auto; text-align: center; padding: 0 10px; }
            .hero-carousel .carousel-caption-gms h1 { font-size: 3.2rem; }
            .hero-carousel .carousel-caption-gms p { font-size: 1.1rem; }
            .hero-carousel .owl-item { height: 70vh; }
        }
        @media (max-width: 480px) {
            .hero-carousel .carousel-caption-gms h1 { font-size: 2.6rem; }
            .hero-carousel .carousel-caption-gms p { font-size: 1rem; }
            .hero-carousel .owl-item { height: 60vh; }
        }
    </style>

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

    <!-- Global Mobile Optimizations -->
    <style>
        /* Reduce giant vertical padding on mobile */
        @media (max-width: 575px) {
            .py-6 { padding-top: 3rem !important; padding-bottom: 3rem !important; }
            .my-6 { margin-top: 3rem !important; margin-bottom: 3rem !important; }
            .display-5 { font-size: 2rem !important; }
            .display-3 { font-size: 2.2rem !important; }
        }
        @media (max-width: 767px) {
            .py-6 { padding-top: 4rem !important; padding-bottom: 4rem !important; }
        }

        /* Ensure images never overflow on mobile */
        img { max-width: 100%; height: auto; }

        /* Fix testimonial quote icon positioning */
        .testimonial-item { position: relative; }

        /* Breadcrumb text wrap fix */
        .breadcrumb-item { white-space: normal !important; }

        /* Search modal — full width on mobile */
        @media (max-width: 575px) {
            .search-modal-form { width: 100% !important; }
        }

        /* Better tap targets for mobile nav links */
        @media (max-width: 767.98px) {
            .navbar-nav .nav-link {
                padding: 12px 16px !important;
                font-size: 1rem;
            }
            .dropdown-item {
                padding: 10px 24px !important;
            }
            /* Smaller brand logo on mobile */
            .navbar-brand img {
                max-height: 38px !important;
                width: auto;
            }
        }
        @media (max-width: 575px) {
            .navbar-brand img {
                max-height: 32px !important;
            }
        }

        /* Fix filter bar on safaris page for mobile */
        @media (max-width: 575px) {
            .filter-bar .btn { font-size: 0.8rem; padding: 4px 10px; }
        }

        /* Touch target sizing — accessible minimum without breaking design */
        .navbar-toggler,
        .btn-search,
        .btn-close {
            min-height: 44px;
            min-width: 44px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .owl-dot {
            min-height: 32px;
            min-width: 32px;
        }
    </style>

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

    @include('partials.topbar')
    @include('partials.navbar')
    @include('partials.search-modal')

    @yield('content')
    <main id="main-content">
        @yield('body_content')
    </main>

    @include('partials.footer')
    @include('partials.scripts')

    @yield('extra_scripts')

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
            left: 24px;
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
                left: 16px;
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


</body>

</html>