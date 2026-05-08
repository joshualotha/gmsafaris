@extends('layouts.app')

@section('title', 'Tanzania Travel Insurance & Emergency Guide | Safari Safety')
@section('keywords', 'tanzania travel insurance, safari insurance, emergency evacuation tanzania, amref flying doctors, kilimanjaro insurance, travel safety tanzania')
@section('description', 'Essential travel insurance and emergency information for your Tanzania safari. Learn about required coverage, AMREF evacuation, and safety procedures. From Golden Memories Safaris.')
@section('canonical', 'https://www.gmsafaris.co.tz/insurance')
@section('og_title', 'Travel Insurance & Emergency Info - Tanzania Safaris - Golden Memories Safaris')
@section('og_description', 'Essential information on required travel insurance coverage and emergency procedures for your safari or trek in Tanzania with Golden Memories Safaris.')
@section('og_url', 'https://www.gmsafaris.co.tz/insurance')
@section('og_image', 'https://www.gmsafaris.co.tz/img/logo.png')
@section('twitter_title', 'Travel Insurance & Emergency Info - Tanzania Safaris - Golden Memories Safaris')
@section('twitter_description', 'Essential information on required travel insurance coverage and emergency procedures for your safari or trek in Tanzania with Golden Memories Safaris.')
@section('twitter_image', 'https://www.gmsafaris.co.tz/img/logo.png')

@section('structured_data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://www.gmsafaris.co.tz/" },
        { "@type": "ListItem", "position": 2, "name": "Travel Insurance & Emergency Info", "item": "https://www.gmsafaris.co.tz/insurance" }
    ]
}
</script>
@endsection

@section('extra_styles')
<style>

        .page-header {
            background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url(img/premium_photo-1672759455710-70c879daf721.avif) center center no-repeat; /* Use a relevant background */
            background-size: cover;
        }
        .list-check li, .list-bullet li {
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
            color: var(--bs-success); /* Green check */
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
        .alert-danger, .alert-warning { /* Style for disclaimers */
            border-left: 5px solid var(--bs-danger); /* Red for critical */
        }
        .alert-warning {
             border-left-color: var(--bs-warning); /* Orange for important notes */
        }
         /* Ensure form selects/inputs have consistent height */
        .form .form-select, .form .form-control {
            height: calc(1.5em + 1rem + 2px);
        }
        .form textarea.form-control {
             height: auto;
        }
        h2.mb-5, h3.mb-4 {
            margin-bottom: 3rem !important; /* Consistent heading spacing */
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
          "name": "Travel Insurance & Emergency Info",
          "item": "https://www.gmsafaris.co.tz/insurance"
        }
      ]
    }
    </script>
@endsection

@section('body_content')

                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">Travel Insurance & Emergency Information</h1> <!-- Title Updated -->
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Insurance & Emergency</li> <!-- Breadcrumb Updated -->
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Insurance & Emergency Content Start -->
    <div class="container-fluid py-6">
        <div class="container">

            <!-- Introduction & Disclaimer -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10 text-center wow bounceInUp" data-wow-delay="0.1s">
                    <h2 class="mb-4">Preparing for the Unexpected</h2>
                    <p class="lead mb-4">While we meticulously plan every detail for a smooth and wonderful journey, traveling in remote areas of Africa involves inherent risks. Being prepared with comprehensive travel insurance and understanding emergency procedures is crucial for peace of mind and ensures you're covered should unforeseen circumstances arise.</p>
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading"><i class="fas fa-exclamation-triangle me-2"></i>CRITICAL: Insurance is Your Responsibility!</h4>
                        <p><strong>Comprehensive travel insurance is MANDATORY for all clients traveling with Golden Memories Safaris.</strong> It is your responsibility to purchase a policy that provides adequate coverage for your specific needs and activities before your trip commences.</p>
                        <hr>
                        <p class="mb-0">We do not sell insurance and cannot provide specific policy recommendations. This page offers guidance on what to look for and outlines general emergency procedures. Please review your chosen policy documents carefully.</p>
                    </div>
                </div>
            </div>

            <!-- Travel Insurance Section -->
             <div class="row g-5 my-6 align-items-center wow bounceInUp" data-wow-delay="0.1s"> <!-- Adjusted margin -->
                 <div class="col-lg-6">
                     <h3 class="mb-4">Travel Insurance: Essential Coverage</h3>
                     <p>Your travel insurance policy should, at a minimum, cover the following:</p>
                     <ul>
                         <li><strong>Medical Expenses & Hospitalization:</strong> Including treatment for illness or injury incurred during your trip. Ensure coverage limits are substantial.</li>
                         <li><strong>Emergency Medical Evacuation & Repatriation:</strong> Critically important. This covers the cost of emergency transport (often by air, e.g., AMREF Flying Doctors) to a suitable medical facility or back to your home country if necessary.</li>
                         <li><strong>Trip Cancellation & Curtailment:</strong> Protects your investment if you have to cancel or cut short your trip due to covered reasons (e.g., illness, family emergency).</li>
                         <li><strong>Lost or Delayed Baggage:</strong> Coverage for loss, theft, or significant delay of your luggage and personal belongings.</li>
                         <li><strong>Personal Liability:</strong> Coverage in case you accidentally cause injury or property damage to a third party.</li>
                     </ul>
                     <h5 class="mt-4">Special Considerations:</h5>
                     <ul>
                          <li><strong>High-Altitude Trekking (Kilimanjaro/Meru):</strong> If climbing, ensure your policy specifically covers medical expenses and evacuation for activities up to 6,000 meters. Standard policies often exclude this.</li>
                          <li><strong>Adventure Activities:</strong> If participating in activities like ballooning, canoeing, etc., check if they are covered.</li>
                          <li><strong>Pre-existing Conditions:</strong> Declare any pre-existing medical conditions to your insurer to ensure coverage.</li>
                     </ul>
                 </div>
                 <div class="col-lg-6">
                    <img src="{{ asset('img/insurance-doc.webp') }}" class="img-fluid rounded" alt="Travel insurance policy document and passport" loading="lazy">
                     <div class="alert alert-warning mt-4" role="alert">
                        <strong>Choosing a Policy:</strong> Compare different providers. Read the policy wording (PDS/policy document) carefully, especially exclusions and coverage limits. Ensure the emergency assistance contact number is easily accessible. Keep a copy of your policy details with you and leave one with family/friends at home.
                     </div>
                 </div>
            </div>


            <!-- Emergency Procedures Section -->
            <div class="row my-6 wow bounceInUp" data-wow-delay="0.1s"> <!-- Adjusted margin -->
                 <div class="col-12 text-center">
                     <h2 class="mb-5">Emergency Procedures During Your Trip</h2>
                      <p class="lead mx-auto" style="max-width: 800px;">In the unlikely event of an emergency, remain calm and follow these steps:</p>
                 </div>
            </div>
             <div class="row g-5 my-6 align-items-center wow bounceInUp" data-wow-delay="0.1s"> <!-- Adjusted margin -->
                 <div class="col-lg-6 order-lg-2"> <!-- Text on right -->
                     <h4 class="mb-3"><i class="fas fa-first-aid text-primary me-2"></i>Medical Emergencies</h4>
                     <ol>
                         <li><strong>Inform Your Guide Immediately:</strong> Your Golden Memories Safaris guide is your first point of contact. They are trained in basic first aid and emergency communication protocols.</li>
                         <li><strong>Guide Assesses & Contacts Base:</strong> Your guide will assess the situation and contact our office base in Arusha via vehicle radio or satellite phone (where applicable).</li>
                         <li><strong>Insurance/Evacuation Contacted:</strong> Our base team, or your guide directly if necessary, will contact your travel insurance provider's emergency assistance number and/or specialized evacuation services like AMREF Flying Doctors (often coordinated via insurance).</li>
                         <li><strong>Follow Instructions:</strong> Follow the instructions given by your guide, our base team, and the emergency medical/evacuation provider.</li>
                     </ol>
                     <p class="small"><em>Note: Access to advanced medical facilities in remote park areas is limited. Evacuation to a major town (Arusha, Nairobi) or your home country may be necessary for serious incidents. This highlights the critical importance of evacuation coverage.</em></p>
                 </div>
                  <div class="col-lg-6 order-lg-1"> <!-- Image on left -->
                    <img src="{{ asset('img/amref-plane.webp') }}" class="img-fluid rounded" alt="AMREF Flying Doctors aircraft on a bush airstrip" loading="lazy">
                </div>
            </div>
             <div class="row g-5 my-6 align-items-center wow bounceInUp" data-wow-delay="0.1s"> <!-- Adjusted margin -->
                <div class="col-lg-6">
                     <h4 class="mb-3"><i class="fas fa-exclamation-circle text-primary me-2"></i>Other Emergencies (Theft, Loss, etc.)</h4>
                      <ul>
                         <li><strong>Inform Your Guide Immediately:</strong> Report any incident like lost passports, theft, or significant issues to your guide.</li>
                         <li><strong>Police Report (If Necessary):</strong> For theft or loss of important documents, your guide will assist you in filing a report with the local police, which is often required for insurance claims or embassy assistance.</li>
                          <li><strong>Contact Your Embassy/Consulate:</strong> For lost passports or serious incidents requiring consular assistance, contact your country's embassy or consulate (usually in Dar es Salaam). Keep their contact details handy.</li>
                         <li><strong>Contact Your Insurance Provider:</strong> Report lost/stolen items or situations leading to trip curtailment as per your policy requirements.</li>
                     </ul>
                 </div>
                 <div class="col-lg-6">
                    <img src="{{ asset('img/pexels-gustavo-fring-7155794-scaled.webp') }}" class="img-fluid rounded" alt="Person using a satellite phone or guide using radio" loading="lazy"> <!-- CHANGE IMAGE -->
                     <h4 class="mt-4 mb-3"><i class="fas fa-satellite-dish text-primary me-2"></i>Communication</h4>
                     <p class="small">Our safari vehicles are equipped with VHF radios for communication between guides and our base in Arusha. Mobile phone network coverage is good in towns and along main routes but can be patchy or non-existent in remote park areas and on mountain climbs. Satellite phones may be carried by guides on some treks or remote trips.</p>
                 </div>
            </div>

             <!-- Responsibilities Section -->
             <div class="row my-6 wow bounceInUp" data-wow-delay="0.1s"> <!-- Adjusted margin -->
                 <div class="col-12 text-center">
                     <h3 class="mb-5">Roles & Responsibilities</h3>
                 </div>
                 <div class="col-lg-6">
                     <div class="bg-light p-4 rounded border h-100">
                        <h5><i class="fas fa-user-shield text-primary me-2"></i>Our Responsibility:</h5>
                        <ul>
                            <li>Provide experienced, trained guides.</li>
                            <li>Maintain vehicles and equipment to high standards.</li>
                            <li>Have established communication protocols (radio).</li>
                            <li>Provide safety briefings (wildlife, camp rules).</li>
                            <li>Assist in contacting relevant parties (insurance, evacuation services, police, embassy) during an emergency.</li>
                            <li>Offer support and guidance throughout any emergency situation.</li>
                        </ul>
                     </div>
                 </div>
                  <div class="col-lg-6">
                    <div class="bg-light p-4 rounded border h-100">
                       <h5><i class="fas fa-user text-primary me-2"></i>Your Responsibility:</h5>
                        <ul>
                            <li>Purchase comprehensive travel insurance *before* your trip.</li>
                            <li>Provide us with your insurance policy details (provider, policy number, emergency contact number).</li>
                            <li>Consult your doctor for medical advice and necessary vaccinations/medications.</li>
                            <li>Declare any relevant pre-existing medical conditions to us and your insurer.</li>
                            <li>Follow your guide's instructions and park regulations at all times.</li>
                            <li>Report any health concerns or incidents to your guide promptly.</li>
                             <li>Keep emergency contacts (insurance, embassy, family) accessible.</li>
                        </ul>
                    </div>
                 </div>
             </div>


             <!-- Final Contact Section -->
             <div class="row justify-content-center my-6 wow bounceInUp" data-wow-delay="0.1s"> <!-- Adjusted margin -->
                <div class="col-lg-10 text-center">
                    <h3 class="mb-4">Travel Prepared, Travel Confident</h3>
                    <p>By taking necessary health precautions, securing comprehensive insurance, and understanding safety procedures, you can embark on your Tanzanian adventure with confidence. We are committed to providing a safe and memorable experience.</p>
                     <div class="mt-4">
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary rounded-pill px-5 py-3">Contact Us with Questions</a>
                     </div>
                </div>
            </div>


        </div>
    </div>
    <!-- Insurance & Emergency Content End -->

@endsection
