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


    <!-- SEO Meta Tags -->
    <link rel="canonical" href="@yield('canonical', 'https://www.gmsafaris.co.tz/')">

    <!-- Hreflang Tags for International SEO -->
    <link rel="alternate" href="https://www.gmsafaris.co.tz/" hreflang="en" />
    <link rel="alternate" href="https://www.gmsafaris.co.tz/" hreflang="x-default" />
    <link rel="alternate" href="https://www.gmsafaris.co.tz/it/" hreflang="it" />
    <link rel="alternate" href="https://www.gmsafaris.co.tz/pl/" hreflang="pl" />
    <link rel="alternate" href="https://www.gmsafaris.co.tz/sv/" hreflang="sv" />
    <link rel="alternate" href="https://www.gmsafaris.co.tz/fr/" hreflang="fr" />
    <link rel="alternate" href="https://www.gmsafaris.co.tz/de/" hreflang="de" />

    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og_title', 'Golden Memories Safaris | Premium Tanzania Safari Tours')">
    <meta property="og:description" content="@yield('og_description', 'Golden Memories Safaris - Premium Tanzania safari tours, wildlife adventures, Kilimanjaro treks, and Zanzibar escapes. Create lifelong memories.')">
    <meta property="og:url" content="@yield('og_url', 'https://www.gmsafaris.co.tz/')">
    <meta property="og:image" content="@yield('og_image', 'https://www.gmsafaris.co.tz/img/hero-1.webp')">
    <meta property="og:site_name" content="Golden Memories Safaris">
    <meta property="og:locale" content="en_US">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'Golden Memories Safaris | Premium Tanzania Safari Tours')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Golden Memories Safaris - Premium Tanzania safari tours, wildlife adventures, Kilimanjaro treks, and Zanzibar escapes. Create lifelong memories.')">
    <meta name="twitter:image" content="@yield('twitter_image', 'https://www.gmsafaris.co.tz/img/hero-1.webp')">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Golden Memories Safaris">
    <meta name="geo.region" content="TZ-01">
    <meta name="geo.placename" content="Arusha, Tanzania">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playball&display=swap" rel="stylesheet" media="print" onload="this.media='all'">

    <!-- Icon Font Stylesheet (deferred — not critical for initial render) -->
    <link rel="preload" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"></noscript>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet"></noscript>

    <!-- Libraries Stylesheet (deferred — not critical for above-fold content) -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet"></noscript>
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet"></noscript>
    <link href="{{ asset('lib/owlcarousel/owl.carousel.min.css') }}" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link href="{{ asset('lib/owlcarousel/owl.carousel.min.css') }}" rel="stylesheet"></noscript>

    <!-- Customized Bootstrap Stylesheet (critical — keep synchronous) -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet (critical — keep synchronous) -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield('extra_styles')

    <!-- Structured Data (JSON-LD) -->
    @yield('structured_data')
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
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

    <div class="gtranslate_wrapper"></div>
    <script>window.gtranslateSettings = {"default_language":"en","languages":["en","it","pl","sv","fr"],"wrapper_selector":".gtranslate_wrapper"}</script>
    <script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/6877db8bd0ac26190c844b7d/1j0a3372l';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>