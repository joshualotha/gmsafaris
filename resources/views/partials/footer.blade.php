<!-- Footer Start -->
<div class="container-fluid footer py-6 my-6 mb-0 bg-light wow bounceInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="Golden Memories Safaris Logo" class="footer-logo mb-4"
                            width="180" height="40">
                    </a>
                    <div class="d-flex flex-column align-items-start mb-4">
                        <p class="mb-1"><i class="fa fa-map-marker-alt text-primary me-2"></i> Arusha, Tanzania</p>
                        <p class="mb-1"><i class="fa fa-phone-alt text-primary me-2"></i> +255 786 383 273</p>
                        <p class="mb-1"><i class="fas fa-envelope text-primary me-2"></i> info@gmsafaris.co.tz</p>
                        <p class="mb-1"><i class="fa fa-clock text-primary me-2"></i> Mon-Sun: 8AM - 6PM</p>
                    </div>
                    <div class="footer-icon d-flex">
                        <a class="btn btn-primary btn-sm-square me-2 rounded-circle" href="https://www.facebook.com/gmsafaris" target="_blank"
                            rel="noopener noreferrer" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-sm-square me-2 rounded-circle" href="https://www.tiktok.com/@gmsafaris" target="_blank"
                            rel="noopener noreferrer" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
                        <a href="https://www.instagram.com/gmsafaris/" class="btn btn-primary btn-sm-square me-2 rounded-circle" target="_blank"
                            rel="noopener noreferrer" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/@gmsafaris" class="btn btn-primary btn-sm-square rounded-circle" target="_blank"
                            rel="noopener noreferrer" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="mb-4">Our Services</h4>
                    <div class="d-flex flex-column align-items-start">
                        <a class="text-body mb-2" href="{{ route('tailoredsafaris') }}"><i
                                class="fa fa-check text-primary me-2"></i>Tailored Safaris</a>
                        <a class="text-body mb-2" href="{{ route('luxurysafari') }}"><i
                                class="fa fa-check text-primary me-2"></i>Luxury Safaris</a>
                        <a class="text-body mb-2" href="{{ route('mountaintrekking') }}"><i
                                class="fa fa-check text-primary me-2"></i>Mountain Trekking</a>
                        <a class="text-body mb-2" href="{{ route('groupsafaris') }}"><i
                                class="fa fa-check text-primary me-2"></i>Group Safaris</a>
                        <a class="text-body mb-2" href="{{ url('/ZanzibarArchipelago') }}"><i
                                class="fa fa-check text-primary me-2"></i>Zanzibar Holidays</a>
                        <a class="text-body mb-2" href="{{ route('budgetsafari') }}"><i
                                class="fa fa-check text-primary me-2"></i>Budget Safaris</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="mb-4">Useful Links</h4>
                    <div class="d-flex flex-column align-items-start">
                        <a class="text-body mb-2" href="{{ route('besttimetovisit') }}"><i
                                class="fa fa-check text-primary me-2"></i>Best Time to Visit</a>
                        <a class="text-body mb-2" href="{{ route('localcustoms') }}"><i
                                class="fa fa-check text-primary me-2"></i>Local Customs & Etiquette</a>
                        <a class="text-body mb-2" href="{{ route('healthandsafety') }}"><i
                                class="fa fa-check text-primary me-2"></i>Health & Safety Guide</a>
                        <a class="text-body mb-2" href="{{ route('visa') }}"><i
                                class="fa fa-check text-primary me-2"></i>Visa Information</a>
                        <a class="text-body mb-2" href="{{ route('insuarance') }}"><i
                                class="fa fa-check text-primary me-2"></i>Insurance & Emergency</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="mb-4">Connect & Review</h4>
                    <div class="d-flex flex-column align-items-start">
                        <a class="text-body mb-2" href="https://immigration.go.tz/" target="_blank"
                            rel="noopener noreferrer"><i class="fas fa-passport text-primary me-2"></i>Official
                            eVisa Application</a>
                        <a class="text-body mb-2"
                            href="https://www.tripadvisor.com/Attraction_Review-g297913-d27751442-Reviews-GOLDEN_MEMORIES_SAFARIS-Arusha_Arusha_Region.html"
                            target="_blank" rel="noopener noreferrer"><i
                                class="fas fa-pen text-primary me-2"></i>Review us on TripAdvisor</a>
                        <a class="text-body mb-2"
                            href="https://www.getyourguide.com/golden-memories-safaris-s392921/" target="_blank"
                            rel="noopener noreferrer"><i class="fas fa-route text-primary me-2"></i>Find us on
                            GetYourGuide</a>
                        <a class="text-body mb-2" href="https://immigration.go.tz/index.php/immigration-hq-dodoma"
                            target="_blank" rel="noopener noreferrer"><i
                                class="fas fa-hands-helping text-primary me-2"></i>Contact your Embassy</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Copyright Start -->
<div class="container-fluid copyright bg-dark py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <span class="text-light"><a href="#" class="text-primary"><i
                            class="fas fa-copyright text-light me-2"></i>Golden Memories Safaris</a>. All Rights
                    Reserved.</span>
            </div>
            <div class="col-md-6 my-auto text-center text-md-end text-white">
                <a href="{{ route('privacypolicy') }}" class="text-light me-3">Privacy Policy</a>
                <a href="{{ route('termsandconditions') }}" class="text-light">Terms & Conditions</a>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->

<!-- Back to Top -->
<a href="#" class="btn btn-md-square btn-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>
