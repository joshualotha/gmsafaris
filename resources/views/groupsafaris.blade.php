@extends('layouts.app')

@section('title', 'Group Safaris Tanzania | Join Scheduled Safari Departures')
@section('keywords', 'group safari tanzania, shared safari tanzania, scheduled safari departures, budget safari tanzania, join group safari, affordable safari')
@section('description', 'Join scheduled group safaris in Tanzania and explore Serengeti & Ngorongoro with fellow travelers. Affordable shared departures with expert guides. Book with Golden Memories Safaris.')
@section('canonical', 'https://www.gmsafaris.co.tz/groupsafaris')
@section('og_title', 'Group Safaris in Tanzania - Scheduled Departures - Golden Memories Safaris')
@section('og_description', 'Join our scheduled group safaris in Tanzania for an affordable and social adventure! Explore top parks like Serengeti & Ngorongoro with fellow travelers. Check departures with Golden Memories Safaris.')
@section('og_url', 'https://www.gmsafaris.co.tz/groupsafaris')
@section('og_image', 'https://www.gmsafaris.co.tz/img/logo.png')
@section('twitter_title', 'Group Safaris in Tanzania - Scheduled Departures - Golden Memories Safaris')
@section('twitter_description', 'Join our scheduled group safaris in Tanzania for an affordable and social adventure! Explore top parks like Serengeti & Ngorongoro with fellow travelers. Check departures with Golden Memories Safaris.')
@section('twitter_image', 'https://www.gmsafaris.co.tz/img/logo.png')

@section('extra_styles')
<style>

        .page-header {
            background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url(img/group-safari-header.jpg) center center no-repeat; /* Use a relevant group safari background */
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
          "name": "Group Safaris in Tanzania",
          "item": "https://www.gmsafaris.co.tz/groupsafaris"
        }
      ]
    }
    </script>
@endsection

@section('body_content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">Tanzania Group Safaris</h1> <!-- Title Updated -->
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('safaris') }}">Safaris</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Group Safaris</li> <!-- Breadcrumb Updated -->
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Group Safari Content Start -->
    <div class="container-fluid py-6">
        <div class="container">
            <div class="row g-5 align-items-center">
                <!-- Introduction Text -->
                <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.1s">
                    <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Share the Adventure</small> <!-- Subtitle Updated -->
                    <h1 class="display-5 mb-4">Join a Group Safari: Explore Together!</h1> <!-- Heading Updated -->
                    <p class="mb-4">Discover the wonders of Tanzania on our scheduled group safaris – a fantastic option for solo travelers, couples, or friends looking for an affordable and social way to experience the magic of Africa. Share incredible wildlife sightings and create lasting memories with like-minded adventurers from around the globe.</p>
                    <p class="mb-4">Our group tours follow carefully planned itineraries hitting Tanzania's highlights, typically utilizing comfortable mid-range lodges or campsites. You'll share a safari vehicle and the expertise of our professional guides, making it a cost-effective way to enjoy a comprehensive safari experience.</p>
                    <a href="#inquire-group" class="btn btn-primary py-3 px-5 rounded-pill">View Departures & Inquire<i class="fas fa-arrow-down ps-2"></i></a> <!-- Button Link Updated -->
                </div>
                 <!-- Image -->
                 <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.3s">
                    <img src="{{ asset('img/group-safari-main.JPG') }}" class="img-fluid rounded" alt="Group of travelers enjoying a safari game drive" loading="lazy"> <!-- CHANGE IMAGE & ALT -->
                </div>
            </div>

            <!-- Benefits of Group Safaris Section -->
            <div class="row g-4 mt-5 wow bounceInUp" data-wow-delay="0.1s">
                <div class="col-12 text-center">
                     <h2 class="mb-5">Advantages of Joining a Group Safari</h2> <!-- Heading Updated -->
                </div>
                <!-- Features adapted for Group Safaris -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-dollar-sign fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Cost-Effective Travel</h5>
                            <p class="mb-0 small">Share vehicle, guide, and accommodation costs, making it more affordable.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-users fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Meet Fellow Travelers</h5>
                            <p class="mb-0 small">Enjoy a social atmosphere and share experiences with new friends.</p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6">
                    <div class="feature-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-calendar-check fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Scheduled Departures</h5>
                            <p class="mb-0 small">Easy to plan around fixed dates, often guaranteed to run.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-route fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Optimized Itineraries</h5>
                            <p class="mb-0 small">Visit key parks and highlights on well-planned, popular routes.</p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6">
                    <div class="feature-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-user-tie fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Professional Guide</h5>
                            <p class="mb-0 small">Benefit from the knowledge and experience of our licensed guides.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-thumbs-up fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Ideal for Solo Travelers</h5>
                            <p class="mb-0 small">A comfortable and secure way to explore Tanzania if traveling alone.</p>
                        </div>
                    </div>
                </div>
            </div>

             <!-- What to Expect Section -->
             <div class="row g-5 mt-5 align-items-center">
                <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.1s">
                    <img src="{{ asset('img/group-safari-vehicle.JPG') }}" class="img-fluid rounded" alt="Open-top safari vehicle with group inside" loading="lazy"> <!-- CHANGE IMAGE & ALT -->
                </div>
                <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.3s">
                     <h2 class="mb-4">What to Expect on a Group Safari</h2> <!-- Heading Updated -->
                     <p>Our group safaris are designed for comfort, adventure, and social interaction:</p>
                     <ul class="list-unstyled">
                        <li class="mb-3 d-flex align-items-start">
                            <i class="fas fa-users text-primary me-3 mt-1"></i>
                            <div><strong>Small Group Size:</strong> Typically limited to 6-7 participants per vehicle to ensure window seats and comfortable viewing.</div>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                             <i class="fas fa-map-signs text-primary me-3 mt-1"></i>
                            <div><strong>Set Itinerary:</strong> Follow a pre-defined route covering major northern circuit parks like Serengeti, Ngorongoro, Tarangire, and Lake Manyara.</div>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <i class="fas fa-car-side text-primary me-3 mt-1"></i>
                           <div> <strong>Shared Vehicle:</strong> Travel together in a comfortable 4x4 Land Cruiser with a pop-up roof, driven by your guide.</div>
                        </li>
                         <li class="mb-3 d-flex align-items-start">
                            <i class="fas fa-bed text-primary me-3 mt-1"></i>
                            <div><strong>Accommodation Style:</strong> Usually involves mid-range lodges or comfortable tented camps known for good value and location (some budget camping options may exist).</div>
                        </li>
                         <li class="mb-3 d-flex align-items-start">
                            <i class="fas fa-info-circle text-primary me-3 mt-1"></i>
                            <div><strong>Flexibility Note:</strong> While the itinerary is fixed, your guide adapts daily drives based on wildlife movements and group interests.</div>
                        </li>
                     </ul>
                     <p><em>Check specific tour details for exact itineraries, inclusions, and accommodation levels.</em></p>
                </div>
            </div>

             <!-- Group Safari Inclusions Section -->
             <div class="row mt-5 wow bounceInUp" data-wow-delay="0.1s">
                 <div class="col-12">
                     <h2 class="text-center mb-5">Typical Group Safari Inclusions</h2> <!-- Heading Updated -->
                 </div>
                 <!-- List adapted for group safaris -->
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-car text-primary me-2"></i> Shared 4x4 Safari Vehicle Transport</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-user-tie text-primary me-2"></i> Professional English-Speaking Guide</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-bed text-primary me-2"></i> Accommodation as per Itinerary</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-utensils text-primary me-2"></i> All Meals on Safari (B, L, D)</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-id-card text-primary me-2"></i> All Park Entrance & Conservation Fees</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-tint text-primary me-2"></i> Bottled Mineral Water during Game Drives</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-binoculars text-primary me-2"></i> Game Drives as per Itinerary</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-handshake text-primary me-2"></i> Airport Transfers (often included)</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-medkit text-primary me-2"></i> Emergency Evacuation Insurance (Flying Doctors)</div>
             </div>

        </div>
    </div>
    <!-- Group Safari Content End -->


    <!-- ======================= DETAILED GROUP INQUIRY FORM START ========================== -->
    <div class="container-fluid contact py-6 wow bounceInUp" data-wow-delay="0.1s" id="inquire-group"> <!-- Updated ID -->
        <div class="container">
            <div class="row g-0">
                <div class="col-1 d-none d-lg-block">
                    <img src="{{ asset('img/home-booking.webp') }}" class="img-fluid h-100 w-100 rounded-start" style="object-fit: cover; opacity: 0.7;" alt="Planning Group Safari" loading="lazy">
                </div>
                <div class="col-lg-10 col-md-12">
                    <div class="border-bottom border-top border-primary bg-light py-5 px-4 h-100">
                        <div class="text-center">
                            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Join the Adventure</small> <!-- Updated Subtitle -->
                            <h1 class="display-5 mb-4">Inquire About Joining a Group Safari</h1> <!-- Updated Heading -->
                             <p class="mb-4 mx-auto" style="max-width: 600px;">Interested in joining one of our scheduled group departures? Let us know your preferred dates and details, and we'll provide availability and booking information.</p> <!-- Updated Text -->
                        </div>
                        <!-- Form Action: Replace '#' with your form processing script URL -->
                        <form action="{{ route('inquiry.store') }}" method="POST">
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

                                <div class="col-12">
                                    <label for="groupSubject" class="form-label small ms-1">Subject</label>
                                    <input type="text" class="form-control border-primary p-2" id="groupSubject" name="subject" value="Group Safari Inquiry" placeholder="Subject">
                                </div>

                                <!-- Detailed Request -->
                                 <div class="col-12 mt-3">
                                     <label for="groupDetails" class="form-label small ms-1">Questions or Specific Requests</label>
                                    <textarea class="form-control border-primary p-2" id="groupDetails" name="message" rows="5" placeholder="Do you have specific departure dates in mind? Any questions about group safaris, itineraries, or special requirements (e.g., dietary)?"></textarea>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill">Inquire About Group Safaris</button> <!-- Button Text Updated -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-1 d-none d-lg-block">
                    <img src="{{ asset('img/home-booking.webp') }}" class="img-fluid h-100 w-100 rounded-end" style="object-fit: cover; opacity: 0.7;" alt="Planning Group Safari" loading="lazy">
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= DETAILED GROUP INQUIRY FORM END ========================== -->

@endsection
