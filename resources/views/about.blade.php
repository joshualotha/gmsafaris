@extends('layouts.app')

@section('title', 'About Golden Memories Safaris | Local Tanzanian Safari Experts')
@section('keywords', 'About Golden Memories Safaris, Tanzania tour operator, local safari company, expert guides, sustainable tourism, Arusha safari company')
@section('description', 'Discover Golden Memories Safaris — a passionate local Tanzanian tour operator in Arusha. Meet our expert guides, learn our story, and see why travelers trust us for authentic safari adventures.')
@section('canonical', 'https://www.gmsafaris.co.tz/about')
@section('og_title', 'About Us - Golden Memories Safaris')
@section('og_description', 'Learn about Golden Memories Safaris, a passionate local Tanzanian tour operator based in Arusha, dedicated to creating authentic, responsible, and unforgettable safari adventures.')
@section('og_url', 'https://www.gmsafaris.co.tz/about')
@section('og_image', 'https://www.gmsafaris.co.tz/img/about.webp')
@section('twitter_title', 'About Us - Golden Memories Safaris')
@section('twitter_description', 'Learn about Golden Memories Safaris, a passionate local Tanzanian tour operator based in Arusha, dedicated to creating authentic, responsible, and unforgettable safari adventures.')
@section('twitter_image', 'https://www.gmsafaris.co.tz/img/about.webp')

@section('structured_data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://www.gmsafaris.co.tz/" },
        { "@type": "ListItem", "position": 2, "name": "About Us", "item": "https://www.gmsafaris.co.tz/about" }
    ]
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Golden Memories Safaris",
    "url": "https://www.gmsafaris.co.tz",
    "logo": "https://www.gmsafaris.co.tz/img/logo.webp",
    "description": "A passionate local Tanzanian tour operator based in Arusha, dedicated to creating authentic, responsible, and unforgettable safari adventures.",
    "foundingDate": "2023",
    "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+255786383273",
        "contactType": "customer service",
        "email": "info@gmsafaris.co.tz",
        "availableLanguage": ["English", "Italian", "Polish", "Swedish", "French"]
    },
    "sameAs": [
        "https://www.facebook.com/gmsafaris",
        "https://www.instagram.com/gmsafaris/",
        "https://www.tiktok.com/@gmsafaris",
        "https://www.youtube.com/@gmsafaris"
    ]
}
</script>
@endsection

@section('extra_styles')
<style>
     /* Page Header Style */
    .page-header {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(img/about-hero.webp) center center no-repeat;
        background-size: cover;
    }
    /* Why Choose Us Icons */
    .why-choose-us .icon-box {
        font-size: 3rem;
        color: var(--bs-primary);
        margin-bottom: 1rem;
        transition: transform 0.3s ease;
    }
    .why-choose-us .feature-item:hover .icon-box {
         transform: scale(1.1);
    }

    /* Team Section Styles */
     .team-item {
         transition: transform 0.3s ease, box-shadow 0.3s ease;
         border: 1px solid #eee;
         background-color: #fff;
         overflow: hidden;
     }
     .team-item:hover {
         transform: translateY(-5px);
         box-shadow: 0 10px 20px rgba(0,0,0,0.1);
     }
     .team-item img {
         height: 300px;
         width: 100%;
         object-fit: cover;
         object-position: center;
     }
     .team-content {
        background: var(--bs-light);
        padding: 15px;
     }

     /* Footer Logo */
     .footer-logo {
       max-width: 100%;
       height: auto;
       filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
     }

     /* Ensure consistent section padding */
     .py-6 {
         padding-top: 6rem;
         padding-bottom: 6rem;
     }
     .bg-light.py-6 {
         padding-top: 5.5rem;
         padding-bottom: 5.5rem;
    }

</style>
@endsection

@section('structured_data')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "https://www.gmsafaris.co.tz/"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "About Us",
      "item": "https://www.gmsafaris.co.tz/about"
    }
  ]
}
</script>
@endsection

@section('body_content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">About Golden Memories Safaris</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">About Us</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Our Story Start -->
    <div class="container-fluid py-6">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow bounceInLeft" data-wow-delay="0.1s">
                     <img src="{{ asset('img/about-1.webp') }}" class="img-fluid rounded shadow-lg" alt="Founders or team members of Golden Memories Safaris in Tanzania" loading="lazy">
                </div>
                <div class="col-lg-6 wow bounceInRight" data-wow-delay="0.3s">
                    <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Our Story</small>
                    <h1 class="display-5 mb-4">Karibu! Welcome to Our World</h1>
                    <p class="mb-3">Golden Memories Safaris isn't just a company; it's a dream realized, rooted in the heart of Tanzania. We are a <strong>100% locally owned and operated</strong> tour company based in Arusha, born from a lifelong passion for the incredible wildlife, diverse cultures, and breathtaking landscapes of our homeland.</p>
                    <p class="mb-3">Having grown up exploring the vast plains of the Serengeti, listening to the whispers of the Ngorongoro Crater, and understanding the rhythms of the wild, we wanted to share these authentic experiences with the world. Our journey began with a simple goal: to craft personalized, high-quality safaris that create more than just vacations – they create <strong>truly golden, lifelong memories</strong>.</p>
                    <p class="mb-4">Today, we are proud to be a trusted partner for travelers seeking genuine Tanzanian adventures. We combine our deep local knowledge with international standards of service to ensure your safari is seamless, safe, and simply unforgettable.</p>
                     <a href="{{ url('/contact') }}" class="btn btn-primary py-3 px-5 rounded-pill">Get In Touch<i class="fas fa-arrow-right ps-2"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Story End -->

    <!-- Mission & Vision Start -->
    <div class="container-fluid py-6 bg-light">
         <div class="container">
            <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                <small class="d-inline-block fw-bold text-dark text-uppercase bg-white border border-primary rounded-pill px-4 py-1 mb-3">Our Purpose</small>
                <h1 class="display-5 mb-5">Guiding Principles</h1>
            </div>
             <div class="row g-4 justify-content-center">
                 <div class="col-lg-5 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                     <div class="text-center p-4 p-lg-5 shadow rounded h-100 d-flex flex-column justify-content-center bg-white">
                         <i class="fas fa-bullseye fa-3x text-primary mb-4"></i>
                         <h3 class="mb-3">Our Mission</h3>
                         <p class="mb-0">To curate and deliver exceptional, personalized safari experiences that deeply connect our guests with Tanzania's natural wonders and rich culture, while upholding the highest standards of service, safety, and responsible tourism.</p>
                     </div>
                 </div>
                 <div class="col-lg-5 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                     <div class="text-center p-4 p-lg-5 shadow rounded h-100 d-flex flex-column justify-content-center bg-white">
                          <i class="fas fa-binoculars fa-3x text-primary mb-4"></i>
                          <h3 class="mb-3">Our Vision</h3>
                         <p class="mb-0">To be Tanzania's most cherished safari operator, renowned for creating authentic "Golden Memories," fostering sustainable tourism, and inspiring a global appreciation for our country's unique heritage.</p>
                     </div>
                 </div>
            </div>
        </div>
    </div>
    <!-- Mission & Vision End -->


    <!-- Why Choose Us Start -->
    <div class="container-fluid why-choose-us py-6">
        <div class="container">
            <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Why Choose Us?</small>
                <h1 class="display-5 mb-5">The Golden Memories Advantage</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="feature-item text-center p-4 shadow-sm rounded border h-100">
                        <div class="icon-box"><i class="fas fa-users"></i></div>
                        <h4 class="mb-3">Passionate Local Experts</h4>
                        <p class="mb-0">Our guides aren't just drivers; they're certified professionals, wildlife enthusiasts, and proud Tanzanians eager to share their knowledge and love for their country.</p>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-item text-center p-4 shadow-sm rounded border h-100">
                         <div class="icon-box"><i class="fas fa-map-marked-alt"></i></div>
                        <h4 class="mb-3">Tailor-Made Adventures</h4>
                        <p class="mb-0">Your dream, your safari. We meticulously craft itineraries based on your interests, pace, budget, and travel style – no two trips are exactly alike.</p>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="feature-item text-center p-4 shadow-sm rounded border h-100">
                        <div class="icon-box"><i class="fas fa-leaf"></i></div>
                        <h4 class="mb-3">Commitment to Sustainability</h4>
                        <p class="mb-0">We practice responsible tourism, supporting conservation initiatives, respecting local cultures, and minimizing our environmental footprint.</p>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="feature-item text-center p-4 shadow-sm rounded border h-100">
                        <div class="icon-box"><i class="fas fa-car-side"></i></div>
                        <h4 class="mb-3">Reliable & Comfortable Fleet</h4>
                        <p class="mb-0">Travel in comfort and safety with our well-maintained 4x4 safari vehicles, equipped with charging ports, refrigerators, and pop-up roofs for optimal viewing.</p>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="feature-item text-center p-4 shadow-sm rounded border h-100">
                        <div class="icon-box"><i class="fas fa-hand-holding-usd"></i></div>
                        <h4 class="mb-3">Transparent & Fair Pricing</h4>
                        <p class="mb-0">We offer competitive rates with clear inclusions and exclusions. Experience exceptional value without hidden costs or compromising quality.</p>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="feature-item text-center p-4 shadow-sm rounded border h-100">
                        <div class="icon-box"><i class="fas fa-headset"></i></div>
                        <h4 class="mb-3">24/7 Dedicated Support</h4>
                        <p class="mb-0">From your first email until you're safely home, our friendly team is available around the clock to assist you with any queries or needs.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Why Choose Us End -->


    <!-- Call to Action Start -->
    <div class="container-fluid py-6 wow fadeInUp" data-wow-delay="0.1s" style="background: var(--bs-primary-light-subtle);">
        <div class="container text-center">
             <div class="row justify-content-center">
                 <div class="col-lg-9">
                     <i class="fas fa-feather-alt fa-3x text-primary mb-4"></i>
                     <h1 class="mb-4">Ready to Create Your Own Golden Memories?</h1>
                     <p class="mb-4 fs-5 lh-base">Let our local expertise and passion for Tanzania guide you on an adventure of a lifetime. Whether you dream of the vast Serengeti plains, the heights of Kilimanjaro, or the spice-scented breezes of Zanzibar, we're here to make it happen. Contact us today to start planning!</p>
                     <a href="{{ url('/booking') }}" class="btn btn-primary btn-lg rounded-pill py-3 px-5 mx-2 mb-2 shadow-sm">Start Planning My Safari</a>
                     <a href="{{ url('/safaris') }}" class="btn btn-outline-primary btn-lg rounded-pill py-3 px-5 mx-2 mb-2">Explore Our Tours</a>
                 </div>
            </div>
        </div>
    </div>
    <!-- Call to Action End -->

@endsection
