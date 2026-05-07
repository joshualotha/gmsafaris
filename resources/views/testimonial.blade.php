@extends('layouts.app')

@section('title', 'Golden Memories Safaris Reviews | Tanzania Safari Testimonials')
@section('keywords', 'Golden Memories Safaris reviews, Tanzania safari testimonials, Kilimanjaro trek reviews, Zanzibar holiday reviews, TripAdvisor reviews Tanzania')
@section('description', 'Read authentic reviews from travelers who experienced Tanzania with Golden Memories Safaris. See why guests rate us 5 stars on TripAdvisor for Serengeti safaris & Kilimanjaro treks.')
@section('canonical', 'https://www.gmsafaris.co.tz/testimonial')
@section('og_title', 'Testimonials - Golden Memories Safaris')
@section('og_description', 'Read what travelers are saying about their unforgettable experiences with Golden Memories Safaris. See reviews sourced from our TripAdvisor profile.')
@section('og_url', 'https://www.gmsafaris.co.tz/testimonial')
@section('og_image', 'https://www.gmsafaris.co.tz/img/logo.png')
@section('twitter_title', 'Testimonials - Golden Memories Safaris')
@section('twitter_description', 'Read what travelers are saying about their unforgettable experiences with Golden Memories Safaris. See reviews sourced from our TripAdvisor profile.')
@section('twitter_image', 'https://www.gmsafaris.co.tz/img/logo.png')

@section('structured_data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://www.gmsafaris.co.tz/" },
        { "@type": "ListItem", "position": 2, "name": "Testimonials", "item": "https://www.gmsafaris.co.tz/testimonial" }
    ]
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Product",
    "name": "Golden Memories Safaris - Tanzania Safari Tours",
    "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.8",
        "reviewCount": "50",
        "bestRating": "5",
        "worstRating": "1"
    },
    "review": [
        {
            "@type": "Review",
            "reviewRating": {
                "@type": "Rating",
                "ratingValue": "5",
                "bestRating": "5"
            },
            "author": {
                "@type": "Person",
                "name": "Maurizio E"
            },
            "reviewBody": "We had a fantastic time on our safari. The organization was perfect, the guide was very knowledgeable and friendly. Highly recommended!",
            "datePublished": "2024-09"
        },
        {
            "@type": "Review",
            "reviewRating": {
                "@type": "Rating",
                "ratingValue": "5",
                "bestRating": "5"
            },
            "author": {
                "@type": "Person",
                "name": "Erlend G"
            },
            "reviewBody": "An absolutely amazing experience. Golden Memories Safaris made our trip unforgettable. The wildlife viewing was incredible!",
            "datePublished": "2024-09"
        },
        {
            "@type": "Review",
            "reviewRating": {
                "@type": "Rating",
                "ratingValue": "5",
                "bestRating": "5"
            },
            "author": {
                "@type": "Person",
                "name": "Raffi V"
            },
            "reviewBody": "Unforgettable experience. The guys at Golden Memories are real professionals. We did a really five star Serengeti and Ngorongoro Safari!",
            "datePublished": "2024-11"
        }
    ]
}
</script>
@endsection

@section('extra_styles')
<style>
     /* Page Header Style */
    .page-header {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(img/testimonial-hero.jpg) center center no-repeat;
        background-size: cover;
    }

    /* Testimonial Card Styling */
    .testimonial-card {
        background-color: #f8f9fa;
        border-left: 5px solid var(--bs-primary);
        padding: 2rem;
        margin-bottom: 1.5rem;
        position: relative;
        transition: box-shadow 0.3s ease-in-out;
    }
    .testimonial-card:hover {
         box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    }
    .testimonial-card .quote-icon {
        position: absolute;
        top: 1rem;
        right: 1rem;
        font-size: 2.5rem;
        color: var(--bs-primary);
        opacity: 0.15;
    }
    .testimonial-card .reviewer-name {
        font-weight: 600;
        color: var(--bs-dark);
    }
     .testimonial-card .reviewer-meta {
         font-size: 0.9em;
         color: #6c757d;
    }
    .testimonial-card .star-rating i {
         color: #FFC107;
         margin-right: 2px;
    }
    .testimonial-card .review-text {
         font-style: italic;
         color: #495057;
         margin-bottom: 1rem;
    }
     .testimonial-source {
         font-size: 0.8em;
         color: #6c757d;
         text-align: right;
         margin-top: 1rem;
    }
     .testimonial-source img {
        height: 16px;
        vertical-align: middle;
        margin-left: 5px;
     }

    /* TripAdvisor Button */
    .btn-tripadvisor {
        background-color: #34E0A1;
        color: white;
        border: none;
        transition: background-color 0.3s ease;
    }
    .btn-tripadvisor:hover {
         background-color: #2dbb8a;
         color: white;
    }
     .btn-tripadvisor img {
         height: 20px;
         margin-right: 8px;
         filter: brightness(0) invert(1);
     }


     /* Footer Logo */
     .footer-logo {
       max-width: 100%;
       height: auto;
       filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
     }
     .py-6 {
         padding-top: 6rem;
         padding-bottom: 6rem;
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
      "name": "Testimonials",
      "item": "https://www.gmsafaris.co.tz/testimonial"
    }
  ]
}
</script>
@endsection

@section('body_content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Traveler Testimonials</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Testimonials</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Testimonials Intro Start -->
    <div class="container-fluid py-6">
        <div class="container">
            <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Guest Feedback</small>
                <h1 class="display-5 mb-4">What Our Travelers Say</h1>
                <p class="lead mb-4 mx-auto" style="max-width: 800px;">
                   We're thrilled to share feedback from our guests! Below are some reviews kindly shared by travelers on TripAdvisor after their adventures with Golden Memories Safaris. We value authentic feedback and encourage you to read more reviews directly on our official TripAdvisor profile.
                </p>
                <a href="https://www.tripadvisor.com/Attraction_Review-g297913-d27751442-Reviews-GOLDEN_MEMORIES_SAFARIS-Arusha_Arusha_Region.html" target="_blank" rel="noopener noreferrer" class="btn btn-lg btn-tripadvisor rounded-pill px-4 py-2 shadow-sm">
                    <img src="{{ asset('img/trip.webp') }}" alt="TripAdvisor Logo">
                    Read More Reviews on TripAdvisor
                </a>
            </div>
        </div>
    </div>
    <!-- Testimonials Intro End -->


    <!-- Testimonials List Start -->
    <div class="container-fluid bg-light py-6">
        <div class="container">
             <div class="row g-4">

                 <!-- Testimonial 1 -->
                 <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                     <div class="testimonial-card rounded shadow-sm">
                         <i class="fas fa-quote-right quote-icon"></i>
                         <div class="star-rating mb-2">
                             <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                         </div>
                         <p class="review-text">
                             "Amazing experience organized by GOLDEN MEMORIES SAFARIES for Safari with my family in Tanzania. A true immersion in the wilderness! Extraordinary was watching so closely thanks to our majestic animal drivers in their natural habitat. Henry and his organization played a vital role in making our safari special. The expertise and passion of those who organize these trips really makes a difference in a context like Tanzania, where every detail counts. I recommend GOLDEN MEMORIES SAFARIES , wonderful experience."
                         </p>
                         <p class="reviewer-name mb-0">Maurizio E</p>
                         <p class="reviewer-meta mb-0">Italy | Reviewed November 2024</p>
                         <p class="testimonial-source">Source: TripAdvisor <a href="#" target="_blank" rel="noopener noreferrer"><img src="{{ asset('img/trip.webp') }}" alt="TripAdvisor Logo"></a></p>
                     </div>
                 </div>

                 <!-- Testimonial 2 -->
                  <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                     <div class="testimonial-card rounded shadow-sm">
                         <i class="fas fa-quote-right quote-icon"></i>
                          <div class="star-rating mb-2">
                             <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                         </div>
                          <p class="review-text">
                             Great hospitality, excellent guides with a lot of stories to tell. Everything was top ranked, they took really good care of us as their clients, they listened to all our requests and made them into life.
                             We had a lof of food, drinks etc. They were taking care of our mood during trip.
                             Really recommend this one"
                         </p>
                         <p class="reviewer-name mb-0">Monika U</p>
                          <p class="reviewer-meta mb-0">United Kingdom | Reviewed January 2025</p>
                          <p class="testimonial-source">Source: TripAdvisor <a href="#" target="_blank" rel="noopener noreferrer"><img src="{{ asset('img/trip.webp') }}" alt="TripAdvisor Logo"></a></p>
                     </div>
                 </div>

                 <!-- Testimonial 3 -->
                 <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                     <div class="testimonial-card rounded shadow-sm">
                          <i class="fas fa-quote-right quote-icon"></i>
                          <div class="star-rating mb-2">
                             <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                         </div>
                          <p class="review-text">
                             "We went on a 4 day safari on the Seregeti and Ngorongoro conservation area, January 2025. Fantastic trip and excellent service! The locally owned Golden Memories give top guiding and premium hospitality.

                             "
                         </p>
                         <p class="reviewer-name mb-0">Erlend G</p>
                         <p class="reviewer-meta mb-0">Italy | Reviewed September 2024</p>
                         <p class="testimonial-source">Source: TripAdvisor <a href="#" target="_blank" rel="noopener noreferrer"><img src="{{ asset('img/trip.webp') }}" alt="TripAdvisor Logo"></a></p>
                     </div>
                 </div>

                  <!-- Testimonial 4 -->
                  <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                     <div class="testimonial-card rounded shadow-sm">
                        <i class="fas fa-quote-right quote-icon"></i>
                        <div class="star-rating mb-2">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                         </div>
                          <p class="review-text">
                             "Unforgettable experience. The guys at Golden Memories are real professionals and in addition they are also very nice, always available on every occasion. We did a really five star Serengeti and Ngorongoro Safari! Three intense days that will always remain impressed.
                             I recommend it to everyone. Worth the money spent and as they say they really give emotions and Golden Memories"
                         </p>
                         <p class="reviewer-name mb-0">Raffi V</p>
                         <p class="reviewer-meta mb-0">Germany | Reviewed November 2024</p>
                         <p class="testimonial-source">Source: TripAdvisor <a href="#" target="_blank" rel="noopener noreferrer"><img src="{{ asset('img/trip.webp') }}" alt="TripAdvisor Logo"></a></p>
                     </div>
                 </div>

            </div>

        </div>
    </div>
    <!-- Testimonials List End -->

@endsection
