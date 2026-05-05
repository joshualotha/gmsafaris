@extends('layouts.app')

@section('title', 'Tanzania Health & Safety Information - Travel Guide - Golden Memories Safaris')
@section('keywords', 'tanzania health advice, tanzania safety tips, travel vaccinations tanzania, malaria prevention tanzania, tanzania travel insurance, safari safety')
@section('description', 'Essential health and safety information for your trip to Tanzania. Guide on vaccinations, malaria, food safety, wildlife encounters, and travel insurance from Golden Memories Safaris.')
@section('canonical', 'https://www.gmsafaris.co.tz/healthandsafety')
@section('og_title', 'Tanzania Health & Safety Information - Travel Guide - Golden Memories Safaris')
@section('og_description', 'Essential health and safety information for your trip to Tanzania. Guide on vaccinations, malaria, food safety, wildlife encounters, and travel insurance from Golden Memories Safaris.')
@section('og_url', 'https://www.gmsafaris.co.tz/healthandsafety')
@section('og_image', 'https://www.gmsafaris.co.tz/img/logo.png')
@section('twitter_title', 'Tanzania Health & Safety Information - Travel Guide - Golden Memories Safaris')
@section('twitter_description', 'Essential health and safety information for your trip to Tanzania. Guide on vaccinations, malaria, food safety, wildlife encounters, and travel insurance from Golden Memories Safaris.')
@section('twitter_image', 'https://www.gmsafaris.co.tz/img/logo.png')

@section('extra_styles')
<style>

        .page-header {
            background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url(img/health-header.jpg) center center no-repeat; /* Use a relevant health/safety background */
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
        .alert-danger { /* Style for the disclaimer */
            border-left: 5px solid var(--bs-danger);
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
          "name": "Tanzania Health & Safety Information",
          "item": "https://www.gmsafaris.co.tz/healthandsafety"
        }
      ]
    }
    </script>
@endsection

@section('body_content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">Health & Safety Guide</h1> <!-- Title Updated -->
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Health & Safety</li> <!-- Breadcrumb Updated -->
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Health & Safety Content Start -->
    <div class="container-fluid py-6">
        <div class="container">

             <!-- Introduction & Disclaimer -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10 text-center wow bounceInUp" data-wow-delay="0.1s">
                    <h2 class="mb-4">Staying Healthy & Safe on Your Tanzanian Adventure</h2>
                    <p class="lead mb-4">Your health and safety are paramount to enjoying an incredible Tanzanian experience. While Tanzania is generally a safe country for tourists and health risks can be minimized with proper precautions, preparation is key. This guide provides essential information, but it is not a substitute for professional medical advice.</p>
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading"><i class="fas fa-exclamation-triangle me-2"></i>CRITICAL HEALTH DISCLAIMER!</h4>
                        <p>This information is for general guidance only. Health requirements and recommendations (vaccinations, malaria prevention) change and depend heavily on your individual health history, itinerary, and country of origin.</p>
                        <hr>
                        <p class="mb-0"><strong>You MUST consult your doctor or a specialized travel clinic 4-8 weeks before your departure.</strong> They will provide personalized advice based on the latest information from organizations like the WHO and CDC. Do not rely solely on this page for medical decisions.</p>
                         <a href="https://www.who.int/countries/tza/" target="_blank" rel="noopener noreferrer" class="btn btn-danger btn-sm mt-3 me-2">WHO Tanzania Info <i class="fas fa-external-link-alt ms-1"></i></a> <!-- ** REPLACE/VERIFY LINK ** -->
                         <a href="https://wwwnc.cdc.gov/travel/destinations/traveler/none/tanzania" target="_blank" rel="noopener noreferrer" class="btn btn-danger btn-sm mt-3">CDC Tanzania Info <i class="fas fa-external-link-alt ms-1"></i></a> <!-- ** REPLACE/VERIFY LINK ** -->
                    </div>
                </div>
            </div>

            <!-- Health Section -->
             <div class="row my-6 wow bounceInUp" data-wow-delay="0.1s"> <!-- Adjusted margin -->
                 <div class="col-12 text-center">
                     <h2 class="mb-5">Health Precautions</h2>
                 </div>
            </div>
            <div class="row g-5 align-items-center mb-5 wow bounceInUp" data-wow-delay="0.1s">
                 <div class="col-lg-6">
                     <img src="{{ asset('img/Amani tavel clinic  Salmon Arm.webp') }}" class="img-fluid rounded" alt="Doctor consulting with a patient about travel health" loading="lazy"> <!-- CHANGE IMAGE -->
                 </div>
                  <div class="col-lg-6">
                    <h4 class="mb-3"><i class="fas fa-user-md text-primary me-2"></i>Consult Your Doctor / Travel Clinic</h4>
                    <ul>
                         <li>Discuss your itinerary (including altitude if climbing) and personal health history.</li>
                         <li>Get personalized recommendations for vaccinations and malaria prophylaxis.</li>
                         <li>Ensure you have adequate supplies of any prescription medications you take regularly, along with copies of prescriptions.</li>
                         <li>Discuss any pre-existing conditions and how travel might affect them.</li>
                    </ul>
                 </div>
            </div>
             <div class="row g-4 my-6 wow bounceInUp" data-wow-delay="0.1s"> <!-- Adjusted margin -->
                 <div class="col-lg-6">
                    <h4 class="mb-3"><i class="fas fa-syringe text-primary me-2"></i>Vaccinations</h4>
                    <ul>
                        <li><strong>Yellow Fever:</strong> Compulsory ONLY IF arriving from (or transiting >12 hours in) a Yellow Fever endemic country. Check the official WHO list and Tanzanian requirements. Carry your vaccination certificate if required. <a href="https://www.who.int/health-topics/yellow-fever" target="_blank" rel="noopener noreferrer">[Check WHO List]</a> <!-- ** REPLACE LINK ** --></li>
                        <li><strong>Routine Vaccinations:</strong> Ensure standard vaccinations (MMR, Diphtheria-Tetanus-Pertussis, Polio, etc.) are up to date.</li>
                        <li><strong>Recommended Vaccinations:</strong> Often include Hepatitis A, Typhoid, and sometimes others like Hepatitis B, Rabies, Cholera, depending on your activities and duration. Discuss with your doctor.</li>
                    </ul>
                 </div>
                 <div class="col-lg-6">
                     <h4 class="mb-3"><i class="fas fa-mosquito text-primary me-2"></i>Malaria Prevention</h4>
                     <ul>
                        <li>Malaria is present in many parts of Tanzania, especially at lower altitudes and coastal areas. Risk varies by season and location.</li>
                        <li>Consult your doctor about appropriate antimalarial medication (prophylaxis). Start taking it as prescribed before, during, and after your trip.</li>
                        <li>Prevent bites: Use insect repellent containing DEET (or other recommended active ingredient), wear long sleeves/trousers during dawn/dusk, and sleep under mosquito nets (provided by most lodges/camps).</li>
                     </ul>
                 </div>
             </div>
             <div class="row g-4 my-6 wow bounceInUp" data-wow-delay="0.1s"> <!-- Adjusted margin -->
                 <div class="col-lg-6">
                    <h4 class="mb-3"><i class="fas fa-tint text-primary me-2"></i>Food & Water Safety</h4>
                     <ul>
                        <li>Drink only bottled, boiled, or purified water. Avoid tap water and ice made from tap water.</li>
                        <li>Eat food that is freshly cooked and served hot. Be cautious with street food, raw salads, and unpeeled fruits unless you peel them yourself.</li>
                        <li>Wash hands frequently or use hand sanitizer, especially before eating.</li>
                    </ul>
                 </div>
                  <div class="col-lg-6">
                    <h4 class="mb-3"><i class="fas fa-sun text-primary me-2"></i>Sun Protection</h4>
                     <ul>
                        <li>The equatorial sun is strong. Use high-SPF sunscreen generously and reapply often.</li>
                        <li>Wear a wide-brimmed hat and sunglasses.</li>
                        <li>Stay hydrated by drinking plenty of water.</li>
                    </ul>
                 </div>
            </div>
             <div class="row g-4 my-6 wow bounceInUp" data-wow-delay="0.1s"> <!-- Adjusted margin -->
                 <div class="col-lg-6">
                    <h4 class="mb-3"><i class="fas fa-mountain text-primary me-2"></i>Altitude Sickness (if applicable)</h4>
                     <ul>
                        <li>Relevant for Kilimanjaro/Meru climbs or high-altitude areas like Ngorongoro Crater rim.</li>
                        <li>Ascend slowly ("Pole Pole"), stay well-hydrated, avoid alcohol and smoking.</li>
                        <li>Discuss preventative medication (e.g., Diamox) with your doctor.</li>
                        <li>Know the symptoms (headache, nausea, fatigue) and inform your guide immediately if they occur.</li>
                    </ul>
                 </div>
                  <div class="col-lg-6">
                    <h4 class="mb-3"><i class="fas fa-briefcase-medical text-primary me-2"></i>Travel Insurance & First Aid</h4>
                     <ul>
                        <li>Essential: Obtain comprehensive travel insurance covering medical emergencies, evacuation (including high altitude if climbing), trip cancellation, and lost belongings.</li>
                        <li>Carry a basic personal first-aid kit with essentials like antiseptic wipes, plasters, pain relievers, anti-diarrheal medication, and any personal prescriptions.</li>
                    </ul>
                 </div>
            </div>

            <!-- Safety Section -->
            <div class="row my-6 wow bounceInUp" data-wow-delay="0.1s"> <!-- Adjusted margin -->
                 <div class="col-12 text-center">
                     <h2 class="mb-5">Safety Tips for Travelers</h2>
                 </div>
            </div>
             <div class="row g-5 align-items-center mb-5 wow bounceInUp" data-wow-delay="0.1s">
                 <div class="col-lg-6 order-lg-2"> <!-- Text on right -->
                    <h4 class="mb-3"><i class="fas fa-eye text-primary me-2"></i>General Awareness & Valuables</h4>
                     <ul>
                        <li>Be aware of your surroundings, especially in crowded areas like markets or bus stations in towns/cities.</li>
                        <li>Avoid walking alone at night in urban areas; use reputable taxis arranged by your hotel or guide.</li>
                        <li>Do not display large amounts of cash or expensive jewelry.</li>
                        <li>Keep valuables (passport, extra cash, electronics) secure in your hotel safe or locked luggage. Carry copies of important documents separately.</li>
                        <li>Be wary of unsolicited offers or scams.</li>
                    </ul>
                 </div>
                  <div class="col-lg-6 order-lg-1"> <!-- Image on left -->
                    <img src="{{ asset('img/safari-safety.JPG') }}" class="img-fluid rounded" alt="Safari guide explaining safety rules to tourists in vehicle" loading="lazy"> <!-- CHANGE IMAGE -->
                </div>
            </div>
             <div class="row g-4 my-6 wow bounceInUp" data-wow-delay="0.1s"> <!-- Adjusted margin -->
                  <div class="col-lg-6">
                    <h4 class="mb-3"><i class="fas fa-paw text-primary me-2"></i>Wildlife Safety (On Safari)</h4>
                     <ul>
                        <li>Always listen to your guide. Their instructions are crucial for your safety around wild animals.</li>
                        <li>Stay inside the vehicle during game drives unless your guide deems it safe at specific designated spots.</li>
                        <li>Do not hang limbs out of the vehicle.</li>
                        <li>Keep noise levels down near animals to avoid startling them.</li>
                        <li>Never attempt to feed or approach wild animals.</li>
                         <li>Be cautious when walking around unfenced camps/lodges, especially at night; use escorts where provided.</li>
                    </ul>
                 </div>
                  <div class="col-lg-6">
                    <h4 class="mb-3"><i class="fas fa-camera text-primary me-2"></i>Photography & Cultural Sensitivity</h4>
                     <ul>
                        <li>Always ask for permission before taking photos of people, including Maasai or other tribal members. Respect their decision if they decline.</li>
                        <li>Be mindful when photographing homes or private property.</li>
                         <li>Dress modestly when visiting villages or towns, especially outside major tourist areas (shoulders and knees covered is generally respectful).</li>
                    </ul>
                 </div>
             </div>
             <div class="row g-4 my-6 wow bounceInUp" data-wow-delay="0.1s"> <!-- Adjusted margin -->
                 <div class="col-lg-6">
                    <h4 class="mb-3"><i class="fas fa-road text-primary me-2"></i>Road Travel</h4>
                     <ul>
                         <li>Road conditions can vary significantly; travel between parks often involves driving on unpaved, bumpy roads.</li>
                         <li>Avoid driving at night if possible.</li>
                         <li>Use reputable transport providers like Golden Memories Safaris, whose vehicles are well-maintained and drivers experienced.</li>
                    </ul>
                 </div>
                 <div class="col-lg-6">
                    <h4 class="mb-3"><i class="fas fa-headset text-primary me-2"></i>Emergency Contacts & Communication</h4>
                     <ul>
                        <li>Keep our company contact details readily available.</li>
                        <li>Have emergency contact information for your travel insurance provider.</li>
                        <li>Mobile phone coverage can be patchy in remote areas; inform family/friends of potential communication gaps.</li>
                    </ul>
                 </div>
            </div>

             <!-- Our Commitment Section -->
            <div class="row justify-content-center my-6 wow bounceInUp" data-wow-delay="0.1s"> <!-- Adjusted margin -->
                <div class="col-lg-10 text-center">
                     <h3 class="mb-4">Our Commitment to Your Safety</h3>
                     <p>At Golden Memories Safaris, your well-being is our top priority. We ensure:</p>
                     <ul class="list-inline">
                         <li class="list-inline-item me-3"><i class="fas fa-check text-primary me-1"></i>Experienced & Trained Guides</li>
                         <li class="list-inline-item me-3"><i class="fas fa-check text-primary me-1"></i>Well-Maintained Safari Vehicles</li>
                         <li class="list-inline-item me-3"><i class="fas fa-check text-primary me-1"></i>Radio Communication in Vehicles</li>
                          <li class="list-inline-item"><i class="fas fa-check text-primary me-1"></i>Adherence to Park Rules & Safety Briefings</li>
                          <li class="list-inline-item"><i class="fas fa-check text-primary me-1"></i>Assistance with Emergency Procedures</li>
                     </ul>
                     <p>Trust your guide, follow safety instructions, and communicate any concerns you may have during your trip.</p>
                      <div class="mt-4">
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary rounded-pill px-5 py-3">Ask Us Any Questions</a>
                     </div>
                      <hr class="my-5">
                     <p><strong>Always check your government's latest travel advisories for Tanzania</strong><br>
                       
                     </p>
                </div>
            </div>


        </div>
    </div>
    <!-- Health & Safety Content End -->

@endsection
