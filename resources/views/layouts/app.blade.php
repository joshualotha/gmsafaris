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

    <!-- Google Web Fonts (preconnect for performance) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playball&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playball&display=swap" rel="stylesheet"></noscript>

    <!-- Critical Above-Fold CSS (inlined to eliminate render-blocking) -->
    <style>
        /* === CRITICAL BOOTSTRAP RESET & GRID === */
        *,*::before,*::after{box-sizing:border-box}body{margin:0;font-family:'Open Sans',sans-serif;font-size:1rem;font-weight:400;line-height:1.5;color:#212529;background-color:#fff;-webkit-text-size-adjust:100%}.container,.container-fluid{width:100%;padding-right:var(--bs-gutter-x,.75rem);padding-left:var(--bs-gutter-x,.75rem);margin-right:auto;margin-left:auto}@media(min-width:576px){.container{max-width:540px}}@media(min-width:768px){.container{max-width:720px}}@media(min-width:992px){.container{max-width:960px}}@media(min-width:1200px){.container{max-width:1140px}}@media(min-width:1400px){.container{max-width:1320px}}.row{--bs-gutter-x:1.5rem;--bs-gutter-y:0;display:flex;flex-wrap:wrap;margin-top:calc(-1*var(--bs-gutter-y));margin-right:calc(-.5*var(--bs-gutter-x));margin-left:calc(-.5*var(--bs-gutter-x))}.row>*{flex-shrink:0;width:100%;max-width:100%;padding-right:calc(var(--bs-gutter-x)*.5);padding-left:calc(var(--bs-gutter-x)*.5);margin-top:var(--bs-gutter-y)}.col-1{flex:0 0 auto;width:8.33333333%}.col-10{flex:0 0 auto;width:83.33333333%}.col-lg-2{flex:none;width:16.66666667%}@media(min-width:992px){.col-lg-2{flex:0 0 auto}.col-lg-3{flex:0 0 auto;width:25%}.col-lg-4{flex:0 0 auto;width:33.33333333%}.col-lg-5{flex:0 0 auto;width:41.66666667%}.col-lg-7{flex:0 0 auto;width:58.33333333%}}.g-4,.gx-4{--bs-gutter-x:1.5rem}.g-4,.gy-4{--bs-gutter-y:1.5rem}.g-5{--bs-gutter-x:3rem}.g-5{--bs-gutter-y:3rem}.d-flex{display:flex!important}.d-none{display:none!important}.flex-wrap{flex-wrap:wrap!important}.flex-column{flex-direction:column!important}.justify-content-center{justify-content:center!important}.justify-content-start{justify-content:flex-start!important}.justify-content-between{justify-content:space-between!important}.align-items-center{align-items:center!important}.h-100{height:100%!important}.w-100{width:100%!important}.overflow-hidden{overflow:hidden!important}.position-relative{position:relative!important}.position-absolute{position:absolute!important}.top-50{top:50%!important}.start-50{left:50%!important}.translate-middle{transform:translate(-50%,-50%)!important}.text-center{text-align:center!important}.text-dark{color:#212529!important}.text-white{color:#fff!important}.bg-light{background-color:#f8f9fa!important}.bg-white{background-color:#fff!important}.bg-primary{background-color:#d69c40!important}.rounded{border-radius:.25rem!important}.rounded-pill{border-radius:50rem!important}.rounded-circle{border-radius:50%!important}.rounded-start{border-top-left-radius:.25rem!important;border-bottom-left-radius:.25rem!important}.rounded-end{border-top-right-radius:.25rem!important;border-bottom-right-radius:.25rem!important}.img-fluid{max-width:100%;height:auto}.btn{display:inline-block;font-weight:600;text-decoration:none;vertical-align:middle;cursor:pointer;border:1px solid transparent;padding:.375rem .75rem;font-size:1rem;border-radius:.25rem;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out}.btn-primary{color:#fff;background-color:#d69c40;border-color:#d69c40}.btn-outline-primary{color:#d69c40;border-color:#d69c40}.btn-primary:hover{color:#fff;background-color:#c08a30;border-color:#c08a30}.border-0{border:0!important}.border-2{border-width:2px!important}.border-primary{border-color:#d69c40!important}.border-top{border-top:1px solid #dee2e6!important}.border-bottom{border-bottom:1px solid #dee2e6!important}.py-2{padding-top:.5rem!important;padding-bottom:.5rem!important}.py-3{padding-top:1rem!important;padding-bottom:1rem!important}.py-5{padding-top:3rem!important;padding-bottom:3rem!important}.py-6{padding-top:6rem!important;padding-bottom:6rem!important}.px-4{padding-right:1.5rem!important;padding-left:1.5rem!important}.px-5{padding-right:3rem!important;padding-left:3rem!important}.p-0{padding:0!important}.p-3{padding:1rem!important}.p-4{padding:1.5rem!important}.mt-auto{margin-top:auto!important}.mb-0{margin-bottom:0!important}.mb-3{margin-bottom:1rem!important}.mb-4{margin-bottom:1.5rem!important}.mb-5{margin-bottom:3rem!important}.me-2{margin-right:.5rem!important}.me-3{margin-right:1rem!important}.ms-2{margin-left:.5rem!important}.gap-3{gap:1rem!important}.vh-100{height:100vh!important}.position-fixed{position:fixed!important}.flex-shrink-0{flex-shrink:0!important}.list-unstyled{padding-left:0;list-style:none}.badge{display:inline-block;padding:.35em .65em;font-size:.75em;font-weight:700;line-height:1;color:#fff;text-align:center;white-space:nowrap;vertical-align:baseline;border-radius:.25rem}.small,small{font-size:.875em}.h1,h1{font-size:calc(1.375rem+1.5vw)}@media(min-width:1200px){.h1,h1{font-size:2.5rem}}.h4,h4{font-size:calc(1.275rem+.3vw)}@media(min-width:1200px){.h4,h4{font-size:1.5rem}}.h5,h5{font-size:1.25rem}.h6,h6{font-size:1rem}.display-5{font-size:calc(1.425rem+2.1vw);font-weight:300;line-height:1.2}@media(min-width:1200px){.display-5{font-size:3rem}}.fw-bold{font-weight:700!important}.text-uppercase{text-transform:uppercase!important}.text-primary{color:#d69c40!important}.text-body{color:#212529!important}.lh-base{line-height:1.5!important}.container-fluid{padding-right:calc(var(--bs-gutter-x)*.5);padding-left:calc(var(--bs-gutter-x)*.5)}.navbar{position:relative;display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;padding-top:.5rem;padding-bottom:.5rem}.navbar-brand{padding-top:.3125rem;padding-bottom:.3125rem;margin-right:1rem;font-size:1.25rem;text-decoration:none;white-space:nowrap}.navbar-nav{display:flex;flex-direction:column;padding-left:0;margin-bottom:0;list-style:none}.nav-link{display:block;padding:.5rem 1rem;text-decoration:none;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out}.navbar-collapse{flex-basis:100%;flex-grow:1;align-items:center}.navbar-toggler{padding:.25rem .75rem;font-size:1.25rem;line-height:1;background-color:transparent;border:1px solid transparent;border-radius:.25rem;transition:box-shadow .15s ease-in-out}.collapse:not(.show){display:none}.dropdown-menu{position:absolute;z-index:1000;display:none;min-width:10rem;padding:.5rem 0;margin:0;font-size:1rem;color:#212529;text-align:left;list-style:none;background-color:#fff;background-clip:padding-box;border:1px solid rgba(0,0,0,.15);border-radius:.25rem}.dropdown-item{display:block;width:100%;padding:.25rem 1rem;clear:both;font-weight:400;color:#212529;text-align:inherit;text-decoration:none;white-space:nowrap;background-color:transparent;border:0}.dropdown-toggle{white-space:nowrap}.modal{position:fixed;top:0;left:0;z-index:1055;display:none;width:100%;height:100%;overflow-x:hidden;overflow-y:auto;outline:0}.modal-dialog{position:relative;width:auto;margin:.5rem;pointer-events:none}.modal-content{position:relative;display:flex;flex-direction:column;width:100%;pointer-events:auto;background-color:#fff;background-clip:padding-box;border:1px solid rgba(0,0,0,.2);border-radius:.3rem;outline:0}.modal-body{position:relative;flex:1 1 auto;padding:1rem}.fade{transition:opacity .15s linear}.modal-backdrop{position:fixed;top:0;left:0;z-index:1050;width:100vw;height:100vh;background-color:#000}.modal-backdrop.fade{opacity:0}.modal-backdrop.show{opacity:.5}.gtranslate_wrapper{position:fixed;bottom:20px;left:20px;z-index:9999}
        /* === CUSTOM NAVBAR STYLES === */
        .nav-bar{background:#000!important;border-bottom:1px solid rgba(0,0,0,.05);position:sticky;top:0;z-index:1050}.navbar .navbar-nav .nav-link{color:#D39A40!important}.navbar .navbar-nav .nav-link:hover,.navbar .navbar-nav .nav-link.active{color:#fff!important;background:transparent!important}.navbar .dropdown-menu{background:#222!important}.navbar .dropdown-menu .dropdown-item{color:#D39A40!important}.navbar .dropdown-menu .dropdown-item:hover,.navbar .dropdown-menu .dropdown-item:focus{color:#fff!important;background:#D39A40!important}.navbar-toggler{border-color:#D39A40!important}.navbar-toggler .fa-bars{color:#D39A40!important}.btn-search{width:44px;height:44px;padding:0;display:inline-flex;align-items:center;justify-content:center;border-radius:50%!important}
        /* === SPINNER === */
        #spinner{opacity:0;visibility:hidden;transition:opacity .8s ease-out,visibility 0s linear .5s;z-index:99999}#spinner.show{transition:opacity .8s ease-out,visibility 0s linear .0s;visibility:visible;opacity:1}
        /* === TYPOGRAPHY === */
        h1,h2,h3,.h1,.h2,.h3{font-weight:400!important;font-family:'Playball',cursive!important}h4,h5,h6,.h4,.h5,.h6{font-weight:600!important;font-family:'Open Sans',sans-serif!important}
        /* === HERO SECTION === */
        .hero-section{position:relative;overflow:hidden;padding:0;background-color:#333}.hero-carousel .owl-item{height:90vh;min-height:500px;position:relative}.hero-carousel .carousel-image-container{position:absolute;top:0;left:0;width:100%;height:100%;z-index:1}.hero-carousel .carousel-image-container img{width:100%;height:100%;object-fit:cover;filter:brightness(0.6)}.hero-carousel .carousel-caption-gms{position:absolute;top:50%;left:10%;transform:translateY(-50%);text-align:left;color:white;z-index:2;width:auto;max-width:60%;padding-right:20px}.hero-carousel .carousel-caption-gms h1{font-size:3.5rem;font-weight:bold;margin-bottom:1rem;text-shadow:0 2px 4px rgba(0,0,0,.5);color:#d69c40}.hero-carousel .carousel-caption-gms .gold-text{color:#d69c40}.hero-carousel .carousel-caption-gms p{font-size:1.1rem;line-height:1.7;margin-bottom:2rem;text-shadow:0 1px 3px rgba(0,0,0,.5)}.gold-btn{background-color:#d69c40!important;color:white!important;border-color:#d69c40!important;padding:10px 20px;border-radius:5px;font-weight:bold;cursor:pointer;text-decoration:none}.gold-outline-btn{color:#d69c40!important;border:2px solid #d69c40!important;background:transparent;padding:10px 20px;border-radius:5px;font-weight:bold;cursor:pointer;text-decoration:none}.gold-outline-btn:hover{background-color:#d69c40!important;color:white!important}@media(max-width:992px){.hero-carousel .carousel-caption-gms h1{font-size:2.8rem}.hero-carousel .carousel-caption-gms p{font-size:1rem;margin-bottom:1.5rem}.hero-carousel .owl-item{height:75vh}}@media(max-width:768px){.hero-carousel .carousel-caption-gms{max-width:90%;left:5%}.hero-carousel .carousel-caption-gms h1{font-size:2.2rem}.hero-carousel .carousel-caption-gms p{font-size:.9rem}.hero-carousel .owl-item{height:65vh}}
        /* === SAFARI CARD === */
        .safari-card{background:white;transition:all .3s ease;box-shadow:0 5px 15px rgba(0,0,0,.1);height:100%;display:flex;flex-direction:column;border-radius:.25rem;overflow:hidden}.safari-img{height:220px;overflow:hidden}.safari-img img{height:100%;width:100%;object-fit:cover;transition:transform .5s ease}.safari-days{position:absolute;top:15px;left:15px;font-size:14px;padding:5px 10px}.safari-features ul li{margin-bottom:5px}
        /* === DESTINATION CARD === */
        .destination-card-v2{display:block;position:relative;overflow:hidden;border-radius:.5rem;height:400px;text-decoration:none;color:white;transition:transform .3s ease,box-shadow .3s ease;background-color:#333}.destination-card-v2 .card-img-wrapper{position:absolute;top:0;left:0;width:100%;height:100%}.destination-card-v2 .card-img{width:100%;height:100%;object-fit:cover;transition:transform .4s ease}.destination-card-v2 .card-title-overlay{position:absolute;bottom:0;left:0;right:0;padding:1.5rem;background:linear-gradient(to top,rgba(0,0,0,.9) 0%,rgba(0,0,0,.7) 50%,rgba(0,0,0,0) 100%);z-index:2}.destination-card-v2 .card-title{font-size:1.75rem;font-weight:600;margin:0;line-height:1.2;color:#fff}.destination-card-v2 .card-subtitle{font-size:.9rem;font-weight:300;color:rgba(255,255,255,.8);margin-top:.25rem;display:block}.destination-card-v2 .card-hover-overlay{position:absolute;top:0;left:0;width:100%;height:100%;background-color:rgba(0,0,0,.6);display:flex;flex-direction:column;align-items:center;justify-content:center;opacity:0;transition:opacity .3s ease;z-index:3;text-align:center;padding:1.5rem}.destination-card-v2:hover .card-hover-overlay{opacity:1}.destination-card-v2 .hover-text{font-size:.95rem;margin-bottom:1rem;color:rgba(255,255,255,.9)}.destination-card-v2 .btn-explore{background-color:#d69c40;color:white;border:none;padding:.6rem 1.2rem;border-radius:50rem;font-weight:600;text-transform:uppercase;font-size:.8rem;letter-spacing:.5px;text-decoration:none;display:inline-block}.destination-card-v2:hover{transform:translateY(-8px);box-shadow:0 1rem 2rem rgba(0,0,0,.2)}.destination-card-v2:hover .card-img{transform:scale(1.08)}@media(max-width:768px){.destination-card-v2{height:350px}.destination-card-v2 .card-title{font-size:1.5rem}}
        /* === SERVICE CARD === */
        .service-card-v5{background-color:#fff;padding:2rem 1.5rem;border-radius:.5rem;text-align:center;height:100%;border:1px solid #eee;display:flex;flex-direction:column;align-items:center;box-shadow:0 .5rem 1rem rgba(0,0,0,.05)}.service-link-v5{display:block;text-decoration:none;color:inherit;height:100%;border-radius:.5rem;transition:all .3s ease-in-out}.service-icon-v5{width:70px;height:70px;border-radius:50%;background-color:#d69c40;color:white;display:inline-flex;align-items:center;justify-content:center;margin-bottom:1.5rem}.service-icon-v5 i{font-size:2.2rem;line-height:1}.service-text-v5 h4{margin-bottom:.75rem;font-size:1.3rem;color:#212529;font-weight:600}.service-text-v5 p{color:#6c757d;font-size:.9rem;line-height:1.6;margin-bottom:1rem;flex-grow:1}.service-text-v5 .learn-more{color:#d69c40;font-weight:600;font-size:.9rem;display:inline-block;margin-top:auto;transition:color .2s ease}.service-link-v5:hover .service-card-v5{transform:translateY(-8px);box-shadow:0 1rem 2rem rgba(0,0,0,.1);border-color:#d69c40}.service-link-v5:hover .learn-more{color:#c08a30}
        /* === TESTIMONIAL === */
        .testimonial-item{border:1px solid #d69c40;padding:20px 20px}.testimonial-carousel .owl-item img{width:100px;height:100px}
        /* === BLOG === */
        .blog-item{position:relative}.blog-item img{transition:.5s}.blog-item:hover img{transform:scale(1.3)}.blog-item .blog-content{position:relative;transform:translateY(-50%);box-shadow:0 0 45px rgba(0,0,0,.08)}
        /* === FOOTER === */
        .footer .footer-item a.text-body:hover{color:#d69c40!important}
        /* === WOW ANIMATIONS === */
        .wow,.animated{animation-duration:2s!important}
        /* === VIDEO === */
        .video{position:relative;height:100%;min-height:400px;background:linear-gradient(rgba(254,218,154,.1),rgba(254,218,154,.1)),url(/img/home-booking.webp);background-position:center center;background-repeat:no-repeat;background-size:cover;border-radius:8px}.video .btn-play{position:absolute;z-index:3;top:50%;left:50%;transform:translateX(-50%) translateY(-50%);box-sizing:content-box;display:block;width:32px;height:44px;border-radius:50%;border:none;outline:none;padding:18px 20px 18px 28px}.video .btn-play:before{content:"";position:absolute;z-index:0;left:50%;top:50%;transform:translateX(-50%) translateY(-50%);display:block;width:100px;height:100px;background:#d69c40;border-radius:50%;animation:pulse-border 1500ms ease-out infinite}.video .btn-play:after{content:"";position:absolute;z-index:1;left:50%;top:50%;transform:translateX(-50%) translateY(-50%);display:block;width:100px;height:100px;background:#fff;border-radius:50%;transition:all 200ms}.video .btn-play span{display:block;position:relative;z-index:3;width:0;height:0;border-left:32px solid #212529;border-top:22px solid transparent;border-bottom:22px solid transparent}@keyframes pulse-border{0%{transform:translateX(-50%) translateY(-50%) translateZ(0) scale(1);opacity:1}100%{transform:translateX(-50%) translateY(-50%) translateZ(0) scale(1.5);opacity:0}}
        /* === CONTACT FORM === */
        .contact-form{box-shadow:0 0 45px rgba(0,0,0,.08)}
        /* === BOOKING SECTION === */
        .booking-process-section{background-color:#f8f9fa}.process-step{text-align:center;padding:1.5rem 1rem;height:100%;display:flex;flex-direction:column;align-items:center}.process-step .icon-circle{width:75px;height:75px;background-color:#d69c40;color:white;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;margin-bottom:1.5rem;font-size:2rem;box-shadow:0 4px 8px rgba(0,0,0,.1);transition:transform .3s ease,box-shadow .3s ease}.process-step h5{color:#212529;margin-bottom:.5rem;font-weight:600;margin-top:auto}.process-step p{font-size:.9em;color:#6c757d;flex-grow:1;max-width:90%;margin-top:.5rem}
        /* === SAFARI PACKAGES === */
        .safari-packages{background-color:#f8f9fa}.destinations{background-color:#f8f9fa}
        /* === RESPONSIVE HELPERS === */
        @media(min-width:992px){.d-lg-inline-flex{display:inline-flex!important}.d-xl-inline-block{display:inline-block!important}}
        @media(max-width:991.98px){.navbar-collapse.collapse:not(.show){display:none}}
    </style>

    <!-- Deferred Non-Critical Stylesheets -->
    <link rel="preload" href="{{ asset('css/bootstrap.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"></noscript>
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

    <!-- Template Stylesheet (kept synchronous — only 14KB) -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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
    <script>window.gtranslateSettings = {"default_language":"en","languages":["en","it","pl","sv","fr"],"wrapper_selector":".gtranslate_wrapper"}</script>
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
</body>

</html>