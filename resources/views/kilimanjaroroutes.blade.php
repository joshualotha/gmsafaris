@extends('layouts.app')

@section('title', 'Kilimanjaro Routes Compared | Machame, Lemosho, Marangu & More')
@section('keywords', 'kilimanjaro routes comparison, machame route, lemosho route, marangu route, rongai route, northern circuit kilimanjaro, best kilimanjaro route')
@section('description', 'Compare all Kilimanjaro climbing routes — Machame, Lemosho, Marangu, Rongai & Northern Circuit. Find the best route for your trek based on difficulty, scenery & success rates.')
@section('canonical', 'https://www.gmsafaris.co.tz/kilimanjaroroutes')
@section('og_title', 'Kilimanjaro Route Comparison - Choose Your Climb - Golden Memories Safaris')
@section('og_description', 'Compare Kilimanjaro climbing routes: Machame, Lemosho, Marangu, Rongai, Northern Circuit. Understand scenery, difficulty, acclimatization & success rates to choose the best trek with Golden Memories Safaris.')
@section('og_url', 'https://www.gmsafaris.co.tz/kilimanjaroroutes')
@section('og_image', 'https://www.gmsafaris.co.tz/img/logo.png')
@section('twitter_title', 'Kilimanjaro Route Comparison - Choose Your Climb - Golden Memories Safaris')
@section('twitter_description', 'Compare Kilimanjaro climbing routes: Machame, Lemosho, Marangu, Rongai, Northern Circuit. Understand scenery, difficulty, acclimatization & success rates to choose the best trek with Golden Memories Safaris.')
@section('twitter_image', 'https://www.gmsafaris.co.tz/img/logo.png')

@section('extra_styles')
<style>

        .page-header {
            background: linear-gradient(rgba(0, 0, 0, .6), rgba(0, 0, 0, .6)), url(img/kili-route-header.jpg) center center no-repeat; /* Use a relevant route comparison background */
            background-size: cover;
        }
        .route-card {
            background-color: #f8f9fa;
            border: 1px solid #eee;
            border-radius: 0.5rem;
            padding: 2rem;
            margin-bottom: 2rem; /* Space between route cards */
        }
        .route-card h3 {
            color: var(--bs-primary);
            margin-bottom: 1.5rem;
        }
        .route-card .badge {
            font-size: 0.8rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem; /* Space below badges */
        }
        .route-card ul {
            padding-left: 1.2rem; /* Indent lists */
            margin-bottom: 1rem;
        }
        .route-card li {
            margin-bottom: 0.4rem;
        }
        .factor-item i {
            width: 35px; min-width: 35px; text-align: center;
            margin-right: 1rem; flex-shrink: 0;
        }

        /* Ensure form selects/inputs have consistent height */
        .form .form-select, .form .form-control {
            height: calc(1.5em + 1rem + 2px);
        }
        .form textarea.form-control {
             height: auto;
        }
        h2.mb-5 {
            margin-bottom: 3rem !important;
        }
         /* Add consistent bottom margin to section rows */
        .container-fluid.py-6 .row[class*="mt-"],
        .container-fluid.py-6 .row[class*="my-"] {
             margin-bottom: 3rem;
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
          "name": "Kilimanjaro Route Comparison",
          "item": "https://www.gmsafaris.co.tz/kilimanjaroroutes"
        }
      ]
    }
    </script>
@endsection

@section('body_content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">Kilimanjaro Route Comparison</h1> <!-- Title Updated -->
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('destinations') }}">Destinations</a></li>
                     <li class="breadcrumb-item"><a class="text-white" href="{{ url('/mtkilimanjaro') }}">Mount Kilimanjaro</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Route Comparison</li> <!-- Breadcrumb Updated -->
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Route Comparison Content Start -->
    <div class="container-fluid py-6">
        <div class="container">
            <!-- Introduction -->
            <div class="row mb-5">
                <div class="col-12 text-center wow bounceInUp" data-wow-delay="0.1s">
                    <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Find Your Perfect Path</small>
                    <h1 class="display-5 mb-4">Choosing the Right Kilimanjaro Route</h1>
                    <p class="lead mx-auto" style="max-width: 800px;">Selecting the best route for your Kilimanjaro climb is one of the most important decisions you'll make. Each path offers unique scenery, challenges, acclimatization profiles, and levels of traffic. Understanding these differences is key to maximizing your enjoyment and summit success. Explore the main routes below to see which best fits your preferences and abilities.</p>
                </div>
            </div>

            <!-- Route Sections -->
            <div class="row">
                <div class="col-12">

                    <!-- Machame Route -->
                    <div class="route-card wow bounceInUp" data-wow-delay="0.1s">
                        <div class="row align-items-center">
                            <div class="col-md-4 mb-3 mb-md-0">
                                <img src="{{ asset('img/kili-machame.webp') }}" class="img-fluid rounded" alt="Scenic view from the Machame Route" loading="lazy">
                            </div>
                            <div class="col-md-8">
                                <h3>Machame Route ("Whiskey Route")</h3>
                                <div class="mb-3">
                                    <span class="badge bg-primary">Duration: 6-7 Days</span>
                                    <span class="badge bg-info">Scenery: Very High</span>
                                    <span class="badge bg-success">Acclimatization: Good</span>
                                    <span class="badge bg-warning text-dark">Difficulty: High</span>
                                    <span class="badge bg-danger">Traffic: High</span>
                                    <span class="badge bg-secondary">Accommodation: Camping</span>
                                </div>
                                <p>Highly popular for its stunning scenery traversing diverse zones. Offers good acclimatization opportunities ('climb high, sleep low'). It's physically demanding with steeper sections.</p>
                                <h6>Pros:</h6>
                                <ul>
                                    <li>Excellent scenic beauty.</li>
                                    <li>Good acclimatization profile, especially on the 7-day option.</li>
                                    <li>Varied landscapes.</li>
                                </ul>
                                <h6>Cons:</h6>
                                <ul>
                                    <li>Can be very crowded, especially during peak season.</li>
                                    <li>Physically challenging.</li>
                                </ul>
                                <p><strong>Best For:</strong> Adventurous hikers with good fitness looking for great views and willing to camp.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Lemosho Route -->
                     <div class="route-card wow bounceInUp" data-wow-delay="0.2s">
                        <div class="row align-items-center">
                            <div class="col-md-4 mb-3 mb-md-0">
                                <img src="{{ asset('img/kili-lemosho.webp') }}" class="img-fluid rounded" alt="View from the Lemosho Route across the Shira Plateau" loading="lazy">
                            </div>
                            <div class="col-md-8">
                                <h3>Lemosho Route</h3>
                                 <div class="mb-3">
                                    <span class="badge bg-primary">Duration: 7-8 Days</span>
                                    <span class="badge bg-info">Scenery: Excellent</span>
                                    <span class="badge bg-success">Acclimatization: Excellent</span>
                                    <span class="badge bg-warning text-dark">Difficulty: High</span>
                                    <span class="badge bg-secondary">Traffic: Medium-High (joins Machame)</span>
                                    <span class="badge bg-secondary">Accommodation: Camping</span>
                                </div>
                                <p>Considered one of the most beautiful routes, starting in remote western forests before crossing the Shira Plateau and joining the Machame trail. Offers excellent acclimatization due to its length.</p>
                                <h6>Pros:</h6>
                                <ul>
                                    <li>Outstanding scenery and remote start.</li>
                                    <li>Excellent acclimatization profile, leading to high success rates.</li>
                                    <li>Less crowded initial days.</li>
                                </ul>
                                <h6>Cons:</h6>
                                <ul>
                                    <li>Longer and typically more expensive.</li>
                                    <li>Joins the busier Machame route later on.</li>
                                </ul>
                                 <p><strong>Best For:</strong> Those prioritizing acclimatization and scenery, with more time and budget available.</p>
                            </div>
                        </div>
                    </div>

                     <!-- Marangu Route -->
                     <div class="route-card wow bounceInUp" data-wow-delay="0.3s">
                        <div class="row align-items-center">
                            <div class="col-md-4 mb-3 mb-md-0">
                                <img src="{{ asset('img/kili-marangu.webp') }}" class="img-fluid rounded" alt="Sleeping huts along the Marangu Route" loading="lazy">
                            </div>
                            <div class="col-md-8">
                                <h3>Marangu Route ("Coca-Cola Route")</h3>
                                <div class="mb-3">
                                    <span class="badge bg-primary">Duration: 5-6 Days</span>
                                    <span class="badge bg-info">Scenery: Good</span>
                                    <span class="badge bg-danger">Acclimatization: Fair/Poor</span>
                                    <span class="badge bg-success">Difficulty: Moderate</span>
                                    <span class="badge bg-danger">Traffic: Very High</span>
                                    <span class="badge bg-warning text-dark">Accommodation: Huts</span>
                                </div>
                                <p>The oldest and most established route, often perceived as the easiest due to gradual slopes and hut accommodation. However, its shorter duration provides less time for acclimatization, impacting success rates.</p>
                                <h6>Pros:</h6>
                                <ul>
                                    <li>Only route with dormitory-style hut accommodation (no camping).</li>
                                    <li>Often the most budget-friendly option.</li>
                                    <li>Relatively gradual ascent profile (but short).</li>
                                </ul>
                                <h6>Cons:</h6>
                                <ul>
                                    <li>Poorer acclimatization profile, lower summit success rate (especially on 5-day).</li>
                                    <li>Can be extremely crowded.</li>
                                    <li>Ascent and descent paths are the same, less scenic variety.</li>
                                </ul>
                                 <p><strong>Best For:</strong> Climbers who strongly prefer huts over camping and understand the acclimatization challenge. The 6-day option is recommended over the 5-day.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Rongai Route -->
                     <div class="route-card wow bounceInUp" data-wow-delay="0.4s">
                        <div class="row align-items-center">
                            <div class="col-md-4 mb-3 mb-md-0">
                                <img src="{{ asset('img/kili-rongai.webp') }}" class="img-fluid rounded" alt="View from the Rongai Route approaching from the north" loading="lazy">
                            </div>
                            <div class="col-md-8">
                                <h3>Rongai Route</h3>
                                 <div class="mb-3">
                                    <span class="badge bg-primary">Duration: 6-7 Days</span>
                                    <span class="badge bg-info">Scenery: Good (Wilderness Feel)</span>
                                    <span class="badge bg-success">Acclimatization: Good</span>
                                    <span class="badge bg-warning text-dark">Difficulty: Moderate-High</span>
                                    <span class="badge bg-success">Traffic: Low</span>
                                    <span class="badge bg-secondary">Accommodation: Camping</span>
                                </div>
                                <p>The only route approaching Kilimanjaro from the north, near the Kenyan border. It's generally drier and offers a more remote, wilderness feel. Descends via the Marangu route.</p>
                                <h6>Pros:</h6>
                                <ul>
                                    <li>Less crowded than Machame or Marangu.</li>
                                    <li>Good option during rainy seasons due to drier northern aspect.</li>
                                    <li>Offers a true wilderness experience.</li>
                                </ul>
                                <h6>Cons:</h6>
                                <ul>
                                    <li>Potentially less scenic variety compared to Machame/Lemosho.</li>
                                    <li>Descent is via the busy Marangu route.</li>
                                </ul>
                                <p><strong>Best For:</strong> Those seeking fewer crowds, a wilderness feel, or climbing during wetter months.</p>
                            </div>
                        </div>
                    </div>

                     <!-- Northern Circuit Route -->
                     <div class="route-card wow bounceInUp" data-wow-delay="0.5s">
                        <div class="row align-items-center">
                            <div class="col-md-4 mb-3 mb-md-0">
                                <img src="{{ asset('img/kili-northern.webp') }}" class="img-fluid rounded" alt="Panoramic view from the Northern Circuit route" loading="lazy">
                            </div>
                            <div class="col-md-8">
                                <h3>Northern Circuit Route</h3>
                                 <div class="mb-3">
                                    <span class="badge bg-primary">Duration: 9+ Days</span>
                                    <span class="badge bg-info">Scenery: Excellent (360° Views)</span>
                                    <span class="badge bg-success">Acclimatization: Excellent</span>
                                    <span class="badge bg-warning text-dark">Difficulty: High (due to length)</span>
                                    <span class="badge bg-success">Traffic: Very Low</span>
                                    <span class="badge bg-secondary">Accommodation: Camping</span>
                                </div>
                                <p>The newest and longest route, circumnavigating the quieter northern slopes. It offers unparalleled 360-degree views and the best acclimatization profile due to its length, resulting in very high success rates.</p>
                                <h6>Pros:</h6>
                                <ul>
                                    <li>Best acclimatization and highest success rates.</li>
                                    <li>Least crowded route with stunning, comprehensive views.</li>
                                    <li>True wilderness experience.</li>
                                </ul>
                                <h6>Cons:</h6>
                                <ul>
                                    <li>Longest duration requires more time commitment.</li>
                                    <li>Most expensive route due to length.</li>
                                </ul>
                                 <p><strong>Best For:</strong> Climbers prioritizing acclimatization, success, scenery, and solitude, with ample time and budget.</p>
                            </div>
                        </div>
                    </div>

                     <!-- Umbwe Route (Optional - For experts) -->
                     <!-- <div class="route-card wow bounceInUp" data-wow-delay="0.6s"> ... Add details if you promote this difficult route ... </div> -->

                </div>
            </div>


            <!-- Key Factors Summary Section -->
            <div class="row g-4 my-6 wow bounceInUp" data-wow-delay="0.1s"> <!-- Adjusted margin -->
                <div class="col-12 text-center">
                    <h2 class="mb-5">Key Factors to Consider</h2>
                    <p class="lead mx-auto" style="max-width: 800px;">Ultimately, the best route depends on your personal priorities:</p>
                </div>
                 <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-start factor-item">
                        <i class="fas fa-tachometer-alt fa-2x text-primary mt-1"></i>
                        <div>
                            <h5>Acclimatization & Success Rate</h5>
                            <p class="small">Longer routes (Lemosho, Northern Circuit, 7/8-day Machame) generally offer better acclimatization and higher summit success probabilities.</p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-start factor-item">
                        <i class="fas fa-image fa-2x text-primary mt-1"></i>
                        <div>
                            <h5>Scenery</h5>
                            <p class="small">Lemosho, Machame, and Northern Circuit are often considered the most scenically diverse and rewarding.</p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-start factor-item">
                        <i class="fas fa-shoe-prints fa-2x text-primary mt-1"></i>
                        <div>
                            <h5>Difficulty</h5>
                            <p class="small">All routes are challenging due to altitude. Machame and Lemosho involve steeper sections. Marangu is physically easier but harder for acclimatization.</p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-start factor-item">
                        <i class="fas fa-calendar-alt fa-2x text-primary mt-1"></i>
                        <div>
                            <h5>Duration & Budget</h5>
                            <p class="small">Longer routes cost more but increase success chances. Marangu (5-day) is often the cheapest but has lower success rates.</p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-start factor-item">
                        <i class="fas fa-users fa-2x text-primary mt-1"></i>
                        <div>
                            <h5>Traffic / Crowds</h5>
                            <p class="small">Marangu and Machame are the busiest. Rongai and Northern Circuit offer more solitude.</p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-start factor-item">
                        <i class="fas fa-home fa-2x text-primary mt-1"></i>
                        <div>
                            <h5>Accommodation</h5>
                            <p class="small">Choose Marangu if you strongly prefer huts; all other standard routes involve camping.</p>
                        </div>
                    </div>
                </div>
            </div>

             <!-- Need Help Choosing Section -->
            <div class="row my-6 wow bounceInUp" data-wow-delay="0.1s">
                 <div class="col-12 text-center">
                     <h2 class="mb-4">Need Help Choosing Your Route?</h2>
                     <p class="lead mx-auto" style="max-width: 800px;">Our Kilimanjaro experts are here to help! Based on your experience, fitness, budget, and preferences, we can recommend the perfect route for your climb.</p>
                     <a href="#inquire-routes" class="btn btn-primary py-3 px-5 rounded-pill">Get Personalized Advice</a>
                 </div>
            </div>


        </div>
    </div>
    <!-- Route Comparison Content End -->


    <!-- ======================= KILIMANJARO ROUTE INQUIRY FORM START ========================== -->
    <div class="container-fluid contact py-6 wow bounceInUp" data-wow-delay="0.1s" id="inquire-routes"> <!-- Updated ID -->
        <div class="container">
            <div class="row g-0">
                <div class="col-1 d-none d-lg-block">
                    <img src="{{ asset('img/kilimanjaro-trekking-group.webp') }}" class="img-fluid h-100 w-100 rounded-start" style="object-fit: cover; opacity: 0.7;" alt="Group trekking on Kilimanjaro" loading="lazy">
                </div>
                <div class="col-lg-10 col-md-12">
                    <div class="border-bottom border-top border-primary bg-light py-5 px-4 h-100">
                        <div class="text-center">
                            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Let Us Help You Decide</small>
                            <h1 class="display-5 mb-4">Discuss Your Kilimanjaro Route Options</h1>
                             <p class="mb-4 mx-auto" style="max-width: 600px;">Fill in your details and preferences, and our team will provide personalized recommendations and answer your questions about climbing Kilimanjaro.</p>
                        </div>
                        <!-- Form Action: Replace '#' with your form processing script URL -->
                        <form id="kiliRoutesForm" action="{{ route('inquiry.store') }}" method="POST">
                             @csrf
                             <div class="row g-3 form">

                                <!-- Contact Info -->
                                <div class="col-md-6">
                                    <label for="yourNameRoute" class="form-label small ms-1">Your Name*</label> <!-- Added suffix to ID -->
                                    <input type="text" class="form-control border-primary p-2" id="yourNameRoute" name="name" placeholder="Full Name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="yourEmailRoute" class="form-label small ms-1">Your Email*</label> <!-- Added suffix to ID -->
                                    <input type="email" class="form-control border-primary p-2" id="yourEmailRoute" name="email" placeholder="email@example.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="yourPhoneRoute" class="form-label small ms-1">Phone Number</label> <!-- Added suffix to ID -->
                                    <input type="tel" class="form-control border-primary p-2" id="yourPhoneRoute" name="phone" placeholder="(Include country code)">
                                </div>
                                <div class="col-md-6">
                                     <label for="yourCountryRoute" class="form-label small ms-1">Country of Residence</label> <!-- Added suffix to ID -->
                                    <input type="text" class="form-control border-primary p-2" id="yourCountryRoute" name="country" placeholder="Your Country">
                                </div>

                                <hr class="my-4">

                                <div class="col-12">
                                    <label for="kiliSubject" class="form-label small ms-1">Subject</label>
                                    <input type="text" class="form-control border-primary p-2" id="kiliSubject" name="subject" value="Kilimanjaro Route Inquiry" placeholder="Subject">
                                </div>

                                <!-- Detailed Request -->
                                 <div class="col-12 mt-3">
                                     <label for="detailsRoute" class="form-label small ms-1">Priorities & Questions*</label> <!-- Added suffix to ID -->
                                    <textarea class="form-control border-primary p-2" id="detailsRoute" name="message" rows="6" placeholder="What's most important to you (scenery, success rate, fewer crowds, budget)? What's your fitness level? Any specific concerns or questions about choosing a route or preparing for the climb?" required></textarea>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill">Get Route Advice & Info</button> <!-- Button Text Updated -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-1 d-none d-lg-block">
                     <img src="{{ asset('img/kilimanjaro-trekking-group.webp') }}" class="img-fluid h-100 w-100 rounded-end" style="object-fit: cover; opacity: 0.7;" alt="Group trekking on Kilimanjaro" loading="lazy">
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= KILIMANJARO ROUTE INQUIRY FORM END ========================== -->


    <!-- Page-specific form handler -->
    <script>
$(function(){
  $('#kiliRoutesForm').on('submit', function(e){
    e.preventDefault();
    var form = $(this);
    $.ajax({
      url: '{{ route('inquiry.store') }}',
      type: 'POST',
      data: form.serialize(),
      dataType: 'json',
      success: function(resp){
        if(resp.success){
          alert(resp.message);
          form[0].reset();
        } else {
          alert('Error: ' + resp.message);
        }
      },
      error: function(xhr){
        alert('There was a problem sending your message.\n' + xhr.responseText);
      }
    });
  });
});
    </script>

@endsection
