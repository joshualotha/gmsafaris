@extends('layouts.app')

@section('title', 'Booking Terms & Conditions | Golden Memories Safaris')
@section('keywords', 'Golden Memories Safaris terms, Tanzania safari terms and conditions, booking conditions, safari contract, cancellation policy')
@section('description', 'Review the booking terms and conditions for Golden Memories Safaris. Understand our policies on safari bookings, payments, cancellations, and liability before you travel to Tanzania.')
@section('canonical', 'https://www.gmsafaris.co.tz/termsandconditions')
@section('og_title', 'Terms and Conditions - Golden Memories Safaris')
@section('og_description', 'Read the Terms and Conditions for booking safaris, climbs, and tours with Golden Memories Safaris. Understand our policies regarding bookings, payments, cancellations, and liability.')
@section('og_url', 'https://www.gmsafaris.co.tz/termsandconditions')
@section('og_image', 'https://www.gmsafaris.co.tz/img/logo.webp')
@section('twitter_title', 'Terms and Conditions - Golden Memories Safaris')
@section('twitter_description', 'Read the Terms and Conditions for booking safaris, climbs, and tours with Golden Memories Safaris. Understand our policies regarding bookings, payments, cancellations, and liability.')
@section('twitter_image', 'https://www.gmsafaris.co.tz/img/logo.webp')

@section('structured_data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://www.gmsafaris.co.tz/" },
        { "@type": "ListItem", "position": 2, "name": "Terms and Conditions", "item": "https://www.gmsafaris.co.tz/termsandconditions" }
    ]
}
</script>
@endsection

@section('extra_styles')
<style>

             /* Page Header Style */
            .page-header {
                /* *** REPLACE 'img/terms-hero.jpg' with your actual hero image *** */
                background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(img/1659143707.webp) center center no-repeat;
                background-size: cover;
            }

            /* Reusing enhanced content styling from Privacy Policy */
            .legal-content-wrapper { /* Renamed for clarity, but same styles */
                background-color: #ffffff;
                padding: 2.5rem 3rem;
                border-radius: 0.5rem;
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.07);
                margin-top: -50px;
                position: relative;
                z-index: 10;
            }

             @media (max-width: 767.98px) {
                 .legal-content-wrapper {
                    padding: 1.5rem;
                    margin-top: -30px;
                 }
             }

            .legal-content-wrapper h2 {
                color: var(--bs-primary);
                margin-top: 2.5rem;
                margin-bottom: 1.25rem;
                padding-bottom: 0.75rem;
                border-bottom: 3px solid var(--bs-primary-light);
                font-weight: 600;
                position: relative;
                padding-left: 35px;
            }
             /* Icons for H2 headings */
             .legal-content-wrapper h2::before {
                font-family: "Font Awesome 5 Free";
                font-weight: 900; /* Solid style */
                position: absolute;
                left: 0;
                top: 5px;
                font-size: 1.2em;
                color: var(--bs-primary);
                /* Assign specific icons */
             }
             .legal-content-wrapper h2#agreement::before { content: "\f0a8"; } /* fas fa-handshake */
             .legal-content-wrapper h2#ip::before { content: "\f1f9"; } /* fas fa-copyright */
             .legal-content-wrapper h2#booking::before { content: "\f56e"; } /* fas fa-calendar-check */
             .legal-content-wrapper h2#payment::before { content: "\f155"; } /* fas fa-dollar-sign */
             .legal-content-wrapper h2#cancel::before { content: "\f05e"; } /* fas fa-ban */
             .legal-content-wrapper h2#responsibility::before { content: "\f554"; } /* fas fa-user-shield */
             .legal-content-wrapper h2#liability::before { content: "\f071"; } /* fas fa-exclamation-triangle */
             .legal-content-wrapper h2#law::before { content: "\f0e3"; } /* fas fa-gavel */
             .legal-content-wrapper h2#changes::before { content: "\f35a"; } /* fas fa-sync-alt */
             .legal-content-wrapper h2#contact::before { content: "\f0e0"; } /* fas fa-envelope */


            .legal-content-wrapper h3 {
                color: var(--bs-dark);
                margin-top: 2rem;
                margin-bottom: 1rem;
                font-weight: 600;
                font-size: 1.25rem;
            }
             .legal-content-wrapper p, .legal-content-wrapper li {
                 line-height: 1.8;
                 color: #343a40;
                 margin-bottom: 1.25rem;
             }
             .legal-content-wrapper ul {
                 list-style: none;
                 padding-left: 0;
                 margin-bottom: 1.5rem;
             }
              .legal-content-wrapper ul li {
                 position: relative;
                 padding-left: 2rem;
                 margin-bottom: 0.75rem;
             }
             .legal-content-wrapper ul li::before {
                 content: "\f0da"; /* Font Awesome Chevron Right */
                 font-family: "Font Awesome 5 Free";
                 font-weight: 900;
                 color: var(--bs-primary);
                 position: absolute;
                 left: 0;
                 top: 5px;
                 font-size: 1em;
             }
             .legal-content-wrapper strong {
                 color: #212529;
             }
             .legal-content-wrapper .important-note {
                 background-color: #fff3cd; /* Light yellow */
                 border-left: 5px solid #ffeeba;
                 padding: 1rem 1.5rem;
                 border-radius: 0.25rem;
                 margin: 1.5rem 0;
             }

             /* Style for Contact Info at the end */
             .contact-info-box {
                 background-color: var(--bs-light);
                 border-left: 5px solid var(--bs-primary);
                 padding: 1.5rem 2rem;
                 margin-top: 2rem;
                 border-radius: 0.3rem;
             }
              .contact-info-box p { margin-bottom: 0.5rem; }
              .contact-info-box a { color: var(--bs-primary); text-decoration: none; }
              .contact-info-box a:hover { text-decoration: underline; }

             /* Footer Logo */
             .footer-logo {
               max-width: 100%;
               height: auto;
               filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
             }
             /* Consistent section padding */
             .py-6 {
                 padding-top: 6rem;
                 padding-bottom: 6rem;
             }
             .legal-main-section.py-6 { /* Adjusted class name */
                  padding-top: 8rem; /* Extra top padding */
             }
        </style>
@endsection

@section('body_content')

        <!-- Page Header Start -->
        <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
            <div class="container text-center py-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Terms and Conditions</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item text-primary active" aria-current="page">Terms & Conditions</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Terms and Conditions Content Start -->
        <div class="container-fluid legal-main-section py-6"> <!-- Adjusted class name -->
            <div class="container">
                 <div class="row justify-content-center">
                     <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.1s">
                        <!-- Content Wrapper -->
                        <div class="legal-content-wrapper">

                            <p><strong>Effective Date:</strong> October 26, 2024 </p>
                            <p>Please read these Terms and Conditions carefully before using the [www.gmsafaris.co.tz] website and booking tours operated by Golden Memories Safaris.</p>
                            <p>Your access to and use of the Service and participation in our tours is conditioned upon your acceptance of and compliance with these Terms. These Terms apply to all visitors, users, clients, and others who wish to access or use the Service or book a tour.</p>
                            <p><strong>By accessing or using the Service or booking a tour, you agree to be bound by these Terms. If you disagree with any part of the terms, then you do not have permission to access the Service or book a tour.</strong></p>

                            <h2 id="agreement">. Agreement to Terms</h2>
                            <p>These Terms and Conditions constitute a legally binding agreement made between you, whether personally or on behalf of an entity ("you") and Golden Memories Safaris, concerning your access to and use of the [Your Website URL] website as well as any related applications and the booking and participation in tours organized by us.</p>

                            <h2 id="ip">. Intellectual Property Rights</h2>
                            <p>Unless otherwise indicated, the Service and all content and other materials on the Site, including, without limitation, the Golden Memories Safaris logo, and all designs, text, graphics, pictures, information, data, software, sound files, other files and the selection and arrangement thereof (collectively, "Site Content") are the proprietary property of Golden Memories Safaris or our licensors or users and are protected by Tanzanian and international copyright laws. You are granted a limited, non-sublicensable license to access and use the Site and Site Content for personal, informational, and booking purposes only.</p>

                            <h2 id="booking">. Booking and Tour Confirmation</h2>
                            <h3>3.1. Inquiry and Proposal</h3>
                            <p>Your submission of a booking inquiry form or request does not constitute a confirmed booking. We will respond to your inquiry with a proposed itinerary and quote based on the information provided and availability. </p>
                            <h3>3.2. Confirmation</h3>
                            <p>A booking is considered confirmed only upon our receipt of the required deposit payment (as outlined in Section 4) and our issuance of a written booking confirmation to you.</p>
                            <h3>3.3. Travel Documents</h3>
                            <p>It is your sole responsibility to ensure that you possess all necessary travel documents, including but not limited to valid passports (typically requiring at least 6 months validity beyond your intended stay), visas, vaccination certificates, and any other entry requirements for Tanzania and any transit countries. We are not liable for any consequences arising from your failure to obtain the required documents.</p>
                            <h3>3.4. Travel Insurance</h3>
                            <p class="important-note"><strong>Comprehensive travel insurance is mandatory for all clients booking with Golden Memories Safaris.</strong> Your insurance must cover, at minimum, trip cancellation/interruption, medical expenses, emergency evacuation/repatriation, and loss/damage to personal belongings. Proof of insurance may be required before the start of your tour. You are responsible for understanding the limits and coverage of your policy.</p>

                            <h2 id="payment">. Payments</h2>
                            <h3>4.1. Deposit</h3>
                            <p>A deposit of 30% of the total tour cost is required to confirm your booking. This deposit is non-refundable, except under specific circumstances outlined in our Cancellation Policy (Section 5).</p>
                            <h3>4.2. Final Payment</h3>
                            <p>The remaining balance of the tour cost is due [Specify Deadline, e.g., 60 days] prior to the commencement date of your tour. Failure to make the final payment by the due date may result in the cancellation of your booking and forfeiture of your deposit.</p>
                            <h3>4.3. Payment Methods</h3>
                            <p>We accept payments via [Specify Methods, e.g., Bank Wire Transfer, Credit Card via secure link (mention processor if applicable), etc.]. Any bank charges or credit card processing fees associated with the payment are the responsibility of the client.</p>
                            <h3>4.4. Pricing and Inclusions/Exclusions</h3>
                            <p>Prices are typically quoted in US Dollars (USD) unless otherwise specified. Your detailed itinerary and quote will clearly state what is included and excluded in the tour price (e.g., accommodation, meals, park fees, guide services, flights, drinks, tips, insurance, visa fees).</p>

                            <h2 id="cancel">. Cancellations and Modifications</h2>
                            <h3>5.1. Cancellation by You</h3>
                            <p>All cancellation requests must be received in writing (email is acceptable). The following cancellation fees apply, calculated from the date we receive your written notification:</p>
                            <ul>
                                <!-- *** MODIFY THESE EXAMPLES WITH YOUR ACTUAL POLICY *** -->
                                <li>More than [e.g., 60] days prior to departure: Forfeiture of deposit.</li>
                                <li>[e.g., 59] to [e.g., 30] days prior to departure: [e.g., 50%] of total tour cost.</li>
                                <li>Less than [e.g., 30] days prior to departure or no-show: 100% of total tour cost.</li>
                            </ul>
                            <p>Note: Certain components like gorilla permits, chimpanzee permits, or specific flight bookings may be non-refundable regardless of the cancellation date. This will be communicated during the booking process if applicable. We strongly recommend travel insurance to cover potential cancellation fees.</p>
                            <h3>5.2. Modification by You</h3>
                            <p>Requests for modifications to confirmed itineraries are subject to availability and may incur additional costs or amendment fees. We will make reasonable efforts to accommodate changes, but cannot guarantee feasibility.</p>
                            <h3>5.3. Cancellation or Modification by Us</h3>
                            <p>While we endeavor to operate all tours as planned, we reserve the right to modify or cancel tour arrangements due to unforeseen circumstances such as force majeure (see Section 7), safety concerns, or insufficient participation (for group tours). In such cases, we will offer alternative arrangements of comparable standard if available, or provide a full or partial refund for the affected portion of the tour, determined at our discretion. We are not liable for any additional expenses incurred by you as a result of such changes (e.g., non-refundable flights).</p>

                            <h2 id="responsibility">. Traveler Responsibility</h2>
                            <h3>6.1. Health and Fitness</h3>
                            <p>You are responsible for ensuring you are in suitable physical and mental condition for the chosen tour, especially for activities like Kilimanjaro climbs or walking safaris. Please consult your doctor regarding necessary vaccinations, medical precautions, and overall fitness. You must inform us in writing at the time of booking of any pre-existing medical conditions, disabilities, or dietary requirements.</p>
                            <h3>6.2. Conduct</h3>
                            <p>You agree to abide by the instructions of our guides and representatives, comply with local laws and customs, and respect the environment and wildlife. We reserve the right to remove any client from a tour whose conduct is deemed disruptive, dangerous, or harmful to themselves, others, or the environment, without any right to a refund.</p>

                            <h2 id="liability">. Limitation of Liability & Force Majeure</h2>
                            <p>Golden Memories Safaris acts as an agent for hotels, transportation services, and other suppliers. We exercise all reasonable care in making arrangements, however, we do not own or operate these third-party services. Therefore, we shall not be liable for any injury, damage, loss, accident, delay, or irregularity arising out of or in connection with acts or omissions of these third parties, or resulting from unforeseen circumstances or force majeure events.</p>
                            <p>Force majeure includes, but is not limited to, war, civil unrest, terrorism, natural disasters (floods, earthquakes, volcanic eruptions), pandemics, epidemics, government restrictions, flight cancellations or delays, strikes, or any other event beyond our reasonable control.</p>
                            <p>Participation in adventure activities like safaris and mountain climbing involves inherent risks. By booking a tour, you acknowledge and accept these risks.</p>

                            <h2 id="law">. Governing Law</h2>
                            <p>These Terms and Conditions and any dispute or claim arising out of or in connection with them shall be governed by and construed in accordance with the laws of the United Republic of Tanzania, without regard to its conflict of law principles.</p>

                            <h2 id="changes">. Changes to Terms and Conditions</h2>
                            <p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material, we will provide notice on our website prior to the changes taking effect. What constitutes a material change will be determined at our sole discretion. By continuing to access or use our Service after any revisions become effective, you agree to be bound by the revised terms.</p>

                            <h2 id="contact">. Contact Us</h2>
                            <div class="contact-info-box">
                                <p>If you have any questions about these Terms and Conditions, please contact us:</p>
                                <p>
                                    <strong>Golden Memories Safaris</strong><br>
                                    [Your Full Postal Address]<br>
                                    Arusha, Tanzania<br>
                                    Email: <a href="mailto:info@gmsafaris.co.tz">info@gmsafaris.co.tz</a><br>
                                    Phone: <a href="tel:+255786383273">+255 786 383 273</a>
                                </p>
                            </div>

                        </div> <!-- End Legal Content Wrapper -->
                     </div>
                 </div>
            </div>
        </div>
        <!-- Terms and Conditions Content End -->

@endsection
