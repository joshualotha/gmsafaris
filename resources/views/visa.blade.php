@extends('layouts.app')

@section('title', 'Tanzania Visa Guide | eVisa Requirements & Application Process')
@section('keywords', 'tanzania visa, tanzania evisa, tanzania visa requirements, apply tanzania visa online, tourist visa tanzania, tanzania visa cost, tanzania immigration')
@section('description', 'Complete guide to Tanzania visa requirements and the online eVisa application process. Learn costs, processing times, and required documents for your safari trip. From Golden Memories Safaris.')
@section('canonical', 'https://www.gmsafaris.co.tz/visa')
@section('og_title', 'Tanzania Visa Information - Requirements & Application Guide - Golden Memories Safaris')
@section('og_description', 'Detailed guide on Tanzania visa requirements and the online eVisa application process for tourists visiting Tanzania. Information provided by Golden Memories Safaris.')
@section('og_url', 'https://www.gmsafaris.co.tz/visa')
@section('og_image', site_image('visa_hero'))
@section('twitter_title', 'Tanzania Visa Information - Requirements & Application Guide - Golden Memories Safaris')
@section('twitter_description', 'Detailed guide on Tanzania visa requirements and the online eVisa application process for tourists visiting Tanzania. Information provided by Golden Memories Safaris.')
@section('twitter_image', site_image('visa_hero'))

@section('extra_styles')
<style>

        .page-header {
            background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url({{ site_image('visa_hero') }}) center center no-repeat;
            background-size: cover;
        }
        .list-check li {
            padding-left: 1.5em;
            position: relative;
            margin-bottom: 0.75rem;
        }
        .list-check li::before {
            content: "\f00c"; /* Font Awesome check mark */
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            position: absolute;
            left: 0;
            color: var(--bs-primary);
        }
        .alert-warning { /* Style for the disclaimer */
            border-left: 5px solid var(--bs-warning);
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
          "name": "Tanzania Visa Information",
          "item": "https://www.gmsafaris.co.tz/visa"
        }
      ]
    }
    </script>
@endsection

@section('body_content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">Tanzania Visa Information</h1> <!-- Title Updated -->
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Visa Information</li> <!-- Breadcrumb Updated -->
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Visa Information Content Start -->
    <div class="container-fluid py-6">
        <div class="container">

            <!-- Introduction & Disclaimer -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10 text-center wow bounceInUp" data-wow-delay="0.1s">
                    <h2 class="mb-4">Understanding Tanzania Visa Requirements</h2>
                    <p class="lead mb-4">Planning your dream Tanzanian adventure involves understanding and securing the necessary entry visa. This page provides general guidance to help you navigate the process. However, visa regulations can change, so it's crucial to verify all information with official sources.</p>
                    <div class="alert alert-warning" role="alert">
                        <h4 class="alert-heading"><i class="fas fa-exclamation-triangle me-2"></i>Important Disclaimer!</h4>
                        <p>The information provided here is for informational purposes only and based on general knowledge at the time of writing. It is not official immigration advice. Visa requirements, fees, and application procedures are subject to change without notice.</p>
                        <hr>
                        <p class="mb-0"><strong>You are solely responsible for ensuring you meet all entry requirements. Always consult the official Tanzania Immigration Services Department website for the most current and accurate information before applying or traveling.</strong></p>
                        <a href="https://immigration.go.tz/" target="_blank" rel="noopener noreferrer" class="btn btn-warning btn-sm mt-3">Visit Official Immigration Site <i class="fas fa-external-link-alt ms-1"></i></a> <!-- ** REPLACE LINK ** -->
                    </div>
                </div>
            </div>

            <!-- Who Needs a Visa? -->
            <div class="row g-5 align-items-center my-6 wow bounceInUp" data-wow-delay="0.1s"> <!-- Adjusted margin -->
                 <div class="col-lg-6">
                     <h3 class="mb-4">Who Needs a Tanzanian Visa?</h3>
                     <p>Most foreign nationals require a visa to enter the United Republic of Tanzania (including Zanzibar). </p>
                     <p>However, citizens of certain countries (mostly neighboring African nations and some Caribbean/Asian countries) may be exempt from visa requirements for specific durations. </p>
                     <p><strong>It is essential to check the latest visa exemption list on the official Tanzania Immigration website to confirm if your nationality requires a visa. Do not rely solely on third-party lists.</strong></p>
                     <a href="https://www.immigration.go.tz/index.php/countries-which-are-not-required-to-apply-for-visa" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary rounded-pill">Check Official Exemptions List <i class="fas fa-external-link-alt ms-1"></i></a> <!-- ** REPLACE LINK ** -->
                 </div>
                 <div class="col-lg-6">
                    <img src="{{ site_image('visa_requirements') }}" class="img-fluid rounded" alt="Passport with Tanzanian entry stamp" loading="lazy"> <!-- CHANGE IMAGE -->
                 </div>
            </div>

            <!-- Types of Visas (Focus on Tourist) -->
             <div class="row my-6 wow bounceInUp" data-wow-delay="0.1s"> <!-- Adjusted margin -->
                <div class="col-12 text-center">
                     <h2 class="mb-5">Types of Visas</h2>
                     <p class="lead mx-auto" style="max-width: 800px;">Tanzania offers various visa types. For tourism purposes, the most common is the:</p>
                </div>
                 <div class="col-lg-8 offset-lg-2">
                     <div class="feature-item">
                        <i class="fas fa-passport fa-2x text-primary"></i>
                        <div>
                            <h5 class="mb-1">Ordinary Visa (Single Entry Tourist Visa)</h5>
                            <p class="mb-0 small">Allows entry for tourism, visiting friends/family, leisure, and holidays. Typically valid for 90 days from the date of issue, allowing a stay of up to 90 days (duration granted by immigration officer upon arrival). US citizens often receive a multiple-entry visa valid for 12 months, allowing stays of up to 90 days per entry, for a higher fee.</p>
                        </div>
                    </div>
                    <p class="text-center mt-4 small">Other visa types include Multiple Entry Visas (often for specific purposes/nationalities), Business Visas, Transit Visas, Student Visas, etc. Ensure you apply for the correct type based on your purpose of visit.</p>
                 </div>
            </div>

            <!-- How to Apply (eVisa Focus) -->
            <div class="row g-5 my-6 align-items-center wow bounceInUp" data-wow-delay="0.1s"> <!-- Adjusted margin -->
                 <div class="col-lg-6 order-lg-2"> <!-- Text on right -->
                     <h3 class="mb-4">How to Apply: The eVisa System</h3>
                     <p>The recommended and most common method for obtaining a tourist visa is through the official Tanzanian **Online eVisa System**. Applying in advance online is strongly encouraged to avoid potential delays or issues upon arrival.</p>
                     <h6>Steps for eVisa Application:</h6>
                     <ol>
                         <li>Visit the <strong>official</strong> Tanzania Immigration eVisa portal: <a href="https://immigration.go.tz/" target="_blank" rel="noopener noreferrer">[Official Tanzania Immigration eVisa Website Link]</a> <!-- ** REPLACE LINK ** --></li>
                         <li>Create a new eVisa application.</li>
                         <li>Fill in the application form accurately and completely.</li>
                         <li>Upload the required supporting documents (see below).</li>
                         <li>Pay the required visa fee online using a credit/debit card.</li>
                         <li>Submit the application and wait for processing. You will receive email notifications.</li>
                         <li>Once approved, download and print the eVisa Grant Notice to present upon arrival.</li>
                     </ol>
                     <p class="small"><strong>Visa on Arrival:</strong> While previously common, it is less encouraged and may involve longer queues and uncertainty. Applying for an eVisa beforehand is highly recommended.</p>
                     <p class="small"><strong>Embassy Application:</strong> Applying through a Tanzanian embassy or consulate in your country is also possible but usually takes longer.</p>
                 </div>
                 <div class="col-lg-6 order-lg-1"> <!-- Image on left -->
                    <img src="{{ site_image('visa_process') }}" class="img-fluid rounded" alt="Laptop showing online visa application process" loading="lazy">
                </div>
            </div>

             <!-- Required Documents -->
             <div class="row my-6 wow bounceInUp" data-wow-delay="0.1s"> <!-- Adjusted margin -->
                <div class="col-lg-8 offset-lg-2">
                     <h3 class="mb-4 text-center">Required Documents for eVisa (Typical)</h3>
                      <ul>
                         <li><strong>Valid Passport:</strong> Must have at least six months validity remaining from your date of entry and at least one blank page for stamps. A clear scan of the biodata page is required.</li>
                         <li><strong>Passport-Style Photo:</strong> A recent digital photo meeting specific requirements (check official site for dimensions/background).</li>
                         <li><strong>Return Flight Ticket:</strong> Copy of your confirmed onward or return flight itinerary.</li>
                          <li><strong>Proof of Accommodation (Sometimes):</strong> May be asked for booking confirmation, though often your tour operator details suffice (check requirements).</li>
                         <li><strong>Contact Information in Tanzania:</strong> Details of your hotel or tour operator (Golden Memories Safaris can provide this if booking with us).</li>
                         <li><strong>Payment Method:</strong> Valid credit or debit card (Visa/Mastercard typically accepted) for online fee payment.</li>
                     </ul>
                     <p class="small text-center"><em>Additional documents might be requested depending on nationality or specific circumstances. Always check the official eVisa portal for the definitive list.</em></p>
                </div>
             </div>

             <!-- Fees, Processing, Validity -->
             <div class="row g-4 my-6 wow bounceInUp" data-wow-delay="0.1s"> <!-- Adjusted margin -->
                 <div class="col-12 text-center"><h3 class="mb-4">Visa Fees, Processing & Validity</h3></div>
                 <div class="col-lg-4">
                     <h5><i class="fas fa-dollar-sign text-primary me-2"></i>Visa Fees</h5>
                     <p class="small">The standard fee for a single-entry tourist visa is typically USD $50 for most nationalities. US citizens require a multiple-entry visa, usually costing USD $100. Fees are paid online during the eVisa application and are generally non-refundable. Verify current fees on the official website.</p>
                 </div>
                 <div class="col-lg-4">
                      <h5><i class="fas fa-clock text-primary me-2"></i>Processing Time</h5>
                     <p class="small">Official processing time is usually stated as around 10 working days, but it can take longer, especially during peak seasons. Apply well in advance (at least 2-3 weeks, preferably more) before your travel date.</p>
                 </div>
                 <div class="col-lg-4">
                     <h5><i class="fas fa-calendar-check text-primary me-2"></i>Validity & Stay</h5>
                     <p class="small">An Ordinary Visa is typically valid for entry within 90 days from the date of issue. The maximum duration of stay granted upon arrival is usually up to 90 days. Do not overstay your permitted duration.</p>
                 </div>
             </div>

            <!-- Other Entry Requirements -->
            <div class="row my-6 wow bounceInUp" data-wow-delay="0.1s"> <!-- Adjusted margin -->
                <div class="col-lg-8 offset-lg-2">
                    <h3 class="mb-4 text-center">Other Important Entry Requirements</h3>
                     <ul>
                        <li><strong>Passport Validity:</strong> Reiteration - Must be valid for at least 6 months beyond your intended date of departure from Tanzania.</li>
                        <li><strong>Yellow Fever Vaccination:</strong> Proof of vaccination is required ONLY IF you are arriving from or have transited for more than 12 hours through an airport of a country with risk of Yellow Fever transmission (check official WHO list or Tanzania Ministry of Health). Consult your doctor or travel clinic well in advance.</li>
                        <!-- Add other potential requirements if necessary, e.g., health declarations if relevant -->
                     </ul>
                </div>
            </div>

             <!-- Assistance Section -->
            <div class="row justify-content-center my-6 wow bounceInUp" data-wow-delay="0.1s"> <!-- Adjusted margin -->
                <div class="col-lg-10 text-center">
                    <h3 class="mb-4">Need Safari Planning Assistance?</h3>
                    <p>While Golden Memories Safaris cannot apply for visas on your behalf or provide official immigration advice, we are here to help you plan every other aspect of your incredible Tanzanian journey!</p>
                     <p>Once you have clarified your visa requirements, let us craft your perfect safari itinerary.</p>
                     <div class="mt-4">
                        <a href="{{ route('booking') }}" class="btn btn-primary rounded-pill px-5 py-3 me-3">Plan Your Safari</a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary rounded-pill px-5 py-3">Contact Us</a>
                     </div>
                     <hr class="my-5">
                     <p><strong>Remember to visit the official resources for all visa matters:</strong><br>
                        Official eVisa Portal: <a href="https://visa.immigration.go.tz/" target="_blank" rel="noopener noreferrer">Official eVisa Link</a><br> <!-- ** REPLACE LINK ** -->
                        Tanzania Immigration Dept: <a href="https://immigration.go.tz/" target="_blank" rel="noopener noreferrer">Official Immigration Link</a> <!-- ** REPLACE LINK ** -->
                     </p>
                </div>
            </div>


        </div>
    </div>
    <!-- Visa Information Content End -->


@endsection
