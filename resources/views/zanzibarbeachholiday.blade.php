@extends('layouts.app')

@section('title', 'Zanzibar Beach Holidays & Tours - Golden Memories Safaris')
@section('keywords', 'zanzibar holiday, zanzibar beach vacation, stone town tour, spice island, tanzania beach holiday, nungwi beach, kendwa beach, mnemba atoll')
@section('description', 'Relax on pristine beaches, explore historic Stone Town, and discover the Spice Island. Plan your perfect Zanzibar beach holiday or safari add-on with Golden Memories Safaris.')
@section('canonical', 'https://www.gmsafaris.co.tz/zanzibarbeachholiday')
@section('og_title', 'Zanzibar Beach Holidays & Tours - Golden Memories Safaris')
@section('og_description', 'Relax on pristine beaches, explore historic Stone Town, and discover the Spice Island. Plan your perfect Zanzibar beach holiday or safari add-on with Golden Memories Safaris.')
@section('og_url', 'https://www.gmsafaris.co.tz/zanzibarbeachholiday')
@section('og_image', 'https://www.gmsafaris.co.tz/img/logo.png')
@section('twitter_title', 'Zanzibar Beach Holidays & Tours - Golden Memories Safaris')
@section('twitter_description', 'Relax on pristine beaches, explore historic Stone Town, and discover the Spice Island. Plan your perfect Zanzibar beach holiday or safari add-on with Golden Memories Safaris.')
@section('twitter_image', 'https://www.gmsafaris.co.tz/img/logo.png')

@section('extra_styles')
<style>

        .page-header {
            background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url(img/zanzibar-header.jpg) center center no-repeat; /* Use a relevant Zanzibar background */
            background-size: cover;
        }
        .feature-item i {
            width: 35px;
            text-align: center;
        }
        .activity-item i {
            width: 25px;
            text-align: center;
            flex-shrink: 0; /* Prevent icon shrinking */
        }
         /* Ensure form selects/inputs have consistent height */
        .form .form-select, .form .form-control {
            height: calc(1.5em + 1rem + 2px); /* Adjust based on your padding/font */
        }
        .form textarea.form-control {
             height: auto; /* Allow textarea to define its height */
        }

        .overlap-img {
    position: absolute;
    width: 50%; /* Adjust size as needed */
    bottom: -20px; /* Moves image slightly below the base */
    right: -20px; /* Moves image slightly to the right */
    border-radius: 8px; /* Rounded corners */
    border: 4px solid white; /* Optional: Adds a white border */
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); /* Subtle shadow for depth */
    z-index: 2; /* Ensures it stays on top */
}

/* Optional: Hover effect for a slight scale-up */
.overlap-img:hover {
    transform: scale(1.05);
    transition: transform 0.3s ease;
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
          "name": "Zanzibar Beach Holidays & Tours",
          "item": "https://www.gmsafaris.co.tz/zanzibarbeachholiday"
        }
      ]
    }
    </script>
@endsection

@section('body_content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">Zanzibar Beach Holidays</h1> <!-- Title Updated -->
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('destinations') }}">Destinations</a></li> <!-- Or Safaris -->
                    <li class="breadcrumb-item text-primary active" aria-current="page">Zanzibar</li> <!-- Breadcrumb Updated -->
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Zanzibar Content Start -->
    <div class="container-fluid py-6">
        <div class="container">
            <div class="row g-5 align-items-center">
                <!-- Introduction Text -->
                <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.1s">
                    <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">The Spice Island Beckons</small> <!-- Subtitle Updated -->
                    <h1 class="display-5 mb-4">Unwind on Zanzibar's Paradise Shores</h1> <!-- Heading Updated -->
                    <p class="mb-4">Escape to the exotic island of Zanzibar, a jewel in the Indian Ocean renowned for its pristine white-sand beaches, turquoise waters, rich history, and aromatic spice farms. Whether as a perfect post-safari relaxation spot or a standalone tropical getaway, Zanzibar offers a captivating blend of culture, adventure, and pure bliss.</p>
                    <p class="mb-4">Golden Memories Safaris crafts seamless Zanzibar holidays, arranging everything from boutique hotel stays in historic Stone Town to luxurious beachfront resorts. Explore ancient alleyways, dive into vibrant coral reefs, savor local flavors, or simply relax under the swaying palms.</p>
                    <a href="#inquire-zanzibar" class="btn btn-primary py-3 px-5 rounded-pill">Plan Your Island Escape<i class="fas fa-arrow-down ps-2"></i></a> <!-- Button Link Updated -->
                </div>
                 <!-- Image -->
                 <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.3s">
                    <img src="{{ asset('img/zanzibar-main.jpg') }}" class="img-fluid rounded" alt="Stunning beach scene in Zanzibar" loading="lazy"> <!-- CHANGE IMAGE & ALT -->
                </div>
            </div>

            <!-- Why Choose Zanzibar Section -->
            <div class="row g-4 mt-5 wow bounceInUp" data-wow-delay="0.1s">
                <div class="col-12 text-center">
                     <h2 class="mb-5">Why Choose Zanzibar for Your Holiday?</h2> <!-- Heading Updated -->
                </div>
                <!-- Features adapted for Zanzibar -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-umbrella-beach fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Idyllic Beaches</h5>
                            <p class="mb-0 small">Powder-soft white sands meet calm, warm turquoise waters (Nungwi, Kendwa, Paje).</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-landmark fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Historic Stone Town</h5>
                            <p class="mb-0 small">Explore the UNESCO World Heritage site with its unique blend of cultures.</p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6">
                    <div class="feature-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-pepper-hot fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Spice Farms</h5>
                            <p class="mb-0 small">Discover why Zanzibar is the "Spice Island" with aromatic farm tours.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-water fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Water Activities</h5>
                            <p class="mb-0 small">World-class snorkeling, diving (Mnemba Atoll), kite surfing, and dhow cruises.</p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6">
                    <div class="feature-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-leaf fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Unique Wildlife</h5>
                            <p class="mb-0 small">Visit Jozani Forest to see the endemic Red Colobus monkeys.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-cocktail fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Relaxation & Rejuvenation</h5>
                            <p class="mb-0 small">The perfect place to unwind, enjoy stunning sunsets, and recharge.</p>
                        </div>
                    </div>
                </div>
            </div>

             <!-- Things to Do Section -->
             <div class="row g-5 mt-5 align-items-center">
                 <div class="col-12 text-center wow bounceInUp" data-wow-delay="0.1s">
                     <h2 class="mb-5">Top Experiences in Zanzibar</h2>
                 </div>
                 <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.1s" style="position: relative;">
                    <!-- Base Image (Background) -->
                    <img src="{{ asset('img/927136034.webp') }}" class="img-fluid rounded" alt="Narrow street in Stone Town, Zanzibar" style="width: 100%;" loading="lazy">
                    
                    <!-- Overlapping Image (Bottom Right) -->
                    <img src="{{ asset('img/Scubadiving-in-Zanzibar3.webp') }}" class="overlap-img" alt="Snorkeling or diving in Zanzibar" loading="lazy">
                </div>
                <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.3s">
                     <!-- Activities List -->
                     <ul class="list-unstyled">
                        <li class="mb-3 d-flex align-items-start activity-item">
                            <i class="fas fa-city text-primary me-3 mt-1"></i>
                            <div><strong>Explore Stone Town:</strong> Get lost in the labyrinthine streets, visit the Old Fort, House of Wonders, and the former Slave Market.</div>
                        </li>
                        <li class="mb-3 d-flex align-items-start activity-item">
                             <i class="fas fa-seedling text-primary me-3 mt-1"></i>
                            <div><strong>Take a Spice Tour:</strong> Engage your senses, tasting and smelling cloves, nutmeg, cinnamon, vanilla, and exotic fruits.</div>
                        </li>
                        <li class="mb-3 d-flex align-items-start activity-item">
                            <i class="fas fa-umbrella-beach text-primary me-3 mt-1"></i>
                           <div> <strong>Relax on Northern Beaches:</strong> Enjoy the vibrant atmosphere and stunning sands of Nungwi and Kendwa.</div>
                        </li>
                         <li class="mb-3 d-flex align-items-start activity-item">
                            <i class="fas fa-fish text-primary me-3 mt-1"></i>
                            <div><strong>Snorkel or Dive Mnemba Atoll:</strong> Discover incredible coral reefs and abundant marine life in this protected marine reserve.</div>
                        </li>
                         <li class="mb-3 d-flex align-items-start activity-item">
                            <i class="fas fa-kiwi-bird text-primary me-3 mt-1"></i> <!-- Using kiwi-bird for monkey -->
                            <div><strong>Visit Jozani Forest:</strong> Walk through the mangrove boardwalk and spot the rare Red Colobus monkeys.</div>
                        </li>
                          <li class="mb-3 d-flex align-items-start activity-item">
                            <i class="fas fa-ship text-primary me-3 mt-1"></i>
                            <div><strong>Sunset Dhow Cruise:</strong> Sail gracefully along the coast in a traditional wooden boat as the sun dips below the horizon.</div>
                        </li>
                         <li class="mb-3 d-flex align-items-start activity-item">
                            <i class="fas fa-utensils text-primary me-3 mt-1"></i>
                            <div><strong>Indulge in Local Cuisine:</strong> Sample fresh seafood, Swahili dishes, and tropical fruits at local restaurants or the Forodhani Gardens night market.</div>
                        </li>
                     </ul>
                </div>
            </div>

             <!-- Accommodation Styles Section (Simplified) -->
             <div class="row mt-5 wow bounceInUp" data-wow-delay="0.1s">
                 <div class="col-12">
                     <h2 class="text-center mb-5">Accommodation Styles</h2>
                     <p class="text-center mx-auto" style="max-width: 800px;">Zanzibar offers a diverse range of places to stay, perfectly matching your style and budget. We partner with the best properties, including:</p>
                 </div>
                 <div class="col-md-3 col-sm-6 mb-3 text-center"><i class="fas fa-hotel d-block text-primary fs-1 mb-2"></i> Boutique Hotels (Stone Town)</div>
                 <div class="col-md-3 col-sm-6 mb-3 text-center"><i class="fas fa-home d-block text-primary fs-1 mb-2"></i> Beach Bungalows & Guesthouses</div>
                 <div class="col-md-3 col-sm-6 mb-3 text-center"><i class="fas fa-building d-block text-primary fs-1 mb-2"></i> Mid-Range Beach Resorts</div>
                 <div class="col-md-3 col-sm-6 mb-3 text-center"><i class="fas fa-gem d-block text-primary fs-1 mb-2"></i> Luxury & All-Inclusive Resorts</div>
             </div>

        </div>
    </div>
    <!-- Zanzibar Content End -->


    <!-- ======================= DETAILED ZANZIBAR INQUIRY FORM START ========================== -->
    <div class="container-fluid contact py-6 wow bounceInUp" data-wow-delay="0.1s" id="inquire-zanzibar"> <!-- Updated ID -->
        <div class="container">
            <div class="row g-0">
                <div class="col-1 d-none d-lg-block">
                    <img src="{{ asset('img/home-booking.jpg') }}" class="img-fluid h-100 w-100 rounded-start" style="object-fit: cover; opacity: 0.7;" alt="Planning Zanzibar Holiday" loading="lazy">
                </div>
                <div class="col-lg-10 col-md-12">
                    <div class="border-bottom border-top border-primary bg-light py-5 px-4 h-100">
                        <div class="text-center">
                            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Plan Your Paradise Trip</small> <!-- Updated Subtitle -->
                            <h1 class="display-5 mb-4">Inquire About Your Zanzibar Holiday</h1> <!-- Updated Heading -->
                             <p class="mb-4 mx-auto" style="max-width: 600px;">Dreaming of Zanzibar? Share your preferences, and our island experts will tailor the perfect beach escape or safari combination for you.</p> <!-- Updated Text -->
                        </div>
                        <!-- Form Action: Replace '#' with your form processing script URL -->
                        <form id="zanzibarBeachForm" action="{{ route('inquiry.store') }}" method="POST">
                            @csrf
                            <div class="row g-3 form">

                                <!-- Contact Info -->
                                <div class="col-md-6">
                                    <label for="yourName" class="form-label small ms-1">Your Name*</label>
                                    <input type="text" class="form-control border-primary p-2" id="yourName" name="name" placeholder="Full Name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="yourEmail" class="form-label small ms-1">Your Email*</label>
                                    <input type="email" class="form-control border-primary p-2" id="yourEmail" name="email" placeholder="email@example.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="yourPhone" class="form-label small ms-1">Phone Number</label>
                                    <input type="tel" class="form-control border-primary p-2" id="yourPhone" name="phone" placeholder="(Include country code)">
                                </div>
                                <div class="col-md-6">
                                     <label for="yourCountry" class="form-label small ms-1">Country of Residence</label>
                                    <input type="text" class="form-control border-primary p-2" id="yourCountry" name="country" placeholder="Your Country">
                                </div>

                                <hr class="my-4">

                                <input type="hidden" name="subject" value="Zanzibar Beach Holiday Inquiry">

                                <!-- Detailed Request -->
                                 <div class="col-12 mt-3">
                                     <label for="zanzibarDetails" class="form-label small ms-1">Your Zanzibar Ideas & Requirements*</label>
                                    <textarea class="form-control border-primary p-2" id="zanzibarDetails" name="message" rows="6" placeholder="Tell us about your ideal Zanzibar holiday: Are you combining with a safari? Which beaches interest you (North, East, South)? Specific activities (diving, spice tour, history)? Any special occasions or needs?" required></textarea>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill">Request Zanzibar Quote</button> <!-- Button Text Updated -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-1 d-none d-lg-block">
                    <img src="{{ asset('img/home-booking.jpg') }}" class="img-fluid h-100 w-100 rounded-end" style="object-fit: cover; opacity: 0.7;" alt="Planning Zanzibar Holiday" loading="lazy">
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= DETAILED ZANZIBAR INQUIRY FORM END ========================== -->

@endsection

@section('extra_scripts')
<script>
</script>
@endsection
