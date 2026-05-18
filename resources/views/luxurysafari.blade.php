@extends('layouts.app')

@section('title', 'Luxury Tanzania Safaris | Premium Lodges & Exclusive Experiences')
@section('keywords', 'luxury safari tanzania, tanzania luxury lodges, premium safari, exclusive safari, five star safari, golden memories safaris')
@section('description', 'Experience the ultimate luxury Tanzania safari: exclusive lodges, private guides, and bespoke adventures in Serengeti, Ngorongoro & beyond. Book your premium safari with Golden Memories Safaris.')
@section('canonical', 'https://www.gmsafaris.co.tz/luxurysafari')
@section('og_title', 'Luxury Safaris in Tanzania - Golden Memories Safaris')
@section('og_description', 'Experience the ultimate Tanzania safari in unparalleled comfort and style. Discover exclusive lodges, private guides, and bespoke luxury adventures with Golden Memories Safaris.')
@section('og_url', 'https://www.gmsafaris.co.tz/luxurysafari')
@section('og_image', 'https://www.gmsafaris.co.tz/img/logo.webp')
@section('twitter_title', 'Luxury Safaris in Tanzania - Golden Memories Safaris')
@section('twitter_description', 'Experience the ultimate Tanzania safari in unparalleled comfort and style. Discover exclusive lodges, private guides, and bespoke luxury adventures with Golden Memories Safaris.')
@section('twitter_image', 'https://www.gmsafaris.co.tz/img/logo.webp')

@section('extra_styles')
<style>

        .page-header {
            background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url(img/luxury-header.webp) center center no-repeat;
            background-size: cover;
        }
        .benefit-item i {
            width: 35px; /* Adjusted width for luxury icons */
            text-align: center;
        }
        .experience-item i {
            width: 25px;
            text-align: center;
        }
         /* Ensure form selects/inputs have consistent height */
        .form .form-select, .form .form-control {
            height: calc(1.5em + 1rem + 2px); /* Adjust based on your padding/font */
        }
        .form textarea.form-control {
             height: auto; /* Allow textarea to define its height */
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
          "name": "Luxury Safaris in Tanzania",
          "item": "https://www.gmsafaris.co.tz/luxurysafari"
        }
      ]
    }
    </script>
@endsection

@section('body_content')

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">Luxury Tanzania Safaris</h1> 
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('safaris') }}">Safaris</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Luxury Safaris</li> 
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Luxury Safari Content Start -->
    <div class="container-fluid py-6">
        <div class="container">
            <div class="row g-5 align-items-center">
                <!-- Introduction Text -->
                <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.1s">
                    <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Unforgettable Indulgence</small> 
                    <h1 class="display-5 mb-4">Experience Tanzania in Ultimate Style</h1> 
                    <p class="mb-4">Embark on a journey where breathtaking wildlife encounters meet unparalleled comfort and exclusivity. Golden Memories Safaris curates luxury Tanzania experiences that redefine adventure, blending thrilling game drives with stays in the finest lodges and camps the country has to offer.</p>
                    <p class="mb-4">From private vehicles and expert guides dedicated solely to your party, to gourmet dining under the stars and seamless travel logistics, every detail is meticulously arranged. Indulge in personalized service, unique activities, and intimate settings that create truly once-in-a-lifetime memories.</p>
                    <a href="#inquire-luxury" class="btn btn-primary py-3 px-5 rounded-pill">Inquire Now<i class="fas fa-arrow-down ps-2"></i></a> 
                </div>
                 <!-- Image -->
                 <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.3s">
                    <img src="{{ asset('img/luxury-main.webp') }}" class="img-fluid rounded" alt="Luxury safari lodge view" loading="lazy">
                    
                </div>
            </div>

            <!-- Hallmarks Section -->
            <div class="row g-4 mt-5 wow bounceInUp" data-wow-delay="0.1s">
                <div class="col-12 text-center">
                     <h2 class="mb-5">Hallmarks of Our Luxury Safaris</h2>
                </div>
            
                <div class="col-lg-4 col-md-6">
                    <div class="benefit-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-gem fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Exclusive Lodges & Camps</h5>
                            <p class="mb-0 small">Stay in premium, often intimate properties with exceptional locations and amenities.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="benefit-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-user-tie fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Private Guided Experiences</h5>
                            <p class="mb-0 small">Enjoy the flexibility and expertise of your own dedicated guide and vehicle.</p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6">
                    <div class="benefit-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-utensils fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Gourmet Cuisine & Drinks</h5>
                            <p class="mb-0 small">Savor exceptional meals, often paired with fine wines and premium beverages.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="benefit-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-concierge-bell fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Seamless Logistics</h5>
                            <p class="mb-0 small">Effortless travel, including internal flights, transfers, and dedicated support.</p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6">
                    <div class="benefit-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-edit fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Personalized Itineraries</h5>
                            <p class="mb-0 small">Crafted around your interests, ensuring a unique and fulfilling journey.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="benefit-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-star fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Exceptional Service</h5>
                            <p class="mb-0 small">Attentive, discreet, and anticipating your needs throughout your safari.</p>
                        </div>
                    </div>
                </div>
            </div>

             <!-- Signature Experiences Section -->
             <div class="row g-5 mt-5 align-items-center">
                <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.1s">
                    <img src="{{ asset('img/luxury-experiences.webp') }}" class="img-fluid rounded" alt="Hot air balloon over Serengeti" loading="lazy">
                </div>
                <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.3s">
                     <h2 class="mb-4">Signature Luxury Experiences</h2>
                     <p>Elevate your safari with unique activities often included or easily arranged on our luxury tours:</p>
                     <ul class="list-unstyled">
                        <li class="mb-3 d-flex align-items-start experience-item">
                            <i class="fas fa-wind text-primary fa-lg me-3 mt-1"></i>
                            <div><strong>Hot Air Balloon Safaris:</strong> Glide silently over the plains at sunrise for breathtaking panoramic views (e.g., Serengeti).</div>
                        </li>
                        <li class="mb-3 d-flex align-items-start experience-item">
                             <i class="fas fa-glass-cheers text-primary fa-lg me-3 mt-1"></i>
                            <div><strong>Private Sundowners:</strong> Enjoy cocktails and canapés in stunning, secluded locations as the sun sets.</div>
                        </li>
                        <li class="mb-3 d-flex align-items-start experience-item">
                            <i class="fas fa-plane text-primary fa-lg me-3 mt-1"></i>
                           <div> <strong>Fly-In Safaris:</strong> Maximize your time in remote parks with convenient light aircraft flights between locations.</div>
                        </li>
                         <li class="mb-3 d-flex align-items-start experience-item">
                            <i class="fas fa-spa text-primary fa-lg me-3 mt-1"></i>
                            <div><strong>Wellness & Spa:</strong> Relax and rejuvenate with spa treatments available at select luxury lodges.</div>
                        </li>
                         <li class="mb-3 d-flex align-items-start experience-item">
                            <i class="fas fa-walking text-primary fa-lg me-3 mt-1"></i>
                            <div><strong>Guided Bush Walks:</strong> Connect with nature intimately on guided walks (where permitted and safe).</div>
                        </li>
                          <li class="mb-3 d-flex align-items-start experience-item">
                            <i class="fas fa-camera-retro text-primary fa-lg me-3 mt-1"></i>
                            <div><strong>Photographic Vehicles:</strong> Utilize specialized vehicles with beanbag mounts and charging points (on request).</div>
                        </li>
                     </ul>
                </div>
            </div>

             <!-- Luxury Inclusions Section -->
             <div class="row mt-5 wow bounceInUp" data-wow-delay="0.1s">
                 <div class="col-12">
                     <h2 class="text-center mb-5">Luxury Safari Inclusions (Examples)</h2> 
                 </div>
                
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-car-side text-primary me-2"></i> Private 4x4 Safari Vehicle</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-user-shield text-primary me-2"></i> Expert Private Guide</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-bed text-primary me-2"></i> Premium Lodge/Camp Stays</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-wine-bottle text-primary me-2"></i> All Meals & Select Drinks</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-id-card text-primary me-2"></i> Park & Concession Fees</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-plane-departure text-primary me-2"></i> Internal Flights (as per itinerary)</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-headset text-primary me-2"></i> Dedicated Concierge Support</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-luggage-cart text-primary me-2"></i> Airport Meet & Greet / Transfers</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-medkit text-primary me-2"></i> Emergency Evacuation Insurance</div>
             </div>

        </div>
    </div>
    <!-- Luxury Safari Content End -->


    <!-- ======================= LUXURY SAFARI CTA START ========================== -->
    <div class="container-fluid py-6 wow bounceInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center bg-light rounded p-5 border border-primary">
                <small class="d-inline-block fw-bold text-dark text-uppercase bg-white border border-primary rounded-pill px-4 py-1 mb-3">Begin Your Luxury Journey</small>
                <h2 class="display-5 mb-3">Ready to Start Your Luxury Safari?</h2>
                <p class="lead mb-4 mx-auto" style="max-width: 600px;">Share your preferences and our luxury travel specialists will design a bespoke itinerary for your ultimate Tanzanian adventure.</p>
                <a href="{{ route('contact') }}" class="btn btn-primary px-5 py-3 rounded-pill fw-bold">Get Your Free Quote <i class="fas fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </div>
    <!-- ======================= LUXURY SAFARI CTA END ========================== -->


@endsection
