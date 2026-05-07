@extends('layouts.app')

@section('title', 'Mountain Trekking Tanzania | Kilimanjaro & Meru Climbing Tours')
@section('keywords', 'kilimanjaro climb, mount kilimanjaro trek, mount meru trek, tanzania mountain trekking, climb kilimanjaro routes, golden memories safaris')
@section('description', 'Conquer Mount Kilimanjaro or Mount Meru with Golden Memories Safaris. Expert guides, ethical treks, and high success rates. Book your Tanzania trekking adventure today.')
@section('canonical', 'https://www.gmsafaris.co.tz/mountaintrekking')
@section('og_title', 'Mountain Trekking in Tanzania (Kilimanjaro & Meru) - Golden Memories Safaris')
@section('og_description', 'Conquer Mount Kilimanjaro or Mount Meru with Golden Memories Safaris. Expert guides, safety focus, ethical treks. Discover routes and plan your Tanzania trekking adventure.')
@section('og_url', 'https://www.gmsafaris.co.tz/mountaintrekking')
@section('og_image', 'https://www.gmsafaris.co.tz/img/logo.png')
@section('twitter_title', 'Mountain Trekking in Tanzania (Kilimanjaro & Meru) - Golden Memories Safaris')
@section('twitter_description', 'Conquer Mount Kilimanjaro or Mount Meru with Golden Memories Safaris. Expert guides, safety focus, ethical treks. Discover routes and plan your Tanzania trekking adventure.')
@section('twitter_image', 'https://www.gmsafaris.co.tz/img/logo.png')

@section('extra_styles')
<style>

        .page-header {
            background: linear-gradient(rgba(0, 0, 0, .6), rgba(0, 0, 0, .6)), url(img/kilimanjaro-header.jpg) center center no-repeat; /* Use a relevant trekking background */
            background-size: cover;
        }
        .feature-item i { /* Renamed from benefit-item for clarity */
            width: 35px;
            text-align: center;
        }
        .route-item strong {
            display: block;
            margin-bottom: 0.25rem;
        }
        .route-item .badge {
            font-size: 0.75rem;
            margin-right: 5px;
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
          "name": "Mountain Trekking in Tanzania (Kilimanjaro & Meru)",
          "item": "https://www.gmsafaris.co.tz/mountaintrekking"
        }
      ]
    }
    </script>
@endsection

@section('body_content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">Mountain Trekking Adventures</h1> <!-- Title Updated -->
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('safaris') }}">Safaris</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Mountain Trekking</li> <!-- Breadcrumb Updated -->
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Mountain Trekking Content Start -->
    <div class="container-fluid py-6">
        <div class="container">
            <div class="row g-5 align-items-center">
                <!-- Introduction Text -->
                <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.1s">
                    <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Reach New Heights</small> <!-- Subtitle Updated -->
                    <h1 class="display-5 mb-4">Climb Kilimanjaro & Mount Meru</h1> <!-- Heading Updated -->
                    <p class="mb-4">Stand on the roof of Africa! Golden Memories Safaris offers expertly guided treks up Mount Kilimanjaro, the world's highest free-standing mountain, and its stunning neighbour, Mount Meru. Experience the unique challenge, breathtaking landscapes, and immense satisfaction of summiting these iconic Tanzanian peaks.</p>
                    <p class="mb-4">Our focus is on your safety, success, and enjoyment. We provide experienced, certified guides, quality equipment, thorough acclimatization planning, and ethical porter support to ensure a responsible and memorable climb from base to summit.</p>
                    <a href="#inquire-trek" class="btn btn-primary py-3 px-5 rounded-pill">Start Planning Your Climb<i class="fas fa-arrow-down ps-2"></i></a> <!-- Button Link Updated -->
                </div>
                 <!-- Image -->
                 <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.3s">
                    <img src="{{ asset('img/trekking-main.webp') }}" class="img-fluid rounded" alt="Hikers approaching Kilimanjaro summit" loading="lazy">
                </div>
            </div>

            <!-- Why Trek With Us Section -->
            <div class="row g-4 mt-5 wow bounceInUp" data-wow-delay="0.1s">
                <div class="col-12 text-center">
                     <h2 class="mb-5">Why Choose Golden Memories for Your Trek?</h2> <!-- Heading Updated -->
                </div>
                <!-- Features adapted for Trekking -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-shield-alt fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Safety First Priority</h5>
                            <p class="mb-0 small">Strict safety protocols, emergency oxygen, and guides trained in mountain first aid.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-user-check fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Experienced Mountain Guides</h5>
                            <p class="mb-0 small">Licensed, knowledgeable guides with high summit success rates and local expertise.</p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6">
                    <div class="feature-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-heartbeat fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Proper Acclimatization</h5>
                            <p class="mb-0 small">Itineraries designed to maximize acclimatization ("climb high, sleep low").</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-campground fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Quality Equipment</h5>
                            <p class="mb-0 small">Reliable tents, sleeping mats, and dining gear provided for your comfort.</p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6">
                    <div class="feature-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-users fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Ethical Porter Treatment</h5>
                            <p class="mb-0 small">Fair wages, proper load limits, and good conditions for our crucial support team.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item d-flex align-items-center p-3 bg-light rounded h-100">
                        <i class="fas fa-chart-line fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">High Success Rates</h5>
                            <p class="mb-0 small">Our planning and support contribute to excellent summit success possibilities.</p>
                        </div>
                    </div>
                </div>
            </div>

             <!-- Popular Routes Section -->
             <div class="row g-5 mt-5 align-items-center">
                 <div class="col-12 text-center wow bounceInUp" data-wow-delay="0.1s">
                     <h2 class="mb-5">Popular Kilimanjaro Routes</h2>
                 </div>
                <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.1s">
                    <img src="{{ asset('img/trekking-routes.webp') }}" class="img-fluid rounded" alt="Map or scenic view of Kilimanjaro routes" loading="lazy">
                     <p class="mt-3 fst-italic small">We also offer guided treks on Mount Meru (typically 4 days), an excellent acclimatization climb or a challenging adventure in its own right.</p>
                </div>
                <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.3s">
                     <!-- Route Descriptions -->
                     <div class="route-item mb-4">
                         <strong>Machame Route (7-8 Days)</strong>
                         <p class="small mb-1">Highly scenic with varied landscapes. Good acclimatization profile. Physically demanding camping route.</p>
                         <span class="badge bg-success">High Success</span> <span class="badge bg-info">Scenic</span> <span class="badge bg-warning text-dark">Camping</span>
                     </div>
                     <div class="route-item mb-4">
                         <strong>Lemosho Route (8-9 Days)</strong>
                          <p class="small mb-1">Excellent acclimatization and stunning scenery, especially early on. Longer and generally more expensive camping route.</p>
                         <span class="badge bg-success">Highest Success</span> <span class="badge bg-info">Very Scenic</span> <span class="badge bg-warning text-dark">Camping</span>
                     </div>
                     <div class="route-item mb-4">
                         <strong>Marangu Route (5-6 Days)</strong>
                         <p class="small mb-1">The only route with hut accommodation. Shorter, potentially less acclimatization time. Can be crowded.</p>
                         <span class="badge bg-primary">Huts</span> <span class="badge bg-secondary">Faster</span> <span class="badge bg-danger">Lower Success</span>
                     </div>
                      <div class="route-item mb-4">
                         <strong>Rongai Route (7 Days)</strong>
                         <p class="small mb-1">Approaches from the drier north side. Generally less crowded and good during rainy seasons. Camping route.</p>
                         <span class="badge bg-success">Good Success</span> <span class="badge bg-info">Wilderness Feel</span> <span class="badge bg-warning text-dark">Camping</span>
                     </div>
                      <div class="route-item">
                         <strong>Other Routes</strong>
                         <p class="small mb-1">We can also arrange treks via the Northern Circuit, Umbwe, or Shira routes upon request for experienced trekkers.</p>
                     </div>
                </div>
            </div>

             <!-- Trek Inclusions Section -->
             <div class="row mt-5 wow bounceInUp" data-wow-delay="0.1s">
                 <div class="col-12">
                     <h2 class="text-center mb-5">Typical Trek Inclusions</h2> <!-- Heading Updated -->
                 </div>
                 <!-- List adapted for trekking -->
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-id-card text-primary me-2"></i> Park Entry & Camping/Hut Fees</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-user-tie text-primary me-2"></i> Licensed Mountain Guide(s)</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-users text-primary me-2"></i> Professional Porters & Cook</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-campground text-primary me-2"></i> Quality Tents & Sleeping Mats</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-utensils text-primary me-2"></i> All Meals on the Mountain</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-tint text-primary me-2"></i> Purified Drinking Water</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-first-aid text-primary me-2"></i> Emergency Oxygen & First Aid Kit</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-car text-primary me-2"></i> Transfers to/from Park Gate</div>
                 <div class="col-md-4 col-sm-6 mb-3"><i class="fas fa-info-circle text-primary me-2"></i> Pre-Trek Briefing</div>
             </div>

        </div>
    </div>
    <!-- Mountain Trekking Content End -->


    <!-- ======================= DETAILED TREKKING INQUIRY FORM START ========================== -->
    <div class="container-fluid contact py-6 wow bounceInUp" data-wow-delay="0.1s" id="inquire-trek"> <!-- Updated ID -->
        <div class="container">
            <div class="row g-0">
                <div class="col-1 d-none d-lg-block">
                    <img src="{{ asset('img/home-booking.webp') }}" class="img-fluid h-100 w-100 rounded-start" style="object-fit: cover; opacity: 0.7;" alt="Planning Trek" loading="lazy">
                </div>
                <div class="col-lg-10 col-md-12">
                    <div class="border-bottom border-top border-primary bg-light py-5 px-4 h-100">
                        <div class="text-center">
                            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Plan Your Ascent</small> <!-- Updated Subtitle -->
                            <h1 class="display-5 mb-4">Inquire About Your Mountain Trek</h1> <!-- Updated Heading -->
                             <p class="mb-4 mx-auto" style="max-width: 600px;">Share your trekking plans and preferences, and our mountain specialists will help you prepare for an incredible adventure.</p> <!-- Updated Text -->
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
                                    <label for="trekSubject" class="form-label small ms-1">Subject</label>
                                    <input type="text" class="form-control border-primary p-2" id="trekSubject" name="subject" value="Mountain Trekking Inquiry" placeholder="Subject">
                                </div>

                                <!-- Trip Details -->
                                <div class="col-lg-4 col-md-6">
                                     <label for="trekInterest" class="form-label small ms-1">Mountain/Route Preference*</label>
                                    <select class="form-select border-primary p-2" id="trekInterest" name="trek_interest" aria-label="Select Trek Interest" required>
                                        <option value="" selected disabled>Select Trek...</option>
                                        <option value="Kilimanjaro - Machame">Kilimanjaro - Machame Route</option>
                                        <option value="Kilimanjaro - Lemosho">Kilimanjaro - Lemosho Route</option>
                                        <option value="Kilimanjaro - Marangu">Kilimanjaro - Marangu Route</option>
                                        <option value="Kilimanjaro - Rongai">Kilimanjaro - Rongai Route</option>
                                        <option value="Kilimanjaro - Other">Kilimanjaro - Other Route</option>
                                        <option value="Kilimanjaro - Unsure">Kilimanjaro - Unsure/Recommendation</option>
                                        <option value="Mount Meru">Mount Meru</option>
                                    </select>
                                </div>
                                
                                 <div class="col-lg-4 col-md-6">
                                    <label for="duration" class="form-label small ms-1">Approximate Trek Duration*</label>
                                    <select class="form-select border-primary p-2" id="duration" name="duration" aria-label="Select Duration" required>
                                        <option value="" selected disabled>Select Days...</option>
                                        <option value="4 Days (Meru)">4 Days (Meru)</option>
                                        <option value="5-6 Days (Kili)">5-6 Days (Kili)</option>
                                        <option value="7 Days (Kili)">7 Days (Kili)</option>
                                        <option value="8 Days (Kili)">8 Days (Kili)</option>
                                        <option value="9+ Days (Kili)">9+ Days (Kili)</option>
                                        <option value="Flexible">Flexible</option>
                                    </select>
                                </div>
                                  
                                <div class="col-lg-4 col-md-6">
                                    <label for="accommodation" class="form-label small ms-1">Pre/Post Trek Accommodation</label>
                                    <select class="form-select border-primary p-2" id="accommodation" name="accommodation_level" aria-label="Accommodation Level">
                                        <option value="" selected disabled>Select Preference...</option>
                                        <option value="Budget">Budget</option>
                                        <option value="Mid-Range">Mid-Range</option>
                                        <option value="Luxury">Luxury</option>
                                        <option value="Will Arrange Own">Will Arrange Own</option>
                                        <option value="Discuss Options">Discuss Options</option>
                                    </select>
                                </div>
                                

                                <!-- Detailed Request -->
                                 <div class="col-12 mt-3">
                                     <label for="trekDetails" class="form-label small ms-1">Trekking Experience & Requirements*</label>
                                    <textarea class="form-control border-primary p-2" id="trekDetails" name="trek_details" rows="6" placeholder="Please describe your previous trekking experience (if any), general fitness level, preferred route if 'Other', any specific dates, equipment rental needs, dietary requirements, or other questions." required></textarea>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill">Request Trekking Information</button> <!-- Button Text Updated -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-1 d-none d-lg-block">
                    <img src="{{ asset('img/home-booking.webp') }}" class="img-fluid h-100 w-100 rounded-end" style="object-fit: cover; opacity: 0.7;" alt="Planning Trek" loading="lazy">
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= DETAILED TREKKING INQUIRY FORM END ========================== -->


@endsection
