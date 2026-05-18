@extends('layouts.app')

@section('title', 'Tanzania Local Customs & Etiquette | Cultural Travel Guide')
@section('keywords', 'tanzania customs, tanzania etiquette, travel etiquette africa, respectful travel tanzania, swahili greetings, tanzania dress code, cultural tips tanzania')
@section('description', 'Learn Tanzania\'s local customs and etiquette before you travel. Guide to Swahili greetings, dress code, photography rules, dining etiquette & respectful travel. From Golden Memories Safaris.')
@section('canonical', 'https://www.gmsafaris.co.tz/localcustoms')
@section('og_title', 'Local Customs & Etiquette in Tanzania - Travel Guide - Golden Memories Safaris')
@section('og_description', 'Understand local customs and etiquette for respectful travel in Tanzania. Guide covering greetings, dress code, photography, dining, and more from Golden Memories Safaris.')
@section('og_url', 'https://www.gmsafaris.co.tz/localcustoms')
@section('og_image', site_image('customs_hero'))
@section('twitter_title', 'Local Customs & Etiquette in Tanzania - Travel Guide - Golden Memories Safaris')
@section('twitter_description', 'Understand local customs and etiquette for respectful travel in Tanzania. Guide covering greetings, dress code, photography, dining, and more from Golden Memories Safaris.')
@section('twitter_image', site_image('customs_hero'))

@section('extra_styles')
<style>

        .page-header {
            background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url({{ site_image('customs_hero') }}) center center no-repeat;
            background-size: cover;
        }
        .list-check li, .list-bullet li {
            padding-left: 1.8em; /* Increased padding for longer icons */
            position: relative;
            margin-bottom: 0.75rem;
        }
        .list-check li::before {
            content: "\f00c"; /* Font Awesome check mark */
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            position: absolute;
            left: 0;
            top: 0.1em; /* Adjust alignment */
            color: var(--bs-success); /* Green check */
             width: 1.2em; /* Ensure space for icon */
             text-align: center;
        }
         .list-bullet li::before {
            content: "\f111"; /* Font Awesome solid circle */
            font-family: "Font Awesome 5 Free";
            font-weight: 900; /* Use 900 for solid icons */
            font-size: 0.5em; /* Smaller bullet */
            position: absolute;
            left: 0.25em;
            top: 0.5em; /* Adjust vertical alignment */
            color: var(--bs-primary);
        }
         .customs-section img {
            max-width: 100%;
            height: auto;
            border-radius: 0.375rem;
            margin-bottom: 1rem;
        }
         .customs-section h4 {
            margin-top: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
            color: var(--bs-primary);
            display: flex;
            align-items: center;
        }
         .customs-section h4 i {
             margin-right: 0.75rem;
             width: 25px; /* Consistent icon width */
             text-align: center;
         }
        .alert-info { /* Style for the summary note */
            border-left: 5px solid var(--bs-info);
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
          "name": "Local Customs & Etiquette in Tanzania",
          "item": "https://www.gmsafaris.co.tz/localcustoms"
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
            <h1 class="display-4 text-white animated slideInDown mb-4">Local Customs & Etiquette in Tanzania</h1> <!-- Title Updated -->
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Local Customs</li> <!-- Breadcrumb Updated -->
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Customs Content Start -->
    <div class="container-fluid py-6">
        <div class="container">

             <!-- Introduction -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10 text-center wow bounceInUp" data-wow-delay="0.1s">
                    <h2 class="mb-4">Traveling Respectfully in Tanzania</h2>
                    <p class="lead mb-4">Tanzanians are known for being incredibly welcoming, friendly, and polite. Understanding and respecting local customs and etiquette will not only prevent unintentional offense but will also greatly enrich your travel experience, leading to more positive and meaningful interactions.</p>
                    <p>While locals understand that visitors come from different backgrounds, making an effort to observe local norms shows respect and is always appreciated. This guide covers some key aspects of Tanzanian customs and etiquette.</p>
                    <div class="alert alert-info" role="alert">
                       <i class="fas fa-info-circle me-2"></i> Customs can vary between ethnic groups and regions (e.g., coastal/Zanzibar vs. mainland). When in doubt, observe others or politely ask your Golden Memories Safaris guide.
                    </div>
                </div>
            </div>

            <!-- Main Customs Section -->
            <div class="row g-5 customs-section">
                 <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.1s">
                    <img src="{{ site_image('customs_main') }}" class="img-fluid rounded" alt="People greeting each other warmly in Tanzania" loading="lazy"> <!-- CHANGE IMAGE -->
                    <h4><i class="fas fa-handshake"></i>Greetings</h4>
                    <ul>
                        <li>Greetings are very important and expected. Always greet people before starting a conversation or asking for help.</li>
                        <li>A simple "Jambo" (Hello - more touristy) or "Habari?" (How are you?) is appreciated. Common replies to "Habari?" include "Nzuri" (Good/Fine).</li>
                        <li>Learn basic Swahili greetings like "Shikamoo" (a respectful greeting for elders) and the reply "Marahaba". Your guide can teach you.</li>
                        <li>Handshakes are common, but wait for the other person to initiate, especially women. Use your right hand.</li>
                        <li>Take time for greetings; rushing is considered impolite.</li>
                    </ul>

                     <h4><i class="fas fa-camera"></i>Photography</h4>
                    <ul>
                        <li>Always ask permission before taking someone's photograph, especially close-ups. Respect their decision if they decline.</li>
                        <li>Be particularly sensitive when photographing children or in villages.</li>
                        <li>Avoid photographing sensitive locations like military installations or border crossings.</li>
                    </ul>

                    <h4><i class="fas fa-hand-paper"></i>Hand Usage</h4>
                    <ul>
                        <li>The right hand is traditionally used for eating, shaking hands, giving, and receiving items.</li>
                        <li>The left hand is often considered unclean. While tourists are given leeway, try to use your right hand for interactions as much as possible.</li>
                    </ul>

                </div>

                 <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.3s">
                    <img src="{{ site_image('customs_culture') }}" class="img-fluid rounded" alt="Tourists dressed modestly while visiting a town or village" loading="lazy"> <!-- CHANGE IMAGE -->
                    <h4><i class="fas fa-user-tie"></i>Dress Code</h4>
                     <ul>
                        <li>Tanzania is generally conservative, especially outside major cities, tourist lodges, and particularly in coastal areas and Zanzibar (which has a large Muslim population).</li>
                        <li>In towns, villages, and Stone Town: Both men and women should dress modestly. Aim to cover shoulders and knees. Avoid very short shorts/skirts, tank tops, or revealing clothing. Loose-fitting trousers or long skirts/dresses and shirts with sleeves are appropriate.</li>
                        <li>On Safari: Casual and comfortable clothing is standard. Shorts (knee-length) are generally acceptable.</li>
                        <li>Beaches/Resorts: Swimwear is fine at the beach or pool, but cover up when walking elsewhere in the hotel or town. Topless sunbathing is unacceptable.</li>
                    </ul>

                     <h4><i class="fas fa-heart"></i>Public Displays of Affection</h4>
                    <ul>
                        <li>Overt public displays of affection (kissing, hugging) between couples are generally frowned upon and should be avoided. Holding hands is usually acceptable.</li>
                    </ul>

                      <h4><i class="fas fa-gift"></i>Gift Giving & Donations</h4>
                    <ul>
                        <li>Avoid giving money or sweets directly to children, as it encourages begging.</li>
                        <li>If you wish to help, consider donating to reputable local projects, schools, or community organizations. Your guide or Golden Memories Safaris can offer suggestions.</li>
                         <li>Small, thoughtful gifts given discreetly to someone who has offered significant help might be appropriate, but are not generally expected.</li>
                    </ul>

                      <h4><i class="fas fa-shopping-cart"></i>Bargaining</h4>
                    <ul>
                        <li>Bargaining is common in markets and with souvenir vendors. Do so politely and with a smile.</li>
                        <li>In established shops or supermarkets, prices are usually fixed.</li>
                    </ul>

                 </div>
            </div>

            <!-- General Attitude & Final Thoughts -->
            <div class="row justify-content-center my-6 wow bounceInUp" data-wow-delay="0.1s"> <!-- Adjusted margin -->
                <div class="col-lg-10">
                    <h3 class="mb-4 text-center"><i class="fas fa-smile-beam text-primary me-2"></i>General Attitude & Key Takeaways</h3>
                    <div class="row g-4">
                        <div class="col-md-6">
                             <div class="bg-light p-3 rounded border h-100">
                                <h5><i class="fas fa-clock text-secondary me-2"></i>Patience ("Pole Pole")</h5>
                                <p class="small">Things often move at a slower pace. Embrace "pole pole" (slowly, slowly), relax, and be patient.</p>
                             </div>
                        </div>
                         <div class="col-md-6">
                             <div class="bg-light p-3 rounded border h-100">
                                <h5><i class="fas fa-question-circle text-secondary me-2"></i>Ask if Unsure</h5>
                                <p class="small">If you're unsure about appropriate behavior in a situation, politely ask your guide or observe local interactions.</p>
                             </div>
                        </div>
                         <div class="col-md-6">
                             <div class="bg-light p-3 rounded border h-100">
                                <h5><i class="fas fa-smile text-secondary me-2"></i>Smile and Be Friendly</h5>
                                <p class="small">A genuine smile goes a long way and is a universal language of goodwill.</p>
                             </div>
                        </div>
                         <div class="col-md-6">
                             <div class="bg-light p-3 rounded border h-100">
                                <h5><i class="fas fa-hand-holding-heart text-secondary me-2"></i>Show Respect</h5>
                                <p class="small">Treat everyone with respect, regardless of their position. Respect elders and local traditions.</p>
                             </div>
                        </div>
                    </div>
                     <p class="text-center mt-5">By being mindful of these customs, you'll foster positive interactions, gain a deeper understanding of Tanzanian culture, and make your journey even more rewarding. Enjoy your time connecting with the wonderful people of Tanzania!</p>
                     <div class="text-center mt-4">
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary rounded-pill px-5 py-3">Ask Us More About Culture</a>
                     </div>
                </div>
            </div>


        </div>
    </div>
    <!-- Customs Content End -->


     <!-- Footer Start -->
<div class="container-fluid footer py-6 my-6 mb-0 bg-light wow bounceInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row">

                      <!-- Column 1: Logo, Contact Info, Social Icons -->
                      <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('{{ site_image('logo') }}') }}"
                                     alt="Golden Memories Safaris Logo"
                                     class="footer-logo mb-4"
                                     width="180" height="40">
                              </a>
@endsection
