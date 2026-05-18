@extends('layouts.app')

@section('title', 'Budget Tanzania Safaris | Affordable Wildlife Adventures & Camping')
@section('keywords', 'budget safari tanzania, affordable safari, tanzania camping safari, cheap safari tanzania, basic lodge safari, group budget safari')
@section('description', 'Explore Tanzania on a budget without compromising the experience. Camping safaris, basic lodge tours & group departures in Serengeti, Ngorongoro & Tarangire. Book with Golden Memories Safaris.')
@section('canonical', 'https://www.gmsafaris.co.tz/budgetsafari')
@section('og_title', 'Budget Safaris in Tanzania - Affordable Adventures - Golden Memories Safaris')
@section('og_description', 'Explore Tanzania affordably! Discover our budget safari options, including camping and basic lodge tours. Experience incredible wildlife without breaking the bank with Golden Memories Safaris.')
@section('og_url', 'https://www.gmsafaris.co.tz/budgetsafari')
@section('og_image', 'https://www.gmsafaris.co.tz/img/logo.webp')
@section('twitter_title', 'Budget Safaris in Tanzania - Affordable Adventures - Golden Memories Safaris')
@section('twitter_description', 'Explore Tanzania affordably! Discover our budget safari options, including camping and basic lodge tours. Experience incredible wildlife without breaking the bank with Golden Memories Safaris.')
@section('twitter_image', 'https://www.gmsafaris.co.tz/img/logo.webp')

@section('extra_styles')
<style>

        .page-header {
            background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url(img/budget-safari-header.webp) center center no-repeat;
            background-size: cover;
        }
        .feature-item i {
            width: 35px;
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
          "name": "Budget Safaris in Tanzania",
          "item": "https://www.gmsafaris.co.tz/budgetsafari"
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
            <h1 class="display-4 text-white animated slideInDown mb-4">Affordable Budget Safaris</h1> <!-- Title Updated -->
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('safaris') }}">Safaris</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Budget Safaris</li> <!-- Breadcrumb Updated -->
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Budget Safari Content Start -->
    <div class="container-fluid py-6">
        <div class="container">
            <div class="row g-5 align-items-center">
                <!-- Introduction Text -->
                <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.1s">
                    <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Adventure Within Reach</small> <!-- Subtitle Updated -->
                    <h1 class="display-5 mb-4">Explore Tanzania Affordably</h1> <!-- Heading Updated -->
                    <p class="mb-4">Dreaming of a Tanzanian safari but working with a specific budget? Golden Memories Safaris offers incredible budget-friendly options that deliver the magic of the wilderness without compromising on the core experience. See amazing wildlife, explore stunning landscapes, and create unforgettable memories affordably.</p>
                    <p class="mb-4">Our budget safaris typically involve comfortable camping within designated park campsites or stays in clean, basic lodges outside park boundaries. You'll travel with our professional guides in reliable 4x4 vehicles, often sharing the adventure (and costs) with fellow travelers on group departures or on a private basis.</p>
                    <a href="#inquire-budget" class="btn btn-primary py-3 px-5 rounded-pill">Get Your Budget Quote<i class="fas fa-arrow-down ps-2"></i></a> <!-- Button Link Updated -->
                </div>
                 <!-- Image -->
                 <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.3s">
                    <img src="{{ asset('img/budget-safari-main.webp') }}" class="img-fluid rounded" alt="Travelers enjoying a budget safari in Tanzania" loading="lazy">
                </div>
            </div>

            <!-- Why Choose Budget Section -->
            <div class="row g-4 mt-5 wow bounceInUp" data-wow-delay="0.1s">
                <div class="col-12 text-center">
                     <h2 class="mb-5">Why Choose a Budget Safari?</h2> <!-- Heading Updated -->
                </div>
                <!-- Features adapted for Budget Safaris -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-coins fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Excellent Value</h5>
                            <p class="mb-0 small">Experience the highlights of Tanzania at a significantly lower cost.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-campground fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Authentic Camping Experience</h5>
                            <p class="mb-0 small">Sleep under the stars amidst nature's sounds (camping options).</p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6">
                    <div class="feature-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-users fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Great for Social Travelers</h5>
                            <p class="mb-0 small">Often run as group tours, perfect for meeting new people (optional).</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-binoculars fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Focus on Wildlife</h5>
                            <p class="mb-0 small">Maximize time spent on game drives searching for incredible animals.</p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6">
                    <div class="feature-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-user-tie fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Professional Guide & Vehicle</h5>
                            <p class="mb-0 small">Benefit from expert guiding and reliable 4x4 transport.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-leaf fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Closer to Nature</h5>
                            <p class="mb-0 small">An immersive experience, especially when camping within the parks.</p>
                        </div>
                    </div>
                </div>
            </div>

             <!-- What to Expect Section -->
             <div class="row g-5 mt-5 align-items-center">
                <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.1s">
                    <img src="{{ asset('img/budget-camping.webp') }}" class="img-fluid rounded" alt="Budget safari campsite setup in Tanzania" loading="lazy">
                </div>
                <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.3s">
                     <h2 class="mb-4">Understanding Budget Safaris</h2> <!-- Heading Updated -->
                     <p>Budget doesn't mean basic quality, but it involves different logistics:</p>
                     <ul class="list-unstyled">
                        <li class="mb-3 d-flex align-items-start">
                            <i class="fas fa-bed text-primary me-3 mt-1"></i>
                            <div><strong>Accommodation Types:</strong> Primarily public campsites with shared facilities (showers/toilets) or basic, clean lodges located just outside park boundaries.</div>
                        </li>
                         <li class="mb-3 d-flex align-items-start">
                            <i class="fas fa-campground text-primary me-3 mt-1"></i>
                            <div><strong>Camping Setup:</strong> On camping safaris, dome tents, sleeping bags, and mats are provided. Your crew typically sets up camp.</div>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                             <i class="fas fa-utensils text-primary me-3 mt-1"></i>
                            <div><strong>Meals:</strong> Prepared by a dedicated safari cook (on camping trips) or taken at the basic lodges. Expect hearty, simple, and filling food.</div>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <i class="fas fa-car-side text-primary me-3 mt-1"></i>
                           <div> <strong>Transport:</strong> Standard 4x4 safari vehicle with pop-up roof, driven by your guide. Often shared with other travelers on group tours.</div>
                        </li>
                         <li class="mb-3 d-flex align-items-start">
                            <i class="fas fa-hands-helping text-primary me-3 mt-1"></i>
                            <div><strong>Participation:</strong> Minimal participation usually required, but a spirit of adventure and flexibility is key!</div>
                        </li>
                     </ul>
                     <p><em>It's the most authentic way to experience the bush while managing costs effectively.</em></p>
                </div>
            </div>

             <!-- Budget Safari Inclusions Section -->
             <div class="row mt-5 wow bounceInUp" data-wow-delay="0.1s">
                 <div class="col-12">
                     <h2 class="text-center mb-5">Typical Budget Safari Inclusions</h2> <!-- Heading Updated -->
                 </div>
                 <!-- List adapted for budget safaris -->
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-car text-primary me-2"></i> 4x4 Safari Vehicle & Fuel</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-user-tie text-primary me-2"></i> Professional English-Speaking Guide</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-id-card text-primary me-2"></i> All Park Entrance & Conservation Fees</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-campground text-primary me-2"></i> Camping Fees / Basic Lodge Costs</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-utensils text-primary me-2"></i> Meals as per Itinerary (B, L, D)</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-tint text-primary me-2"></i> Bottled Water during Game Drives</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-user-cog text-primary me-2"></i> Safari Cook (for camping safaris)</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-bed text-primary me-2"></i> Tents & Sleeping Mats (camping)</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-medkit text-primary me-2"></i> Emergency Evacuation Insurance</div>
             </div>

        </div>
    </div>
    <!-- Budget Safari Content End -->


    <!-- ======================= BUDGET SAFARI CTA START ========================== -->
    <div class="container-fluid py-6 wow bounceInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center bg-light rounded p-5 border border-primary">
                <small class="d-inline-block fw-bold text-dark text-uppercase bg-white border border-primary rounded-pill px-4 py-1 mb-3">Start Your Affordable Adventure</small>
                <h2 class="display-5 mb-3">Ready to Start Your Budget Safari?</h2>
                <p class="lead mb-4 mx-auto" style="max-width: 600px;">Ready for an amazing, affordable Tanzanian safari? Tell us what you're looking for and we'll send you suitable options and a competitive quote.</p>
                <a href="{{ route('contact') }}" class="btn btn-primary px-5 py-3 rounded-pill fw-bold">Get My Budget Safari Quote <i class="fas fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </div>
    <!-- ======================= BUDGET SAFARI CTA END ========================== -->


@endsection
