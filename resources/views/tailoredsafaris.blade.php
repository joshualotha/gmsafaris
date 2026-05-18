@extends('layouts.app')

@section('title', 'Tailored Tanzania Safaris | Custom & Private Safari Packages')
@section('keywords', 'tailored safaris, custom tanzania safari, personalized safari, private safari tanzania')
@section('description', 'Design your dream Tanzania safari with fully customized itineraries. Private guides, flexible schedules, and personalized experiences. Create your perfect adventure with Golden Memories Safaris.')
@section('canonical', 'https://www.gmsafaris.co.tz/tailoredsafaris')
@section('og_title', 'Tailored Safaris - Golden Memories Safaris')
@section('og_description', "Design your dream Tanzania adventure with Golden Memories Safaris' fully tailored and personalized safari experiences.")
@section('og_url', 'https://www.gmsafaris.co.tz/tailoredsafaris')
@section('og_image', site_image('tailored_safari_hero'))
@section('twitter_title', 'Tailored Safaris - Golden Memories Safaris')
@section('twitter_description', "Design your dream Tanzania adventure with Golden Memories Safaris' fully tailored and personalized safari experiences.")
@section('twitter_image', site_image('tailored_safari_hero'))

@section('extra_styles')
<style>

        .page-header {
            background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url({{ site_image('tailored_safari_hero') }}) center center no-repeat;
            background-size: cover;
        }
        .benefit-item i {
            width: 30px;
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
          "name": "Tailored Safaris",
          "item": "https://www.gmsafaris.co.tz/tailoredsafaris"
        }
      ]
    }
    </script>
@endsection

@section('body_content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">Tailored Safaris</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('safaris') }}">Safaris</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Tailored Safaris</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Tailored Safari Content Start -->
    <div class="container-fluid py-6">
        <div class="container">
            <div class="row g-5 align-items-center">
                <!-- Introduction Text -->
                <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.1s">
                    <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Your Perfect Adventure</small>
                    <h1 class="display-5 mb-4">Design Your Dream Tanzania Safari</h1>
                    <p class="mb-4">Imagine a safari created just for you. At Golden Memories Safaris, our Tailored Safaris are designed around your unique interests, preferences, budget, and schedule. Forget one-size-fits-all packages; this is your adventure, your way.</p>
                    <p class="mb-4">Whether you dream of focusing on wildlife photography, exploring off-the-beaten-path destinations, traveling with young children, celebrating a special occasion, or simply enjoying ultimate privacy, we work closely with you to craft an unforgettable, personalized journey through Tanzania.</p>
                    <a href="#start-planning" class="btn btn-primary py-3 px-5 rounded-pill">Start Planning Now<i class="fas fa-arrow-down ps-2"></i></a>
                </div>
                 <!-- Image -->
                 <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.3s">
                    <img src="{{ site_image('tailored_main') }}" class="img-fluid rounded" alt="Couple planning a tailored safari" loading="lazy">
                </div>
            </div>

            <!-- Benefits Section -->
            <div class="row g-4 mt-5 wow bounceInUp" data-wow-delay="0.1s">
                <div class="col-12 text-center">
                     <h2 class="mb-5">Why Choose a Tailored Safari?</h2>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="benefit-item d-flex align-items-center p-3 bg-light rounded">
                        <i class="fas fa-check-circle fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Complete Flexibility</h5>
                            <p class="mb-0 small">Choose where you go, how long you stay, and what you do.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="benefit-item d-flex align-items-center p-3 bg-light rounded">
                        <i class="fas fa-user-friends fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Personalized Experience</h5>
                            <p class="mb-0 small">Focus on your specific interests, be it birds, culture, or the Big Five.</p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6">
                    <div class="benefit-item d-flex align-items-center p-3 bg-light rounded">
                        <i class="fas fa-stopwatch fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Your Own Pace</h5>
                            <p class="mb-0 small">Spend more time where you love, less where you don't.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="benefit-item d-flex align-items-center p-3 bg-light rounded">
                        <i class="fas fa-home fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Accommodation Choice</h5>
                            <p class="mb-0 small">Select lodges and camps that match your style and budget.</p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6">
                    <div class="benefit-item d-flex align-items-center p-3 bg-light rounded">
                        <i class="fas fa-camera-retro fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Special Interests</h5>
                            <p class="mb-0 small">Ideal for photographers, families, honeymooners, and more.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="benefit-item d-flex align-items-center p-3 bg-light rounded">
                        <i class="fas fa-lock fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Privacy & Exclusivity</h5>
                            <p class="mb-0 small">Enjoy a private vehicle and guide just for your party.</p>
                        </div>
                    </div>
                </div>
            </div>

             <!-- How It Works Section -->
             <div class="row g-5 mt-5 align-items-center">
                <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.1s">
                    <img src="{{ site_image('tailored_process') }}" class="img-fluid rounded" alt="Safari guide discussing plans" loading="lazy">
                </div>
                <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.3s">
                     <h2 class="mb-4">Our Tailoring Process</h2>
                     <ol class="list-unstyled">
                        <li class="mb-3 d-flex">
                            <span class="fa-li"><i class="fas fa-comments text-primary fa-lg"></i></span>
                            <div><strong>1. Consultation:</strong> Share your ideas, interests, travel dates, and budget with our safari experts via email or call.</div>
                        </li>
                        <li class="mb-3 d-flex">
                             <span class="fa-li"><i class="fas fa-map-marked-alt text-primary fa-lg"></i></span>
                            <div><strong>2. Proposal:</strong> We'll craft a detailed, day-by-day itinerary proposal based on your input, including options and pricing.</div>
                        </li>
                        <li class="mb-3 d-flex">
                            <span class="fa-li"><i class="fas fa-edit text-primary fa-lg"></i></span>
                           <div> <strong>3. Refinement:</strong> Review the proposal and provide feedback. We'll refine the itinerary until it's absolutely perfect for you.</div>
                        </li>
                         <li class="mb-3 d-flex">
                            <span class="fa-li"><i class="fas fa-thumbs-up text-primary fa-lg"></i></span>
                            <div><strong>4. Confirmation:</strong> Once you're happy, we'll confirm all arrangements, including accommodations, guides, and transport.</div>
                        </li>
                         <li class="mb-3 d-flex">
                            <span class="fa-li"><i class="fas fa-plane-departure text-primary fa-lg"></i></span>
                            <div><strong>5. Adventure Begins:</strong> Arrive in Tanzania knowing every detail has been handled, ready for your personalized safari experience!</div>
                        </li>
                     </ol>
                </div>
            </div>

             <!-- What Can Be Customized Section (Optional) -->
             <div class="row mt-5 wow bounceInUp" data-wow-delay="0.1s">
                 <div class="col-12">
                     <h2 class="text-center mb-5">Elements We Can Customize For You</h2>
                 </div>
                 <div class="col-md-4 col-sm-6 mb-3"> <i class="fas fa-map-pin text-primary me-2"></i> Destinations & Parks</li></div>
                 <div class="col-md-4 col-sm-6 mb-3"> <i class="fas fa-calendar-alt text-primary me-2"></i> Safari Duration</li></div>
                 <div class="col-md-4 col-sm-6 mb-3"> <i class="fas fa-bed text-primary me-2"></i> Accommodation Style</li></div>
                 <div class="col-md-4 col-sm-6 mb-3"> <i class="fas fa-binoculars text-primary me-2"></i> Activities & Experiences</li></div>
                 <div class="col-md-4 col-sm-6 mb-3"> <i class="fas fa-hiking text-primary me-2"></i> Pace of Travel</li></div>
                 <div class="col-md-4 col-sm-6 mb-3"> <i class="fas fa-user-check text-primary me-2"></i> Guide Specialization</li></div>
                 <div class="col-md-4 col-sm-6 mb-3"> <i class="fas fa-plane text-primary me-2"></i> Internal Flights</li></div>
                 <div class="col-md-4 col-sm-6 mb-3"> <i class="fas fa-utensils text-primary me-2"></i> Dietary Requirements</li></div>
                 <div class="col-md-4 col-sm-6 mb-3"> <i class="fas fa-child text-primary me-2"></i> Family-Friendly Focus</li></div>
             </div>

        </div>
    </div>
    <!-- Tailored Safari Content End -->


    <!-- ======================= TAILORED SAFARI CTA START ========================== -->
    <div class="container-fluid py-6 wow bounceInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center bg-light rounded p-5 border border-primary">
                <small class="d-inline-block fw-bold text-dark text-uppercase bg-white border border-primary rounded-pill px-4 py-1 mb-3">Let's Plan Together</small>
                <h2 class="display-5 mb-3">Ready to Start Your Tailored Safari?</h2>
                <p class="lead mb-4 mx-auto" style="max-width: 600px;">Tell us what you're looking for and our safari specialists will craft the perfect personalized itinerary for you.</p>
                <a href="{{ route('contact') }}" class="btn btn-primary px-5 py-3 rounded-pill fw-bold">Get Your Free Quote <i class="fas fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </div>
    <!-- ======================= TAILORED SAFARI CTA END ========================== -->


@endsection
