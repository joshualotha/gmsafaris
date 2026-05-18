<!-- Footer Start -->
<div class="container-fluid footer py-6 my-6 mb-0 bg-light wow bounceInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row">

            <!-- Column 1: Brand + Contact -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <a href="{{ route('home') }}">
                        <img src="{{ site_image('logo') }}" alt="Golden Memories Safaris Logo" class="footer-logo mb-3"
                            width="180" height="40">
                    </a>
                    <p class="text-muted small mb-3">Locally owned Tanzanian safari operator crafting authentic wildlife adventures since 2023.</p>
                    <div class="d-flex flex-column align-items-start mb-3">
                        <p class="mb-1 small"><i class="fa fa-map-marker-alt text-primary me-2"></i> Arusha, Tanzania</p>
                        <p class="mb-1 small"><i class="fa fa-phone-alt text-primary me-2"></i> +255 786 383 273</p>
                        <p class="mb-1 small"><i class="fas fa-envelope text-primary me-2"></i> info@gmsafaris.co.tz</p>
                        <p class="mb-1 small"><i class="fa fa-clock text-primary me-2"></i> Mon-Sun: 8AM - 6PM</p>
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

            <!-- Column 2: Safari Services -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="mb-4">Safari Types</h4>
                    <div class="d-flex flex-column align-items-start">
                        <a class="text-body mb-2" href="{{ route('safaris') }}"><i
                                class="fa fa-chevron-right text-primary me-2" style="font-size: 0.65rem;"></i>All Safari Packages</a>
                        <a class="text-body mb-2" href="{{ route('luxurysafari') }}"><i
                                class="fa fa-chevron-right text-primary me-2" style="font-size: 0.65rem;"></i>Luxury Safaris</a>
                        <a class="text-body mb-2" href="{{ route('tailoredsafaris') }}"><i
                                class="fa fa-chevron-right text-primary me-2" style="font-size: 0.65rem;"></i>Tailored Safaris</a>
                        <a class="text-body mb-2" href="{{ route('groupsafaris') }}"><i
                                class="fa fa-chevron-right text-primary me-2" style="font-size: 0.65rem;"></i>Group Safaris</a>
                        <a class="text-body mb-2" href="{{ route('budgetsafari') }}"><i
                                class="fa fa-chevron-right text-primary me-2" style="font-size: 0.65rem;"></i>Budget Safaris</a>
                        <a class="text-body mb-2" href="{{ route('zanzibarbeachholiday') }}"><i
                                class="fa fa-chevron-right text-primary me-2" style="font-size: 0.65rem;"></i>Zanzibar Holidays</a>
                        <a class="text-body mb-2" href="{{ route('mountaintrekking') }}"><i
                                class="fa fa-chevron-right text-primary me-2" style="font-size: 0.65rem;"></i>Mountain Trekking</a>
                    </div>
                </div>
            </div>

            <!-- Column 3: Travel Resources -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="mb-4">Travel Resources</h4>
                    <div class="d-flex flex-column align-items-start">
                        <a class="text-body mb-2" href="{{ route('besttimetovisit') }}"><i
                                class="fa fa-chevron-right text-primary me-2" style="font-size: 0.65rem;"></i>Best Time to Visit</a>
                        <a class="text-body mb-2" href="{{ route('destinations') }}"><i
                                class="fa fa-chevron-right text-primary me-2" style="font-size: 0.65rem;"></i>Destinations</a>
                        <a class="text-body mb-2" href="{{ route('blog') }}"><i
                                class="fa fa-chevron-right text-primary me-2" style="font-size: 0.65rem;"></i>Safari Blog</a>
                        <a class="text-body mb-2" href="{{ route('visa') }}"><i
                                class="fa fa-chevron-right text-primary me-2" style="font-size: 0.65rem;"></i>Visa Information</a>
                        <a class="text-body mb-2" href="{{ route('healthandsafety') }}"><i
                                class="fa fa-chevron-right text-primary me-2" style="font-size: 0.65rem;"></i>Health & Safety</a>
                        <a class="text-body mb-2" href="{{ route('kilimanjaroroutes') }}"><i
                                class="fa fa-chevron-right text-primary me-2" style="font-size: 0.65rem;"></i>Kilimanjaro Routes</a>
                        <a class="text-body mb-2" href="{{ route('testimonial') }}"><i
                                class="fa fa-chevron-right text-primary me-2" style="font-size: 0.65rem;"></i>Traveler Reviews</a>
                    </div>
                </div>
            </div>

            <!-- Column 4: Reviews & Trust -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="mb-3">Our Reviews</h4>
                    <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
                        <li>
                            <a href="https://www.safaribookings.com/p6202" target="_blank" rel="noopener noreferrer" class="text-decoration-none">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="text-warning" style="font-size: 0.85rem; letter-spacing: 1px;">★★★★★</span>
                                    <strong class="text-dark small">5.0</strong>
                                </div>
                                <span class="text-muted" style="font-size: 0.7rem;">SafariBookings — 31 reviews</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.google.com/maps?cid=16212065552752872733" target="_blank" rel="noopener noreferrer" class="text-decoration-none">
                                <div class="d-flex align-items-center gap-2">
                                    <span style="font-size: 0.85rem; letter-spacing: 1px; color: #4285F4;">★★★★★</span>
                                    <strong class="text-dark small">5.0</strong>
                                </div>
                                <span class="text-muted" style="font-size: 0.7rem;">Google — 10+ reviews</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.tripadvisor.com/Attraction_Review-g297913-d27751442-Reviews-GOLDEN_MEMORIES_SAFARIS-Arusha_Arusha_Region.html" target="_blank" rel="noopener noreferrer" class="text-decoration-none">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="text-success" style="font-size: 0.85rem; letter-spacing: 1px;">★★★★★</span>
                                    <strong class="text-dark small">5.0</strong>
                                </div>
                                <span class="text-muted" style="font-size: 0.7rem;">TripAdvisor — 9 reviews</span>
                            </a>
                        </li>
                    </ul>
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
