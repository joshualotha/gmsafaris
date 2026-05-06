@extends('layouts.app')

@section('title', 'Golden Memories Safaris - Tanzania Tour Operator')
@section('keywords', 'Tanzania safari, Serengeti tours, Kilimanjaro climbs, Zanzibar holidays, wildlife adventures, Golden Memories Safaris')
@section('description', 'Golden Memories Safaris - Premium Tanzania safari tours, wildlife adventures, Kilimanjaro treks, and Zanzibar escapes. Create lifelong memories.')
@section('canonical', 'https://www.gmsafaris.co.tz/')
@section('og_title', 'Golden Memories Safaris | Premium Tanzania Safari Tours')
@section('og_description', 'Golden Memories Safaris - Premium Tanzania safari tours, wildlife adventures, Kilimanjaro treks, and Zanzibar escapes. Create lifelong memories.')
@section('og_url', 'https://www.gmsafaris.co.tz/')
@section('og_image', 'https://www.gmsafaris.co.tz/img/hero-1.jpg')
@section('twitter_title', 'Golden Memories Safaris | Premium Tanzania Safari Tours')
@section('twitter_description', 'Golden Memories Safaris - Premium Tanzania safari tours, wildlife adventures, Kilimanjaro treks, and Zanzibar escapes. Create lifelong memories.')
@section('twitter_image', 'https://www.gmsafaris.co.tz/img/hero-1.jpg')

@section('extra_styles')
<style>
    /* Organic Hero Styles */
    .organic-hero-section {
        min-height: 95vh;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        padding: 0;
    }

    .organic-hero-visual {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }

    .organic-image-mask {
        width: 100%;
        height: 100%;
        position: relative;
    }

    .organic-image-mask::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, rgba(28, 24, 18, 0.4) 0%, rgba(28, 24, 18, 0) 70%);
        z-index: 2;
        pointer-events: none;
    }

    /* Carousel Overrides for Organic Hero */
    .organic-image-mask .hero-carousel,
    .organic-image-mask .owl-stage-outer,
    .organic-image-mask .owl-stage,
    .organic-image-mask .owl-item,
    .organic-image-mask .item {
        height: 100%;
    }

    .organic-image-mask .item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .organic-image-mask .owl-dots {
        position: absolute;
        bottom: 40px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 10;
        display: flex;
        gap: 12px;
    }

    .organic-image-mask .owl-dots .owl-dot span {
        background: #F2EBE0 !important;
        opacity: 0.6;
        width: 10px !important;
        height: 10px !important;
        border-radius: 50% !important;
        margin: 0 !important;
        transition: all 0.3s ease;
    }

    .organic-image-mask .owl-dots .owl-dot.active span {
        opacity: 1;
        background: #C4714A !important;
        transform: scale(1.3);
    }

    .organic-hero-content-wrapper {
        position: relative;
        z-index: 3;
        width: 100%;
    }

    .organic-hero-content {
        background-color: #F2EBE0; /* Warm linen */
        padding: 4rem 3.5rem;
        border-radius: 24px;
        max-width: 600px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 30px 60px rgba(28, 24, 18, 0.15);
    }

    .organic-hero-content::before {
        content: "";
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background-image: url('data:image/svg+xml,%3Csvg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"%3E%3Cfilter id="noiseFilter"%3E%3CfeTurbulence type="fractalNoise" baseFrequency="0.65" numOctaves="3" stitchTiles="stitch"/%3E%3C/filter%3E%3Crect width="100%25" height="100%25" filter="url(%23noiseFilter)" opacity="0.06"/%3E%3C/svg%3E');
        pointer-events: none;
        z-index: 1;
    }

    .organic-h1 {
        font-family: 'Cormorant Garamond', serif;
        font-size: 4.5rem;
        font-weight: 400;
        color: #1C1812; /* Rich Soil */
        line-height: 1.05;
        letter-spacing: -0.02em;
        margin-bottom: 1.5rem;
        position: relative;
        z-index: 2;
    }

    .organic-h1 i {
        font-style: italic;
        color: #C4714A; /* Fired Clay */
    }

    .organic-p {
        font-family: 'DM Sans', sans-serif;
        font-size: 1.15rem;
        line-height: 1.8;
        color: #3D5A3E; /* Deep Forest */
        margin-bottom: 2.5rem;
        position: relative;
        z-index: 2;
    }

    .organic-hero-actions {
        display: flex;
        gap: 1.5rem;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .btn-organic-primary {
        background-color: #C4714A;
        color: #F2EBE0 !important;
        font-family: 'DM Sans', sans-serif;
        font-weight: 500;
        font-size: 1rem;
        letter-spacing: 0.05em;
        padding: 1rem 2.5rem;
        border-radius: 999px;
        text-transform: uppercase;
        text-decoration: none;
        transition: all 0.3s ease;
        border: none;
    }

    .btn-organic-primary:hover {
        background-color: #3D5A3E;
        transform: translateY(-2px);
    }

    .btn-organic-secondary {
        color: #3D5A3E !important;
        font-family: 'DM Sans', sans-serif;
        font-weight: 500;
        font-size: 1rem;
        letter-spacing: 0.05em;
        padding: 0.5rem 0;
        text-transform: uppercase;
        text-decoration: none;
        transition: all 0.3s ease;
        border-bottom: 1px solid #3D5A3E;
    }

    .btn-organic-secondary:hover {
        color: #C4714A !important;
        border-bottom-color: #C4714A;
    }

    @media (max-width: 992px) {
        .organic-hero-content {
            padding: 3rem 2.5rem;
            max-width: 100%;
            margin-top: 200px;
        }
    }

    @media (max-width: 768px) {
        .organic-hero-section {
            align-items: flex-end;
            padding-bottom: 80px;
        }
        .organic-hero-content {
            margin-top: 0;
            border-radius: 16px;
        }
        .organic-h1 {
            font-size: 3rem;
        }
        .organic-image-mask::after {
            background: linear-gradient(0deg, rgba(28, 24, 18, 0.7) 0%, rgba(28, 24, 18, 0) 100%);
        }
    }
        .organic-hero-visual {
            height: 400px;
        }
        .organic-image-mask {
            border-radius: 80px 0 0 0;
        }
    }

        .hero-carousel .carousel-caption-gms p {
            font-size: 0.9rem;
        }

        .hero-carousel .owl-item {
            height: 65vh;
        }

        .hero-carousel .owl-nav {
            display: none;
        }
    }


    .gold-btn {
        background-color: #d69c40 !important;
        color: white !important;
        border-color: #d69c40 !important;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
        text-decoration: none;
    }

    .gold-outline-btn {
        color: #d69c40 !important;
        border: 2px solid #d69c40 !important;
        background: transparent;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
        text-decoration: none;
    }

    .gold-outline-btn:hover {
        background-color: #d69c40 !important;
        color: white !important;
    }


    .footer-logo {
        max-width: 100%;
        height: auto;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
    }

    .service-item {
        transition: transform 0.3s ease;
    }

    .service-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, .15) !important;
    }

    .service-icon {
        text-align: center;
    }

    .service-content {
        text-align: center;
    }

    .service-link-v5 {
        display: block;
        text-decoration: none;
        color: inherit;
        height: 100%;
        border-radius: 0.5rem;
        transition: all 0.3s ease-in-out;
    }

    .service-card-v5 {
        background-color: #fff;
        padding: 2rem 1.5rem;
        border-radius: 0.5rem;
        text-align: center;
        height: 100%;
        border: 1px solid #eee;
        display: flex;
        flex-direction: column;
        align-items: center;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05);
    }

    .service-link-v5:hover .service-card-v5 {
        transform: translateY(-8px);
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.1);
        border-color: var(--bs-primary);
    }

    .service-icon-v5 {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background-color: var(--bs-primary);
        color: white;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
    }

    .service-icon-v5 i {
        font-size: 2.2rem;
        line-height: 1;
    }

    .service-text-v5 h4 {
        margin-bottom: 0.75rem;
        font-size: 1.3rem;
        color: var(--bs-dark);
        font-weight: 600;
    }

    .service-text-v5 p {
        color: #6c757d;
        font-size: 0.9rem;
        line-height: 1.6;
        margin-bottom: 1rem;
        flex-grow: 1;
    }

    .service-text-v5 .learn-more {
        color: var(--bs-primary);
        font-weight: 600;
        font-size: 0.9rem;
        display: inline-block;
        margin-top: auto;
        transition: color 0.2s ease;
    }

    .service-link-v5:hover .learn-more {
        color: var(--bs-secondary);
    }

    .service-link-v5:hover {
        color: inherit;
    }

    @media (min-width: 992px) {
        .service-card-v5 {
            padding: 1.5rem 0.75rem;
        }

        .service-icon-v5 {
            width: 55px;
            height: 55px;
            margin-bottom: 1rem;
        }

        .service-icon-v5 i {
            font-size: 1.8rem;
        }

        .service-text-v5 h4 {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }

        .service-text-v5 p {
            font-size: 0.85rem;
            line-height: 1.5;
            margin-bottom: 0.75rem;
        }

        .service-text-v5 .learn-more {
            font-size: 0.8rem;
        }
    }

    @media (min-width: 1200px) {
        .service-text-v5 h4 {
            font-size: 1.15rem;
        }
    }

    .destination-card-v2 {
        display: block;
        position: relative;
        overflow: hidden;
        border-radius: 0.5rem;
        height: 400px;
        text-decoration: none;
        color: white;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background-color: #333;
    }

    .destination-card-v2:hover {
        transform: translateY(-8px);
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.2);
    }

    .destination-card-v2 .card-img-wrapper {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .destination-card-v2 .card-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .destination-card-v2:hover .card-img {
        transform: scale(1.08);
    }

    .destination-card-v2 .card-title-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 1.5rem;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.7) 50%, rgba(0, 0, 0, 0) 100%);
        z-index: 2;
    }

    .destination-card-v2 .card-title {
        font-size: 1.75rem;
        font-weight: 600;
        margin: 0;
        line-height: 1.2;
        color: #fff;
    }

    .destination-card-v2 .card-subtitle {
        font-size: 0.9rem;
        font-weight: 300;
        color: rgba(255, 255, 255, 0.8);
        margin-top: 0.25rem;
        display: block;
    }


    .destination-card-v2 .card-hover-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 3;
        text-align: center;
        padding: 1.5rem;
    }

    .destination-card-v2:hover .card-hover-overlay {
        opacity: 1;
    }

    .destination-card-v2 .hover-text {
        font-size: 0.95rem;
        margin-bottom: 1rem;
        color: rgba(255, 255, 255, 0.9);
    }

    .destination-card-v2 .btn-explore {
        background-color: var(--bs-primary);
        color: white;
        border: none;
        padding: 0.6rem 1.2rem;
        border-radius: 50rem;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
        transition: background-color 0.2s ease;
    }

    .destination-card-v2 .btn-explore:hover {
        background-color: var(--bs-secondary);
        color: white;
    }

    @media (max-width: 768px) {
        .destination-card-v2 {
            height: 350px;
        }

        .destination-card-v2 .card-title {
            font-size: 1.5rem;
        }
    }



</style>
@endsection

@section('structured_data')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "TravelAgency",
  "name": "Golden Memories Safaris",
  "url": "https://www.gmsafaris.co.tz",
  "logo": "https://www.gmsafaris.co.tz/img/logo.png",
  "image": "https://www.gmsafaris.co.tz/img/hero-1.jpg",
  "description": "Golden Memories Safaris is a premier tour operator based in Arusha, Tanzania, specializing in wildlife safaris, Kilimanjaro treks, Zanzibar holidays, and cultural tours.",
  "telephone": "+255786383273",
  "email": "info@gmsafaris.co.tz",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Sokoine Road",
    "addressLocality": "Arusha",
    "addressCountry": "TZ"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": -3.429117,
    "longitude": 36.702341
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],
    "opens": "08:00",
    "closes": "18:00"
  },
  "sameAs": [],
  "priceRange": "$$",
  "areaServed": {
    "@type": "Country",
    "name": "Tanzania"
  },
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "Safari Packages",
    "itemListElement": [
      {"@type": "Offer", "itemOffered": {"@type": "TouristTrip", "name": "Ultimate Tanzanian Escape", "description": "6-day journey through Tarangire, Serengeti, Ngorongoro"}},
      {"@type": "Offer", "itemOffered": {"@type": "TouristTrip", "name": "A Taste of Tanzania", "description": "3-day tour featuring Ngorongoro Crater and Arusha culture"}},
      {"@type": "Offer", "itemOffered": {"@type": "TouristTrip", "name": "Tanzanian Express", "description": "2-day fly-in safari from Zanzibar"}}
    ]
  }
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "Golden Memories Safaris",
  "url": "https://www.gmsafaris.co.tz",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://www.gmsafaris.co.tz/?s={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>
@endsection

@section('body_content')

<!-- Organic Hero Start -->
<div class="organic-hero-section">
    
    <div class="organic-hero-visual">
        <div class="organic-image-mask animated fadeIn" data-wow-delay="0.1s">
            <div class="owl-carousel hero-carousel">
                <div class="item"><img src="{{ asset('img/hero-1.jpg') }}" alt="Tanzania Wildlife Encounter"></div>
                <div class="item"><img src="{{ asset('img/hero-2.jpg') }}" alt="Maasai People Tanzania"></div>
                <div class="item"><img src="{{ asset('img/hero-3.jpg') }}" alt="Serengeti Adventure"></div>
                <div class="item"><img src="{{ asset('img/hero-4.jpg') }}" alt="Ngorongoro Crater Safari"></div>
            </div>
        </div>
    </div>

    <div class="container organic-hero-content-wrapper">
        <div class="row">
            <div class="col-lg-6 col-md-10">
                <div class="organic-hero-content animated fadeInUp" data-wow-delay="0.3s">
                    <h1 class="organic-h1">Awaken to the <i>Wild</i></h1>
                    <p class="organic-p">
                        Experience the thrill of encountering the Big Five in their natural habitat, witness the great migration, or immerse yourself in vibrant local cultures. Your Tanzanian adventure begins here.
                    </p>
                    <div class="organic-hero-actions">
                        <a href="{{ route('booking') }}" class="btn-organic-primary">Book Safari</a>
                        <a href="{{ route('safaris') }}" class="btn-organic-secondary">Explore Tours</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Organic Hero End -->

<!-- About Satrt -->
<div class="container-fluid py-6">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                <img src="{{ asset('img/about.JPG') }}" class="img-fluid rounded" alt="About Golden Memories Safaris"
                    loading="lazy">
            </div>
            <div class="col-lg-7 wow bounceInUp" data-wow-delay="0.3s">
                <small
                    class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">About
                    Us</small>
                <h1 class="display-5 mb-4">Trusted By 500+ Satisfied Travelers</h1>
                <p class="mb-4">Golden Memories Safaris is a premier tour operator based in Tanzania, specializing
                    in creating unforgettable wildlife experiences. Our team of expert guides and travel consultants
                    are dedicated to providing authentic safari adventures that showcase Tanzania's breathtaking
                    landscapes and incredible wildlife.</p>
                <div class="row g-4 text-dark mb-5">
                    <div class="col-sm-6">
                        <i class="fas fa-share text-primary me-2"></i>Customized Safari Itineraries
                    </div>
                    <div class="col-sm-6">
                        <i class="fas fa-share text-primary me-2"></i>24/7 Customer Support
                    </div>
                    <div class="col-sm-6">
                        <i class="fas fa-share text-primary me-2"></i>Expert Local Guides
                    </div>
                    <div class="col-sm-6">
                        <i class="fas fa-share text-primary me-2"></i>Luxury & Budget Options
                    </div>
                </div>
                <a href="{{ route('about') }}" class="btn btn-primary py-3 px-5 rounded-pill">Our Story<i
                        class="fas fa-arrow-right ps-2"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Fact Start-->
<div class="container-fluid faqt py-6">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-7">
                <div class="row g-4">
                    <div class="col-sm-4 wow bounceInUp" data-wow-delay="0.3s">
                        <div class="faqt-item bg-primary rounded p-4 text-center">
                            <i class="fas fa-users fa-4x mb-4 text-white"></i>
                            <h1 class="display-4 fw-bold" data-toggle="counter-up">500</h1>
                            <p class="text-dark text-uppercase fw-bold mb-0">Happy Travelers</p>
                        </div>
                    </div>
                    <div class="col-sm-4 wow bounceInUp" data-wow-delay="0.5s">
                        <div class="faqt-item bg-primary rounded p-4 text-center">
                            <i class="fas fa-map-marked-alt fa-4x mb-4 text-white"></i>
                            <h1 class="display-4 fw-bold" data-toggle="counter-up">15</h1>
                            <p class="text-dark text-uppercase fw-bold mb-0">National Parks</p>
                        </div>
                    </div>
                    <div class="col-sm-4 wow bounceInUp" data-wow-delay="0.7s">
                        <div class="faqt-item bg-primary rounded p-4 text-center">
                            <i class="fas fa-check fa-4x mb-4 text-white"></i>
                            <h1 class="display-4 fw-bold" data-toggle="counter-up">253</h1>
                            <p class="text-dark text-uppercase fw-bold mb-0">Safaris Completed</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                <div class="video">
                    <button type="button" class="btn btn-play" data-bs-toggle="modal"
                        data-src="https://www.youtube.com/embed/2UYle8RwhR0" data-bs-target="#videoModal">
                        <span></span>
                    </button>
                </div>
                <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <iframe id="video" width="100%" height="500" src="" frameborder="0"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fact End -->

<!-- Safari Packages Start -->
<div class="container-fluid safari-packages py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small
                class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Featured
                Safaris</small>
            <h1 class="display-5 mb-5">Explore Our Signature Tanzania Tours</h1>
        </div>
        <div class="row g-4">

            <div class="col-lg-3 col-md-6 wow bounceInUp" data-wow-delay="0.1s">
                <div class="safari-card rounded overflow-hidden h-100 d-flex flex-column">
                    <div class="safari-img position-relative">
                        <img src="{{ asset('img/Great-Migration-From-Serengeti.jpg') }}" class="img-fluid w-100"
                            alt="The Great Migration in the Serengeti, a highlight of the Ultimate Tanzanian Escape"
                            loading="lazy">
                        <div class="safari-days badge bg-primary">6 Days</div>
                    </div>
                    <div class="p-4 d-flex flex-column flex-grow-1">
                        <h4 class="mb-3">Ultimate Tanzanian Escape</h4>
                        <div class="d-flex mb-3">
                            <span class="me-3"><i
                                    class="fas fa-map-marked-alt text-primary me-2"></i>Multi-Park</span>
                            <span><i class="fas fa-star text-primary me-2"></i>Comprehensive</span>
                        </div>
                        <p class="mb-4 flex-grow-1">A complete 6-day journey through Tarangire, Serengeti,
                            Ngorongoro, plus Arusha culture & nature experiences.</p>
                        <div class="safari-features mb-4">
                            <h6 class="mb-2">Highlights:</h6>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check text-primary me-2"></i>Major National Parks</li>
                                <li><i class="fas fa-check text-primary me-2"></i>Cultural Immersion</li>
                                <li><i class="fas fa-check text-primary me-2"></i>High-Tier Lodges</li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <a href="{{ route('inquiry.create', 'ultimate-tanzanian-escape') }}"
                                class="btn btn-primary px-4 rounded-pill">Inquire</a>
                            <a href="{{ url('/ultimate-tanzanian-escape') }}" class="text-primary">Details <i
                                    class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow bounceInUp" data-wow-delay="0.3s">
                <div class="safari-card rounded overflow-hidden h-100 d-flex flex-column">
                    <div class="safari-img position-relative">
                        <img src="{{ asset('img/Ngorongoro-Crater-in-Tanzania.jpg') }}" class="img-fluid w-100"
                            alt="Scenic view of the Ngorongoro Crater, part of A Taste of Tanzania safari"
                            loading="lazy">
                        <div class="safari-days badge bg-primary">3 Days</div>
                    </div>
                    <div class="p-4 d-flex flex-column flex-grow-1">
                        <h4 class="mb-3">A Taste of Tanzania</h4>
                        <div class="d-flex mb-3">
                            <span class="me-3"><i class="fas fa-map-marker-alt text-primary me-2"></i>Arusha &
                                Ngorongoro</span>
                            <span><i class="fas fa-seedling text-primary me-2"></i>Nature & Culture</span>
                        </div>
                        <p class="mb-4 flex-grow-1">A whirlwind 3-day tour featuring Ngorongoro Crater, Arusha
                            culture, Kili foothills, and Serval Wildlife.</p>
                        <div class="safari-features mb-4">
                            <h6 class="mb-2">Highlights:</h6>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check text-primary me-2"></i>Ngorongoro Day Trip</li>
                                <li><i class="fas fa-check text-primary me-2"></i>Cultural Experiences</li>
                                <li><i class="fas fa-check text-primary me-2"></i>Waterfall & Coffee Tour</li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <a href="{{ route('inquiry.create', 'taste-of-tanzania') }}" class="btn btn-primary px-4 rounded-pill">Inquire</a>
                            <a href="{{ url('/taste-of-tanzania') }}" class="text-primary">Details <i
                                    class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow bounceInUp" data-wow-delay="0.5s">
                <div class="safari-card rounded overflow-hidden h-100 d-flex flex-column">
                    <div class="safari-img position-relative">
                        <img src="{{ asset('img/zanzibar-flight.jpg') }}" class="img-fluid w-100"
                            alt="Flight from Zanzibar, representing the Tanzanian Express fly-in safari"
                            loading="lazy">
                        <div class="safari-days badge bg-primary">2 Days Fly-In</div>
                    </div>
                    <div class="p-4 d-flex flex-column flex-grow-1">
                        <h4 class="mb-3">Tanzanian Express</h4>
                        <div class="d-flex mb-3">
                            <span class="me-3"><i class="fas fa-plane text-primary me-2"></i>From Zanzibar</span>
                            <span><i class="fas fa-map-marker-alt text-primary me-2"></i>Ngorongoro</span>
                        </div>
                        <p class="mb-4 flex-grow-1">A quick 2-day safari add-on from Zanzibar including flights,
                            Ngorongoro Crater, culture, and wildlife encounters.</p>
                        <div class="safari-features mb-4">
                            <h6 class="mb-2">Highlights:</h6>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check text-primary me-2"></i>Return Flights Incl.</li>
                                <li><i class="fas fa-check text-primary me-2"></i>Ngorongoro Safari</li>
                                <li><i class="fas fa-check text-primary me-2"></i>Perfect Zanzibar Add-on</li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <a href="{{ route('inquiry.create', 'tanzanian-express') }}" class="btn btn-primary px-4 rounded-pill">Inquire</a>
                            <a href="{{ url('/tanzanian-express') }}" class="text-primary">Details <i
                                    class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow bounceInUp" data-wow-delay="0.7s">
                <div class="safari-card rounded overflow-hidden h-100 d-flex flex-column">
                    <div class="safari-img position-relative">
                        <img src="{{ asset('img/serval-lion.JPG') }}" class="img-fluid w-100"
                            alt="Close encounter with a lion at Serval Wildlife, part of the Selfie with White Lion day trip"
                            loading="lazy">
                        <div class="safari-days badge bg-primary">1 Day Fly-In</div>
                    </div>
                    <div class="p-4 d-flex flex-column flex-grow-1">
                        <h4 class="mb-3">Selfie with White Lion</h4>
                        <div class="d-flex mb-3">
                            <span class="me-3"><i class="fas fa-plane text-primary me-2"></i>From Zanzibar</span>
                            <span><i class="fas fa-paw text-primary me-2"></i>Serval Wildlife</span>
                        </div>
                        <p class="mb-4 flex-grow-1">A unique all-inclusive day trip from Zanzibar featuring flights,
                            Serval Wildlife, coffee tour, and cultural insights.</p>
                        <div class="safari-features mb-4">
                            <h6 class="mb-2">Highlights:</h6>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check text-primary me-2"></i>Return Flights Incl.</li>
                                <li><i class="fas fa-check text-primary me-2"></i>White Lion Encounter</li>
                                <li><i class="fas fa-check text-primary me-2"></i>Unique Day Adventure</li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <a href="{{ route('inquiry.create', 'selfie-with-white-lion') }}" class="btn btn-primary px-4 rounded-pill">Inquire</a>
                            <a href="{{ url('/selfie-with-white-lion') }}" class="text-primary">Details <i
                                    class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="text-center mt-5">
            <a href="{{ url('/safaris') }}" class="btn btn-outline-primary py-3 px-5 rounded-pill">View All Safari Packages</a>
        </div>
    </div>
</div>
<!-- Safari Packages End -->

<!-- Service Start -->
<div class="container-fluid service py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small
                class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Our
                Services</small>
            <h1 class="display-5 mb-5">Tailored Adventures For Every Explorer</h1>
        </div>
        <div class="row g-4 justify-content-center">

            <div class="col-lg-2 col-md-4 col-sm-6 col-12 wow bounceInUp" data-wow-delay="0.1s">
                <a href="{{ url('/tailoredsafaris') }}" class="service-link-v5">
                    <div class="service-card-v5">
                        <div class="service-icon-v5">
                            <i class="fa fa-route"></i>
                        </div>
                        <div class="service-text-v5 d-flex flex-column h-100">
                            <h4>Tailored Safaris</h4>
                            <p class="mb-0">Craft your dream adventure with personalized itineraries matching your
                                interests.</p>
                            <span class="learn-more mt-auto">Learn More <i
                                    class="fas fa-arrow-right fa-xs ms-1"></i></span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6 col-12 wow bounceInUp" data-wow-delay="0.2s">
                <a href="{{ url('/luxurysafari') }}" class="service-link-v5">
                    <div class="service-card-v5">
                        <div class="service-icon-v5">
                            <i class="fa fa-gem"></i>
                        </div>
                        <div class="service-text-v5 d-flex flex-column h-100">
                            <h4>Luxury Safaris</h4>
                            <p class="mb-0">Experience Tanzania in ultimate comfort with exclusive lodges and
                                premium service.</p>
                            <span class="learn-more mt-auto">Learn More <i
                                    class="fas fa-arrow-right fa-xs ms-1"></i></span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6 col-12 wow bounceInUp" data-wow-delay="0.3s">
                <a href="{{ url('/mountaintrekking') }}" class="service-link-v5">
                    <div class="service-card-v5">
                        <div class="service-icon-v5">
                            <i class="fa fa-mountain"></i>
                        </div>
                        <div class="service-text-v5 d-flex flex-column h-100">
                            <h4>Mountain Trekking</h4>
                            <p class="mb-0">Conquer Kilimanjaro or Meru with our experienced guides and safety
                                focus.</p>
                            <span class="learn-more mt-auto">Learn More <i
                                    class="fas fa-arrow-right fa-xs ms-1"></i></span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6 col-12 wow bounceInUp" data-wow-delay="0.4s">
                <a href="{{ url('/groupsafaris') }}" class="service-link-v5">
                    <div class="service-card-v5">
                        <div class="service-icon-v5">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="service-text-v5 d-flex flex-column h-100">
                            <h4>Group Safaris</h4>
                            <p class="mb-0">Join scheduled departures for an affordable and social safari
                                experience.</p>
                            <span class="learn-more mt-auto">Learn More <i
                                    class="fas fa-arrow-right fa-xs ms-1"></i></span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6 col-12 wow bounceInUp" data-wow-delay="0.5s">
                <a href="{{ url('/zanzibarbeachholiday') }}" class="service-link-v5">
                    <div class="service-card-v5">
                        <div class="service-icon-v5">
                            <i class="fa fa-umbrella-beach"></i>
                        </div>
                        <div class="service-text-v5 d-flex flex-column h-100">
                            <h4>Zanzibar Holidays</h4>
                            <p class="mb-0">Relax on pristine beaches, explore Stone Town, or dive into turquoise
                                waters.</p>
                            <span class="learn-more mt-auto">Learn More <i
                                    class="fas fa-arrow-right fa-xs ms-1"></i></span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6 col-12 wow bounceInUp" data-wow-delay="0.6s">
                <a href="{{ url('/budgetsafari') }}" class="service-link-v5">
                    <div class="service-card-v5">
                        <div class="service-icon-v5">
                            <i class="fa fa-campground"></i>
                        </div>
                        <div class="service-text-v5 d-flex flex-column h-100">
                            <h4>Budget Safaris</h4>
                            <p class="mb-0">Explore Tanzania's wonders affordably with quality camping and basic
                                lodges.</p>
                            <span class="learn-more mt-auto">Learn More <i
                                    class="fas fa-arrow-right fa-xs ms-1"></i></span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->

<div class="container-fluid destinations py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small
                class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Destinations</small>
            <h1 class="display-5 mb-5">Explore Tanzania's Wonders</h1>
        </div>
        <div class="row g-4">

            <div class="col-lg-4 col-md-6 wow bounceInUp" data-wow-delay="0.1s">
                <a href="{{ url('/serengeti') }}" class="destination-card-v2">
                    <div class="card-img-wrapper">
                        <img src="{{ asset('img/home-serengeti.jpg') }}" class="card-img" alt="Serengeti National Park"
                            loading="lazy">
                    </div>
                    <div class="card-title-overlay">
                        <h4 class="card-title">Serengeti</h4>
                        <span class="card-subtitle">The Endless Plains & Great Migration</span>
                    </div>
                    <div class="card-hover-overlay">
                        <p class="hover-text">Witness the vast plains and the incredible Great Migration.</p>
                        <span class="btn btn-explore">Explore Details</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6 wow bounceInUp" data-wow-delay="0.2s">
                <a href="{{ url('/ngorongoro') }}" class="destination-card-v2">
                    <div class="card-img-wrapper">
                        <img src="{{ asset('img/home-ngorongoro.jpg') }}" class="card-img" alt="Ngorongoro Crater" loading="lazy">
                    </div>
                    <div class="card-title-overlay">
                        <h4 class="card-title">Ngorongoro</h4>
                        <span class="card-subtitle">Wildlife Haven in a Caldera</span>
                    </div>
                    <div class="card-hover-overlay">
                        <p class="hover-text">Descend into the world's largest intact caldera, teeming with
                            wildlife.</p>
                        <span class="btn btn-explore">Explore Details</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6 wow bounceInUp" data-wow-delay="0.3s">
                <a href="{{ url('/tarangire') }}" class="destination-card-v2">
                    <div class="card-img-wrapper">
                        <img src="{{ asset('img/home-tarangire.jpg') }}" class="card-img" alt="Tarangire National Park"
                            loading="lazy">
                    </div>
                    <div class="card-title-overlay">
                        <h4 class="card-title">Tarangire</h4>
                        <span class="card-subtitle">Land of Elephants & Baobabs</span>
                    </div>
                    <div class="card-hover-overlay">
                        <p class="hover-text">Marvel at huge elephant herds and ancient, giant baobab trees.</p>
                        <span class="btn btn-explore">Explore Details</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6 wow bounceInUp" data-wow-delay="0.4s">
                <a href="{{ url('/manyara') }}" class="destination-card-v2">
                    <div class="card-img-wrapper">
                        <img src="{{ asset('img/home-manyara.jpg') }}" class="card-img" alt="Lake Manyara National Park"
                            loading="lazy">
                    </div>
                    <div class="card-title-overlay">
                        <h4 class="card-title">Lake Manyara</h4>
                        <span class="card-subtitle">Tree-Climbing Lions & Rift Valley Views</span>
                    </div>
                    <div class="card-hover-overlay">
                        <p class="hover-text">Discover diverse habitats, flamingos, and perhaps lions lounging in
                            trees.</p>
                        <span class="btn btn-explore">Explore Details</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6 wow bounceInUp" data-wow-delay="0.5s">
                <a href="{{ url('/mtkilimanjaro') }}" class="destination-card-v2">
                    <div class="card-img-wrapper">
                        <img src="{{ asset('img/home-kilimanjaro.jpg') }}" class="card-img" alt="Mount Kilimanjaro" loading="lazy">
                    </div>
                    <div class="card-title-overlay">
                        <h4 class="card-title">Kilimanjaro</h4>
                        <span class="card-subtitle">Climb the Roof of Africa</span>
                    </div>
                    <div class="card-hover-overlay">
                        <p class="hover-text">Embark on the challenge of summiting Africa's highest peak.</p>
                        <span class="btn btn-explore">Explore Details</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6 wow bounceInUp" data-wow-delay="0.6s">
                <a href="{{ url('/zanzibar-archipelago') }}" class="destination-card-v2">
                    <div class="card-img-wrapper">
                        <img src="{{ asset('img/home-zanzibar.jpg') }}" class="card-img" alt="Zanzibar Beach" loading="lazy">
                    </div>
                    <div class="card-title-overlay">
                        <h4 class="card-title">Zanzibar</h4>
                        <span class="card-subtitle">Spice Island Paradise</span>
                    </div>
                    <div class="card-hover-overlay">
                        <p class="hover-text">Relax on pristine beaches, explore Stone Town, and savor island life.
                            </p>
                        <span class="btn btn-explore">Explore Details</span>
                    </div>
                </a>
            </div>

        </div>
        <div class="text-center mt-5">
            <a href="{{ url('/destinations') }}" class="btn btn-outline-primary py-3 px-5 rounded-pill">View All Destinations</a>
        </div>
    </div>
</div>

<!-- Book Us Start -->
<div class="container-fluid contact py-6 wow bounceInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row g-0">
            <div class="col-1">
                <img src="{{ asset('img/home-booking.jpg') }}" class="img-fluid h-100 w-100 rounded-start"
                    style="object-fit: cover; opacity: 0.7;" alt="" loading="lazy">
            </div>
            <div class="col-10">
                <div class="border-bottom border-top border-primary bg-light py-5 px-4">
                    <div class="text-center">
                        <small
                            class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Plan
                            Your Safari</small>
                        <h1 class="display-5 mb-5">Customize Your Tanzania Adventure</h1>
                    </div>
                    <div class="row g-4 form">
                        <div class="col-lg-4 col-md-6">
                            <select class="form-select border-primary p-2" aria-label="Default select example">
                                <option selected>Select Safari Type</option>
                                <option value="1">Wildlife Safari</option>
                                <option value="2">Beach Holiday</option>
                                <option value="3">Kilimanjaro Trek</option>
                                <option value="4">Cultural Tour</option>
                                <option value="5">Honeymoon Package</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <select class="form-select border-primary p-2" aria-label="Default select example">
                                <option selected>Select Duration</option>
                                <option value="1">3-5 Days</option>
                                <option value="2">6-8 Days</option>
                                <option value="3">9-12 Days</option>
                                <option value="4">13+ Days</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <select class="form-select border-primary p-2" aria-label="Default select example">
                                <option selected>Travel Month</option>
                                <option value="1">January - March</option>
                                <option value="2">April - June</option>
                                <option value="3">July - September</option>
                                <option value="4">October - December</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <select class="form-select border-primary p-2" aria-label="Default select example">
                                <option selected>Accommodation Level</option>
                                <option value="1">Budget Camping</option>
                                <option value="2">Mid-Range Lodges</option>
                                <option value="3">Luxury Tented Camps</option>
                                <option value="4">5-Star Lodges</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <select class="form-select border-primary p-2" aria-label="Default select example">
                                <option selected>Number of Travelers</option>
                                <option value="1">1-2 People</option>
                                <option value="2">3-4 People</option>
                                <option value="3">5-6 People</option>
                                <option value="4">7+ People</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <input type="text" class="form-control border-primary p-2" placeholder="Your Name">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <input type="email" class="form-control border-primary p-2" placeholder="Your Email">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <input type="tel" class="form-control border-primary p-2" placeholder="Phone Number">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <input type="text" class="form-control border-primary p-2" placeholder="Country">
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill">Get Safari
                                Quote</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1">
                <img src="{{ asset('img/home-booking.jpg') }}" class="img-fluid h-100 w-100 rounded-end"
                    style="object-fit: cover; opacity: 0.7;" alt="" loading="lazy">
            </div>
        </div>
    </div>
</div>
<!-- Book Us End -->


<!-- Testimonial Start -->
<div class="container-fluid py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small
                class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Testimonials</small>
            <h1 class="display-5 mb-5">What Our Travelers Say</h1>
        </div>
        <div class="owl-carousel owl-theme testimonial-carousel testimonial-carousel-1 mb-4 wow bounceInUp"
            data-wow-delay="0.1s">
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="{{ asset('img/Erlend G.jpg') }}" class="img-fluid rounded-circle flex-shrink-0" alt="Traveler"
                        loading="lazy">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Erlend G</h4>
                        <p class="m-0">USA</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">We went on a 4 day safari on the Seregeti and Ngorongoro conservation
                        area, January 2025. Fantastic trip and excellent service! The locally owned Golden Memories
                        give top guiding and premium hospitality. </p>
                </div>
            </div>
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="{{ asset('img/misssunshine.jpg') }}" class="img-fluid rounded-circle flex-shrink-0" alt="Traveler"
                        loading="lazy">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Miss Sunshine</h4>
                        <p class="m-0">Germany</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">I had two wonderful days with the team of goldenmemories.
                        Henry is so kind and respectful.
                        It was my birthday and I was even surprised with a cake. I felt very comfortable and can
                        only say that I will keep golden memories of this trip! Henry thank you very much!!! If I
                        could I would give 10 stars!</p>
                </div>
            </div>
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="{{ asset('img/Monika U.jpg') }}" class="img-fluid rounded-circle flex-shrink-0" alt="Traveler"
                        loading="lazy">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Monika U</h4>
                        <p class="m-0">Italy</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">Great hospitality, excellent guides with a lot of stories to tell.
                        Everything was top ranked, they took really good care of us as their clients, they listened
                        to all our requests and made them into life.
                        We had a lof of food, drinks etc. They were taking care of our mood during trip.
                        Really recommend this one.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->


<!-- Blog Start -->
<div class="container-fluid blog py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small
                class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Safari
                Blog</small>
            <h1 class="display-5 mb-5">Latest Safari News & Tips</h1>
        </div>
        <div class="row gx-4 justify-content-center">
            <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s">
                <div class="blog-item">
                    <div class="overflow-hidden rounded">
                        <img src="{{ asset('img/home-blog-1.jpg') }}" class="img-fluid w-100" alt="Great Migration" loading="lazy">
                    </div>
                    <div class="blog-content mx-4 d-flex rounded bg-light">
                        <div class="text-dark bg-primary rounded-start">
                            <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                                <p class="fw-bold mb-0">15</p>
                                <p class="fw-bold mb-0">Jun</p>
                            </div>
                        </div>
                        <a href="{{ url('/blog-detail-migration') }}" class="h5 lh-base my-auto h-100 p-3">Best Time to See the
                            Great Migration in Serengeti</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.3s">
                <div class="blog-item">
                    <div class="overflow-hidden rounded">
                        <img src="{{ asset('img/home-blog-2.jpg') }}" class="img-fluid w-100" alt="Kilimanjaro" loading="lazy">
                    </div>
                    <div class="blog-content mx-4 d-flex rounded bg-light">
                        <div class="text-dark bg-primary rounded-start">
                            <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                                <p class="fw-bold mb-0">02</p>
                                <p class="fw-bold mb-0">Jul</p>
                            </div>
                        </div>
                        <a href="{{ url('/blog-detail-kilimanjaro-prep') }}" class="h5 lh-base my-auto h-100 p-3">Preparing for
                            Your Kilimanjaro Trek: Essential Guide</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.5s">
                <div class="blog-item">
                    <div class="overflow-hidden rounded">
                        <img src="{{ asset('img/home-blog-3.jpg') }}" class="img-fluid w-100" alt="Safari Photography"
                            loading="lazy">
                    </div>
                    <div class="blog-content mx-4 d-flex rounded bg-light">
                        <div class="text-dark bg-primary rounded-start">
                            <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                                <p class="fw-bold mb-0">22</p>
                                <p class="fw-bold mb-0">Jul</p>
                            </div>
                        </div>
                        <a href="{{ url('/blog-detail-photo-tips') }}" class="h5 lh-base my-auto h-100 p-3">Wildlife Photography
                            Tips for Your Safari</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->

@endsection

@section('extra_scripts')
<script>
    // Video Modal Script
    const videoModal = document.getElementById('videoModal');
    if (videoModal) {
        videoModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const videoSrc = button.getAttribute('data-src');
            const iframe = videoModal.querySelector('iframe');
            iframe.src = videoSrc + "?autoplay=1";
        });

        videoModal.addEventListener('hidden.bs.modal', function () {
            const iframe = videoModal.querySelector('iframe');
            iframe.src = "";
        });
    }

    // Initialize Owl Carousel for Hero Section
    $(document).ready(function () {
        // This specific initialization is for the hero carousel.
        // If main.js also initializes .owl-carousel generally, ensure it doesn't conflict.
        // Or, ensure main.js targets other carousels with more specific selectors like ".testimonial-carousel".
        // The following initialization has been moved to js/main.js for better consistency and load management.
        // $(".hero-carousel").owlCarousel({
        //     items: 1,
        //     loop: true,
        //     autoplay: true,
        //     autoplayTimeout: 7000,
        //     autoplayHoverPause: true,
        //     dots: true,
        //     nav: true,
        //     navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
        //     animateOut: 'fadeOut',
        //     animateIn: 'fadeIn',
        //     smartSpeed: 1000
        // });
    });
</script>
@endsection