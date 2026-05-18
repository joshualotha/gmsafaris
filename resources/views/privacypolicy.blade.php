@extends('layouts.app')

@section('title', 'Privacy Policy | Golden Memories Safaris')
@section('keywords', 'Golden Memories Safaris privacy policy, data protection, personal information, Tanzania tour operator privacy')
@section('description', 'Read the Privacy Policy for Golden Memories Safaris. Learn how we collect, use, and protect your personal data when you book Tanzania safaris or use our website.')
@section('canonical', 'https://www.gmsafaris.co.tz/privacypolicy')
@section('og_title', 'Privacy Policy - Golden Memories Safaris')
@section('og_description', 'Privacy Policy for Golden Memories Safaris, detailing how we collect, use, and protect your personal data when you use our services or website.')
@section('og_url', 'https://www.gmsafaris.co.tz/privacypolicy')
@section('og_image', site_image('privacy_hero'))
@section('twitter_title', 'Privacy Policy - Golden Memories Safaris')
@section('twitter_description', 'Privacy Policy for Golden Memories Safaris, detailing how we collect, use, and protect your personal data when you use our services or website.')
@section('twitter_image', site_image('privacy_hero'))

@section('structured_data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://www.gmsafaris.co.tz/" },
        { "@type": "ListItem", "position": 2, "name": "Privacy Policy", "item": "https://www.gmsafaris.co.tz/privacypolicy" }
    ]
}
</script>
@endsection

@section('extra_styles')
<style>

             

            /* Privacy Policy Content Styling */
            .privacy-content h2 {
                color: var(--bs-primary);
                margin-top: 2.5rem;
                margin-bottom: 1rem;
                padding-bottom: 0.5rem;
                border-bottom: 2px solid var(--bs-primary-light);
            }
            .privacy-content h3 {
                color: var(--bs-dark);
                margin-top: 1.5rem;
                margin-bottom: 0.75rem;
                font-weight: 600;
            }
             .privacy-content p, .privacy-content li {
                 line-height: 1.7;
                 color: #495057; /* Darker gray for readability */
             }
             .privacy-content ul {
                 list-style: disc;
                 padding-left: 2rem; /* Indent lists */
                 margin-bottom: 1rem;
             }
             .privacy-content strong {
                 color: var(--bs-dark);
             }

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

                         /* Page Header Style */
            .page-header {
                /* Page header background image */
                background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url({{ site_image('privacy_hero') }}) center center no-repeat;
                background-size: cover;
            }

            /* Privacy Policy Content Styling - Enhanced Design */
            .privacy-content-wrapper {
                background-color: #ffffff; /* White background for content */
                padding: 2.5rem 3rem; /* More padding */
                border-radius: 0.5rem;
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.07); /* Subtle shadow */
                margin-top: -50px; /* Overlap page header slightly */
                position: relative; /* Needed for overlap */
                z-index: 10; /* Ensure it's above header background */
            }

             @media (max-width: 767.98px) {
                 .privacy-content-wrapper {
                    padding: 1.5rem;
                    margin-top: -30px;
                 }
             }

            .privacy-content-wrapper h2 {
                color: var(--bs-primary);
                margin-top: 2.5rem; /* Space above heading */
                margin-bottom: 1.25rem; /* Space below heading */
                padding-bottom: 0.75rem;
                border-bottom: 3px solid var(--bs-primary-light); /* Slightly thicker border */
                font-weight: 600; /* Bolder heading */
                position: relative;
                padding-left: 35px; /* Space for icon */
            }
             /* Add icons to H2 headings */
             .privacy-content-wrapper h2::before {
                font-family: "Font Awesome 5 Free"; /* Font Awesome 5 */
                font-weight: 900; /* Solid style */
                position: absolute;
                left: 0;
                top: 5px; /* Adjust vertical alignment */
                font-size: 1.2em; /* Icon size */
                color: var(--bs-primary);
                /* Assign specific icons - add more as needed */
             }
             .privacy-content-wrapper h2#intro::before { content: "\f05a"; } /* fas fa-info-circle */
             .privacy-content-wrapper h2#info-collect::before { content: "\f0c9"; } /* fas fa-list-alt */
             .privacy-content-wrapper h2#how-use::before { content: "\f085"; } /* fas fa-cogs */
             .privacy-content-wrapper h2#disclosure::before { content: "\f064"; } /* fas fa-share-square */
             .privacy-content-wrapper h2#security::before { content: "\f3ed"; } /* fas fa-shield-alt */
             .privacy-content-wrapper h2#retention::before { content: "\f1da"; } /* fas fa-history */
             .privacy-content-wrapper h2#rights::before { content: "\f24e"; } /* fas fa-address-card */
             .privacy-content-wrapper h2#cookies::before { content: "\f563"; } /* fas fa-cookie-bite */
             .privacy-content-wrapper h2#third-party::before { content: "\f360"; } /* fas fa-external-link-alt */
             .privacy-content-wrapper h2#children::before { content: "\f1ae"; } /* fas fa-child */
             .privacy-content-wrapper h2#changes::before { content: "\f35a"; } /* fas fa-sync-alt */
             .privacy-content-wrapper h2#contact::before { content: "\f0e0"; } /* fas fa-envelope */


            .privacy-content-wrapper h3 {
                color: var(--bs-dark);
                margin-top: 2rem; /* More space above h3 */
                margin-bottom: 1rem;
                font-weight: 600;
                font-size: 1.25rem; /* Slightly larger h3 */
            }
             .privacy-content-wrapper p, .privacy-content-wrapper li {
                 line-height: 1.8; /* Increased line height */
                 color: #343a40; /* Slightly darker text */
                 margin-bottom: 1.25rem; /* More space between paragraphs */
             }
             .privacy-content-wrapper ul {
                 list-style: none; /* Remove default bullets */
                 padding-left: 0; /* Remove default padding */
                 margin-bottom: 1.5rem;
             }
              .privacy-content-wrapper ul li {
                 position: relative;
                 padding-left: 2rem; /* Space for custom bullet */
                 margin-bottom: 0.75rem; /* Space between list items */
             }
             .privacy-content-wrapper ul li::before {
                 content: "\f058"; /* Font Awesome Check Circle (Solid) */
                 font-family: "Font Awesome 5 Free";
                 font-weight: 900; /* Solid style */
                 color: var(--bs-primary);
                 position: absolute;
                 left: 0;
                 top: 5px; /* Adjust vertical alignment */
                 font-size: 1em;
             }

             .privacy-content-wrapper strong {
                 color: #212529; /* Ensure strong tags are dark */
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
             .privacy-main-section.py-6 {
                  padding-top: 8rem; /* Extra top padding because of overlapping wrapper */
             }
        </style>
@endsection

@section('body_content')

        <!-- Page Header Start -->
        <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
            <div class="container text-center py-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Privacy Policy</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item text-primary active" aria-current="page">Privacy Policy</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->


               <!-- Privacy Policy Content Start -->
               <div class="container-fluid privacy-main-section py-6"> <!-- Added privacy-main-section class -->
                <div class="container">
                     <div class="row justify-content-center">
                         <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.1s">
                            <!-- Added Content Wrapper -->
                            <div class="privacy-content-wrapper">
    
                                <p><strong>Effective Date:</strong> October 26, 2024 </p>
    
                                <!-- Added IDs to H2 for icons -->
                                <h2 id="intro">. Introduction</h2>
                                <p>Welcome to Golden Memories Safaris ("Company", "we", "us", "our"). We are committed to protecting the privacy and security of your personal information. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website [Your Website URL - e.g., www.gmsafaris.co.tz], use our services, or communicate with us.</p>
                                <p>Please read this privacy policy carefully. If you do not agree with the terms of this privacy policy, please do not access the site or use our services.</p>
    
                                <h2 id="info-collect">. Information We Collect</h2>
                                <p>We may collect information about you in a variety of ways. The information we may collect includes:</p>
                                <h3>Personal Data</h3>
                                <p>Personally identifiable information, such as your name, shipping address, email address, telephone number, passport details, dietary requirements, health conditions relevant to travel, and demographic information, such as your age, gender, hometown, and interests, that you voluntarily give to us when you register with the site, inquire about or book our services.</p>
                                <h3>Derivative Data</h3>
                                <p>Information our servers automatically collect when you access the Site, such as your IP address, your browser type, your operating system, your access times, and the pages you have viewed directly before and after accessing the Site. </p>
                                 <h3>Financial Data</h3>
                                 <p>Financial information, such as data related to your payment method (e.g., valid credit card number, card brand, expiration date) that we may collect when you purchase, order, return, or exchange services from us. [Adapt this: We store only very limited, if any, financial information. Otherwise, all financial information is stored by our payment processor, [Payment Processor Name(s)], and you are encouraged to review their privacy policy and contact them directly for responses to your questions.]</p>
                                <h3>Travel Information</h3>
                                <p>Details related to your travel plans, including flight information, travel companion details (if provided), insurance details, visa information, and preferences related to your safari or tour.</p>
    
                                <h2 id="how-use">. How We Use Your Information</h2>
                                <p>Having accurate information about you permits us to provide you with a smooth, efficient, and customized experience. Specifically, we may use information collected about you to:</p>
                                <ul>
                                    <li>Create and manage your booking and account.</li>
                                    <li>Process your payments and refunds.</li>
                                    <li>Communicate with you regarding your booking, inquiries, or requests.</li>
                                    <li>Provide you with personalized service and recommendations.</li>
                                    <li>Arrange necessary travel components (flights, accommodation, park permits, etc.).</li>
                                    <li>Email you regarding your account or order.</li>
                                    <li>Send you newsletters, promotions, and information about special offers (with your consent, where required).</li>
                                    <li>Improve our website and service offerings.</li>
                                    <li>Comply with legal and regulatory obligations.</li>
                                    <li>Ensure the health and safety of our clients during tours.</li>
                                </ul>
    
                                <h2 id="disclosure">. Disclosure of Your Information</h2>
                                <p>We may share information we have collected about you in certain situations. Your information may be disclosed as follows:</p>
                                <h3>By Law or to Protect Rights</h3>
                                <p>If we believe the release of information about you is necessary to respond to legal process, to investigate or remedy potential violations of our policies, or to protect the rights, property, and safety of others, we may share your information as permitted or required by any applicable law, rule, or regulation.</p>
                                <h3>Third-Party Service Providers</h3>
                                <p>We may share your information with third parties that perform services for us or on our behalf, including payment processing, data analysis, email delivery, hosting services, customer service, accommodation providers, airlines, ground handlers, and marketing assistance.</p>
                                 <h3>Business Transfers</h3>
                                <p>We may share or transfer your information in connection with, or during negotiations of, any merger, sale of company assets, financing, or acquisition of all or a portion of our business to another company.</p>
                                <p><strong>We do not sell your personal information to third parties.</strong></p>
    
                                <h2 id="security">. Data Security</h2>
                                <p>We use administrative, technical, and physical security measures to help protect your personal information. While we have taken reasonable steps to secure the personal information you provide to us, please be aware that despite our efforts, no security measures are perfect or impenetrable, and no method of data transmission can be guaranteed against any interception or other type of misuse.</p>
    
                                <h2 id="retention">. Data Retention</h2>
                                <p>We will only retain your personal information for as long as necessary to fulfill the purposes we collected it for, including for the purposes of satisfying any legal, accounting, or reporting requirements. To determine the appropriate retention period for personal data, we consider the amount, nature, and sensitivity of the personal data, the potential risk of harm from unauthorized use or disclosure of your personal data, the purposes for which we process your personal data and whether we can achieve those purposes through other means, and the applicable legal requirements.</p>
    
                                <h2 id="rights">. Your Data Protection Rights</h2>
                                <p>Depending on your location, you may have the following rights regarding your personal data:</p>
                                <ul>
                                    <li><strong>The right to access</strong> – You have the right to request copies of your personal data.</li>
                                    <li><strong>The right to rectification</strong> – You have the right to request that we correct any information you believe is inaccurate or complete information you believe is incomplete.</li>
                                    <li><strong>The right to erasure</strong> – You have the right to request that we erase your personal data, under certain conditions.</li>
                                    <li><strong>The right to restrict processing</strong> – You have the right to request that we restrict the processing of your personal data, under certain conditions.</li>
                                    <li><strong>The right to object to processing</strong> – You have the right to object to our processing of your personal data, under certain conditions.</li>
                                    <li><strong>The right to data portability</strong> – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.</li>
                                </ul>
                                <p>If you would like to exercise any of these rights, please contact us using the contact information provided below.</p>
    
                                <h2 id="cookies">. Cookies and Tracking Technologies</h2>
                                <p>We may use cookies, web beacons, tracking pixels, and other tracking technologies on the Site to help customize the Site and improve your experience. When you access the Site, your personal information is not collected through the use of tracking technology. Most browsers are set to accept cookies by default. You can remove or reject cookies, but be aware that such action could affect the availability and functionality of the Site. [Consider linking to a more detailed Cookie Policy if applicable].</p>
    
                                <h2 id="third-party">. Third-Party Websites</h2>
                                <p>The Site may contain links to third-party websites and applications of interest, including advertisements and external services, that are not affiliated with us. Once you have used these links to leave the Site, any information you provide to these third parties is not covered by this Privacy Policy, and we cannot guarantee the safety and privacy of your information.</p>
    
                                 <h2 id="children">. Children's Privacy</h2>
                                <p>We do not knowingly solicit information from or market to children under the age of 13 [Adjust age if necessary based on regulations like GDPR - often 16]. If we learn that we have collected personal information from a child under the relevant age without verification of parental consent, we will delete that information as quickly as possible. If you believe we might have any information from or about a child under the relevant age, please contact us.</p>
    
                                <h2 id="changes">. Changes to This Privacy Policy</h2>
                                <p>We may update this Privacy Policy from time to time in order to reflect, for example, changes to our practices or for other operational, legal, or regulatory reasons. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Effective Date" at the top.</p>
    
                                <h2 id="contact">. Contact Us</h2>
                                <!-- Added Contact Info Box Wrapper -->
                                 <div class="contact-info-box">
                                    <p>If you have questions or comments about this Privacy Policy, please contact us at:</p>
                                    <p>
                                        <strong>Golden Memories Safaris</strong><br>
                                        
                                        Email: <a href="mailto:info@gmsafaris.co.tz">info@gmsafaris.co.tz</a><br>
                                        Phone: <a href="tel:+255786383273">+255 786 383 273</a>
                                    </p>
                                </div> <!-- End Contact Info Box -->
    
                            </div> <!-- End Content Wrapper -->
                         </div>
                     </div>
                </div>
            </div>

@endsection
