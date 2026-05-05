@extends('layouts.app')

@section('title', 'Book Your Safari - Golden Memories Safaris')
@section('keywords', 'Tanzania safari booking, book safari online, safari reservation, multi-step booking')
@section('description', 'Book your dream Tanzania safari in 4 easy steps. Select your package, dates, preferences, and submit your booking request.')
@section('canonical', 'https://www.gmsafaris.co.tz/booking')
@section('og_title', 'Book Your Safari - Golden Memories Safaris')
@section('og_description', 'Book your dream Tanzania safari in 4 easy steps.')
@section('og_url', 'https://www.gmsafaris.co.tz/booking')
@section('og_image', asset('img/logo.png'))
@section('twitter_title', 'Book Your Safari - Golden Memories Safaris')
@section('twitter_description', 'Book your dream Tanzania safari in 4 easy steps.')

@section('extra_styles')
<style>
    .booking-step-indicator { display: flex; justify-content: center; margin-bottom: 3rem; gap: 0; }
    .step-item { display: flex; align-items: center; }
    .step-circle { width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.9rem; border: 2px solid #dee2e6; background: #fff; color: #6c757d; transition: all 0.3s ease; }
    .step-circle.active { border-color: var(--bs-primary); background: var(--bs-primary); color: #fff; }
    .step-circle.completed { border-color: #28a745; background: #28a745; color: #fff; }
    .step-label { font-size: 0.75rem; margin-top: 0.3rem; color: #6c757d; text-align: center; }
    .step-label.active { color: var(--bs-primary); font-weight: 600; }
    .step-label.completed { color: #28a745; font-weight: 600; }
    .step-connector { width: 60px; height: 2px; background: #dee2e6; margin: 0 0.5rem; margin-bottom: 1.2rem; }
    .step-connector.completed { background: #28a745; }

    .booking-step { display: none; }
    .booking-step.active { display: block; animation: fadeIn 0.4s ease; }

    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

    .summary-card { background: #f8f9fa; border-radius: 0.5rem; padding: 1.5rem; margin-bottom: 1rem; }
    .summary-card h6 { color: var(--bs-primary); border-bottom: 1px solid #dee2e6; padding-bottom: 0.5rem; margin-bottom: 1rem; }
    .summary-row { display: flex; justify-content: space-between; padding: 0.3rem 0; }
    .summary-row .label { color: #6c757d; }
    .summary-row .value { font-weight: 600; }

    .page-header-booking {
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset("img/hero-1.jpg") }}') center center no-repeat;
        background-size: cover;
    }
</style>
@endsection

@section('structured_data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://www.gmsafaris.co.tz/" },
        { "@type": "ListItem", "position": 2, "name": "Book Your Safari", "item": "https://www.gmsafaris.co.tz/booking" }
    ]
}
</script>
@endsection

@section('body_content')

    <!-- Page Header -->
    <div class="container-fluid page-header-booking py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Book Your Safari</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Booking</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Booking Form Section -->
    <div class="container-fluid py-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="text-center mb-5">
                        <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Plan Your Adventure</small>
                        <h1 class="display-5 mb-3">Book Your Dream Safari in 4 Easy Steps</h1>
                        <p class="lead text-muted">Fill out the details below and our safari specialists will contact you within 24 hours with a personalized quote.</p>
                    </div>

                    <!-- Step Indicator -->
                    <div class="booking-step-indicator mb-5" id="stepIndicator">
                        <div class="step-item">
                            <div class="d-flex flex-column align-items-center">
                                <div class="step-circle active" id="stepCircle1">1</div>
                                <small class="step-label active" id="stepLabel1">Package & Dates</small>
                            </div>
                        </div>
                        <div class="step-connector" id="stepConnector1"></div>
                        <div class="step-item">
                            <div class="d-flex flex-column align-items-center">
                                <div class="step-circle" id="stepCircle2">2</div>
                                <small class="step-label" id="stepLabel2">Travelers & Preferences</small>
                            </div>
                        </div>
                        <div class="step-connector" id="stepConnector2"></div>
                        <div class="step-item">
                            <div class="d-flex flex-column align-items-center">
                                <div class="step-circle" id="stepCircle3">3</div>
                                <small class="step-label" id="stepLabel3">Contact Info</small>
                            </div>
                        </div>
                        <div class="step-connector" id="stepConnector3"></div>
                        <div class="step-item">
                            <div class="d-flex flex-column align-items-center">
                                <div class="step-circle" id="stepCircle4">4</div>
                                <small class="step-label" id="stepLabel4">Review & Submit</small>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm border-light p-4 p-md-5">
                        <form id="bookingForm" method="POST" action="{{ route('booking.submit') }}">
                            @csrf

                            <!-- ===== STEP 1: Package & Dates ===== -->
                            <div class="booking-step active" id="step1">
                                <h4 class="mb-4 text-primary border-bottom pb-2"><i class="fas fa-map-signs me-2"></i>Step 1: Package & Travel Dates</h4>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label for="safari_id" class="form-label">Select Safari Package <span class="text-danger">*</span></label>
                                        <select class="form-select" id="safari_id" name="safari_id">
                                            <option value="">-- Select a package (optional) --</option>
                                            @foreach($safaris as $safari)
                                                <option value="{{ $safari->id }}"
                                                    data-duration="{{ $safari->duration }}"
                                                    data-price="{{ $safari->price_from }}"
                                                    {{ $selectedSafari && $selectedSafari->id === $safari->id ? 'selected' : '' }}>
                                                    {{ $safari->title }} ({{ $safari->duration ?? 'N/A' }})
                                                </option>
                                            @endforeach
                                        </select>
                                        <small class="form-text text-muted">Select a package if you have one in mind, or leave blank for a custom safari.</small>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="duration" class="form-label">Desired Trip Duration <span class="text-danger">*</span></label>
                                        <select class="form-select" id="duration" name="duration" required>
                                            <option value="" disabled {{ empty($bookingData['step1']['duration']) ? 'selected' : '' }}>Please select...</option>
                                            <option value="2-3 Days" {{ ($bookingData['step1']['duration'] ?? '') == '2-3 Days' ? 'selected' : '' }}>2-3 Days</option>
                                            <option value="4-5 Days" {{ ($bookingData['step1']['duration'] ?? '') == '4-5 Days' ? 'selected' : '' }}>4-5 Days</option>
                                            <option value="6-8 Days" {{ ($bookingData['step1']['duration'] ?? '') == '6-8 Days' ? 'selected' : '' }}>6-8 Days</option>
                                            <option value="9-12 Days" {{ ($bookingData['step1']['duration'] ?? '') == '9-12 Days' ? 'selected' : '' }}>9-12 Days</option>
                                            <option value="13-15 Days" {{ ($bookingData['step1']['duration'] ?? '') == '13-15 Days' ? 'selected' : '' }}>13-15 Days</option>
                                            <option value="16+ Days" {{ ($bookingData['step1']['duration'] ?? '') == '16+ Days' ? 'selected' : '' }}>16+ Days</option>
                                            <option value="Flexible" {{ ($bookingData['step1']['duration'] ?? '') == 'Flexible' ? 'selected' : '' }}>Flexible</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="travel_month" class="form-label">Preferred Travel Month / Dates <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="travel_month" name="travel_month"
                                            placeholder="e.g., July 2025, or Mid-September"
                                            value="{{ $bookingData['step1']['travel_month'] ?? '' }}" required>
                                        <small class="form-text text-muted">Approximate dates are fine if you're flexible.</small>
                                    </div>

                                    <div class="col-12" id="packageInfo" style="display: none;">
                                        <div class="alert alert-info">
                                            <strong><i class="fas fa-info-circle me-2"></i>Selected Package:</strong>
                                            <span id="packageInfoText"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-end mt-4">
                                    <button type="button" class="btn btn-primary rounded-pill px-5 py-3" onclick="goToStep(2)">
                                        Next Step <i class="fas fa-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- ===== STEP 2: Travelers & Preferences ===== -->
                            <div class="booking-step" id="step2">
                                <h4 class="mb-4 text-primary border-bottom pb-2"><i class="fas fa-users me-2"></i>Step 2: Travelers & Preferences</h4>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="number_of_adults" class="form-label">Number of Adults (18+) <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="number_of_adults" name="number_of_adults"
                                            min="1" max="50" value="{{ $bookingData['step2']['number_of_adults'] ?? 2 }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="number_of_children" class="form-label">Number of Children (0-17)</label>
                                        <input type="number" class="form-control" id="number_of_children" name="number_of_children"
                                            min="0" max="50" value="{{ $bookingData['step2']['number_of_children'] ?? 0 }}">
                                        <small class="form-text text-muted">Please provide ages in special requests below.</small>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="accommodation_style" class="form-label">Preferred Accommodation Style <span class="text-danger">*</span></label>
                                        <select class="form-select" id="accommodation_style" name="accommodation_style" required>
                                            <option value="" disabled {{ empty($bookingData['step2']['accommodation_style']) ? 'selected' : '' }}>Please select...</option>
                                            <option value="Budget Camping" {{ ($bookingData['step2']['accommodation_style'] ?? '') == 'Budget Camping' ? 'selected' : '' }}>Budget Camping (Basic)</option>
                                            <option value="Mid-Range Lodges" {{ ($bookingData['step2']['accommodation_style'] ?? '') == 'Mid-Range Lodges' ? 'selected' : '' }}>Mid-Range Lodges / Tented Camps (Comfortable)</option>
                                            <option value="Luxury Tented Camps" {{ ($bookingData['step2']['accommodation_style'] ?? '') == 'Luxury Tented Camps' ? 'selected' : '' }}>Luxury Tented Camps (Semi-Luxury)</option>
                                            <option value="Premium Lodges" {{ ($bookingData['step2']['accommodation_style'] ?? '') == 'Premium Lodges' ? 'selected' : '' }}>Premium / Luxury Lodges (High-End)</option>
                                            <option value="Mixed Styles" {{ ($bookingData['step2']['accommodation_style'] ?? '') == 'Mixed Styles' ? 'selected' : '' }}>Mix of Styles</option>
                                            <option value="Unsure" {{ ($bookingData['step2']['accommodation_style'] ?? '') == 'Unsure' ? 'selected' : '' }}>Unsure / Recommendations Welcome</option>
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label for="preferred_destinations" class="form-label">Preferred Destinations (Optional)</label>
                                        <input type="text" class="form-control" id="preferred_destinations" name="preferred_destinations"
                                            placeholder="e.g., Serengeti, Ngorongoro, Tarangire, Zanzibar"
                                            value="{{ $bookingData['step2']['preferred_destinations'] ?? '' }}">
                                        <small class="form-text text-muted">Leave blank if unsure or flexible.</small>
                                    </div>

                                    <div class="col-12">
                                        <label for="special_requests" class="form-label">Special Requests, Interests, or Questions</label>
                                        <textarea class="form-control" id="special_requests" name="special_requests" rows="4"
                                            placeholder="Tell us more! e.g., Special occasions (honeymoon, anniversary), specific animals you hope to see, dietary needs, accessibility requirements, children's ages, preferred activities (balloon safari, walking safari), etc.">{{ $bookingData['step2']['special_requests'] ?? '' }}</textarea>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4 py-3" onclick="goToStep(1)">
                                        <i class="fas fa-arrow-left me-2"></i> Previous
                                    </button>
                                    <button type="button" class="btn btn-primary rounded-pill px-5 py-3" onclick="goToStep(3)">
                                        Next Step <i class="fas fa-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- ===== STEP 3: Contact Information ===== -->
                            <div class="booking-step" id="step3">
                                <h4 class="mb-4 text-primary border-bottom pb-2"><i class="fas fa-user-circle me-2"></i>Step 3: Contact Information</h4>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="first_name" class="form-label">First Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                            placeholder="Enter your first name"
                                            value="{{ $bookingData['step3']['first_name'] ?? '' }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="last_name" class="form-label">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                            placeholder="Enter your last name"
                                            value="{{ $bookingData['step3']['last_name'] ?? '' }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter your email"
                                            value="{{ $bookingData['step3']['email'] ?? '' }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                        <input type="tel" class="form-control" id="phone" name="phone"
                                            placeholder="Include country code (e.g., +1...)"
                                            value="{{ $bookingData['step3']['phone'] ?? '' }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="country" class="form-label">Country of Residence <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="country" name="country"
                                            placeholder="Enter your country"
                                            value="{{ $bookingData['step3']['country'] ?? '' }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="hear_about_us" class="form-label">How did you hear about us? (Optional)</label>
                                        <select class="form-select" id="hear_about_us" name="hear_about_us">
                                            <option value="" {{ empty($bookingData['step3']['hear_about_us']) ? 'selected' : '' }}>Please select...</option>
                                            <option value="Google Search" {{ ($bookingData['step3']['hear_about_us'] ?? '') == 'Google Search' ? 'selected' : '' }}>Google Search</option>
                                            <option value="Social Media" {{ ($bookingData['step3']['hear_about_us'] ?? '') == 'Social Media' ? 'selected' : '' }}>Social Media (Facebook, Instagram, etc.)</option>
                                            <option value="Friend/Family" {{ ($bookingData['step3']['hear_about_us'] ?? '') == 'Friend/Family' ? 'selected' : '' }}>Friend/Family Recommendation</option>
                                            <option value="Travel Blog" {{ ($bookingData['step3']['hear_about_us'] ?? '') == 'Travel Blog' ? 'selected' : '' }}>Travel Blog/Website</option>
                                            <option value="TripAdvisor" {{ ($bookingData['step3']['hear_about_us'] ?? '') == 'TripAdvisor' ? 'selected' : '' }}>TripAdvisor</option>
                                            <option value="Other" {{ ($bookingData['step3']['hear_about_us'] ?? '') == 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4 py-3" onclick="goToStep(2)">
                                        <i class="fas fa-arrow-left me-2"></i> Previous
                                    </button>
                                    <button type="button" class="btn btn-primary rounded-pill px-5 py-3" onclick="goToStep(4)">
                                        Next Step <i class="fas fa-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- ===== STEP 4: Review & Submit ===== -->
                            <div class="booking-step" id="step4">
                                <h4 class="mb-4 text-primary border-bottom pb-2"><i class="fas fa-check-circle me-2"></i>Step 4: Review Your Booking</h4>
                                <p class="text-muted mb-4">Please review all the details below before submitting your booking request.</p>

                                <div class="summary-card">
                                    <h6><i class="fas fa-map-signs me-2"></i>Package & Dates</h6>
                                    <div class="summary-row">
                                        <span class="label">Package</span>
                                        <span class="value" id="reviewPackage">—</span>
                                    </div>
                                    <div class="summary-row">
                                        <span class="label">Duration</span>
                                        <span class="value" id="reviewDuration">—</span>
                                    </div>
                                    <div class="summary-row">
                                        <span class="label">Travel Month</span>
                                        <span class="value" id="reviewTravelMonth">—</span>
                                    </div>
                                </div>

                                <div class="summary-card">
                                    <h6><i class="fas fa-users me-2"></i>Travelers & Preferences</h6>
                                    <div class="summary-row">
                                        <span class="label">Adults</span>
                                        <span class="value" id="reviewAdults">—</span>
                                    </div>
                                    <div class="summary-row">
                                        <span class="label">Children</span>
                                        <span class="value" id="reviewChildren">—</span>
                                    </div>
                                    <div class="summary-row">
                                        <span class="label">Accommodation</span>
                                        <span class="value" id="reviewAccommodation">—</span>
                                    </div>
                                    <div class="summary-row">
                                        <span class="label">Destinations</span>
                                        <span class="value" id="reviewDestinations">—</span>
                                    </div>
                                    <div class="summary-row">
                                        <span class="label">Special Requests</span>
                                        <span class="value" id="reviewRequests">—</span>
                                    </div>
                                </div>

                                <div class="summary-card">
                                    <h6><i class="fas fa-user-circle me-2"></i>Contact Information</h6>
                                    <div class="summary-row">
                                        <span class="label">Name</span>
                                        <span class="value" id="reviewName">—</span>
                                    </div>
                                    <div class="summary-row">
                                        <span class="label">Email</span>
                                        <span class="value" id="reviewEmail">—</span>
                                    </div>
                                    <div class="summary-row">
                                        <span class="label">Phone</span>
                                        <span class="value" id="reviewPhone">—</span>
                                    </div>
                                    <div class="summary-row">
                                        <span class="label">Country</span>
                                        <span class="value" id="reviewCountry">—</span>
                                    </div>
                                </div>

                                <div class="alert alert-info mt-3">
                                    <i class="fas fa-info-circle me-2"></i>
                                    By submitting this booking request, you agree to our
                                    <a href="{{ route('privacypolicy') }}" target="_blank">Privacy Policy</a>.
                                    One of our safari specialists will contact you within 24 hours.
                                </div>

                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4 py-3" onclick="goToStep(3)">
                                        <i class="fas fa-arrow-left me-2"></i> Previous
                                    </button>
                                    <button type="submit" class="btn btn-success rounded-pill px-5 py-3">
                                        <i class="fas fa-paper-plane me-2"></i> Submit Booking Request
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="text-center mt-5">
                        <p class="lead">Prefer to talk directly? Call us or send an email:</p>
                        <p><i class="fa fa-phone-alt text-primary me-2"></i><a href="tel:+255786383273">+255 786 383 273</a></p>
                        <p><i class="fas fa-envelope text-primary me-2"></i><a href="mailto:info@gmsafaris.co.tz">info@gmsafaris.co.tz</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra_scripts')
<script>
$(document).ready(function() {
    // ===== STEP NAVIGATION =====
    window.goToStep = function(step) {
        var currentStep = $('.booking-step.active').attr('id');
        var stepNum = parseInt(currentStep.replace('step', ''));

        if (step > stepNum) {
            if (!validateStep(stepNum)) {
                return;
            }
            saveStep(stepNum, step);
        } else {
            showStep(step);
        }
    };

    function showStep(step) {
        $('.booking-step').removeClass('active');
        $('#step' + step).addClass('active');

        for (var i = 1; i <= 4; i++) {
            var circle = $('#stepCircle' + i);
            var label = $('#stepLabel' + i);
            var connector = $('#stepConnector' + (i - 1));

            circle.removeClass('active completed');
            label.removeClass('active completed');

            if (i < step) {
                circle.addClass('completed');
                label.addClass('completed');
                if (connector.length) connector.addClass('completed');
            } else if (i === step) {
                circle.addClass('active');
                label.addClass('active');
            } else {
                if (connector.length) connector.removeClass('completed');
            }
        }

        if (step === 4) {
            populateReview();
        }

        $('html, body').animate({
            scrollTop: $('#bookingForm').offset().top - 100
        }, 300);
    }

    // ===== FORM VALIDATION =====
    function validateStep(step) {
        var valid = true;
        var $step = $('#step' + step);
        $step.find('.is-invalid').removeClass('is-invalid');
        $step.find('.invalid-feedback').remove();

        if (step === 1) {
            var duration = $('#duration').val();
            var travelMonth = $('#travel_month').val().trim();

            if (!duration) {
                $('#duration').addClass('is-invalid');
                $('#duration').after('<div class="invalid-feedback">Please select your desired trip duration.</div>');
                valid = false;
            }
            if (!travelMonth) {
                $('#travel_month').addClass('is-invalid');
                $('#travel_month').after('<div class="invalid-feedback">Please enter your preferred travel month or dates.</div>');
                valid = false;
            }
        } else if (step === 2) {
            var adults = parseInt($('#number_of_adults').val()) || 0;
            var accommodation = $('#accommodation_style').val();

            if (adults < 1) {
                $('#number_of_adults').addClass('is-invalid');
                $('#number_of_adults').after('<div class="invalid-feedback">At least 1 adult is required.</div>');
                valid = false;
            }
            if (!accommodation) {
                $('#accommodation_style').addClass('is-invalid');
                $('#accommodation_style').after('<div class="invalid-feedback">Please select your preferred accommodation style.</div>');
                valid = false;
            }
        } else if (step === 3) {
            var firstName = $('#first_name').val().trim();
            var lastName = $('#last_name').val().trim();
            var email = $('#email').val().trim();
            var phone = $('#phone').val().trim();
            var country = $('#country').val().trim();

            if (!firstName) {
                $('#first_name').addClass('is-invalid');
                $('#first_name').after('<div class="invalid-feedback">Please enter your first name.</div>');
                valid = false;
            }
            if (!lastName) {
                $('#last_name').addClass('is-invalid');
                $('#last_name').after('<div class="invalid-feedback">Please enter your last name.</div>');
                valid = false;
            }
            if (!email) {
                $('#email').addClass('is-invalid');
                $('#email').after('<div class="invalid-feedback">Please enter your email address.</div>');
                valid = false;
            } else if (!isValidEmail(email)) {
                $('#email').addClass('is-invalid');
                $('#email').after('<div class="invalid-feedback">Please enter a valid email address.</div>');
                valid = false;
            }
            if (!phone) {
                $('#phone').addClass('is-invalid');
                $('#phone').after('<div class="invalid-feedback">Please enter your phone number.</div>');
                valid = false;
            }
            if (!country) {
                $('#country').addClass('is-invalid');
                $('#country').after('<div class="invalid-feedback">Please enter your country of residence.</div>');
                valid = false;
            }
        }

        return valid;
    }

    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    // ===== AJAX SAVE =====
    function saveStep(currentStep, nextStep) {
        var formData = getStepData(currentStep);
        var url = '';

        if (currentStep === 1) url = '{{ route("booking.step1") }}';
        else if (currentStep === 2) url = '{{ route("booking.step2") }}';
        else if (currentStep === 3) url = '{{ route("booking.step3") }}';

        if (!url) {
            showStep(nextStep);
            return;
        }

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    showStep(nextStep);
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    var $step = $('#step' + currentStep);
                    $step.find('.is-invalid').removeClass('is-invalid');
                    $step.find('.invalid-feedback').remove();

                    $.each(errors, function(field, messages) {
                        var $input = $('#' + field);
                        if ($input.length) {
                            $input.addClass('is-invalid');
                            $input.after('<div class="invalid-feedback">' + messages[0] + '</div>');
                        }
                    });
                } else {
                    showStep(nextStep);
                }
            }
        });
    }

    function getStepData(step) {
        var data = {};
        if (step === 1) {
            data.safari_id = $('#safari_id').val();
            data.duration = $('#duration').val();
            data.travel_month = $('#travel_month').val();
        } else if (step === 2) {
            data.number_of_adults = $('#number_of_adults').val();
            data.number_of_children = $('#number_of_children').val();
            data.accommodation_style = $('#accommodation_style').val();
            data.preferred_destinations = $('#preferred_destinations').val();
            data.special_requests = $('#special_requests').val();
        } else if (step === 3) {
            data.first_name = $('#first_name').val();
            data.last_name = $('#last_name').val();
            data.email = $('#email').val();
            data.phone = $('#phone').val();
            data.country = $('#country').val();
            data.hear_about_us = $('#hear_about_us').val();
        }
        return data;
    }

    // ===== REVIEW POPULATION =====
    function populateReview() {
        var safariSelect = $('#safari_id option:selected');
        var packageName = safariSelect.length ? safariSelect.text() : 'Custom Safari';
        if ($('#safari_id').val() === '') packageName = 'Custom Safari (No specific package)';

        $('#reviewPackage').text(packageName);
        $('#reviewDuration').text($('#duration').val() || '—');
        $('#reviewTravelMonth').text($('#travel_month').val() || '—');

        $('#reviewAdults').text($('#number_of_adults').val() || '—');
        $('#reviewChildren').text($('#number_of_children').val() || '0');
        $('#reviewAccommodation').text($('#accommodation_style option:selected').text() || '—');
        $('#reviewDestinations').text($('#preferred_destinations').val() || 'None specified');
        $('#reviewRequests').text($('#special_requests').val() || 'None');

        var firstName = $('#first_name').val() || '';
        var lastName = $('#last_name').val() || '';
        $('#reviewName').text(firstName + ' ' + lastName);
        $('#reviewEmail').text($('#email').val() || '—');
        $('#reviewPhone').text($('#phone').val() || '—');
        $('#reviewCountry').text($('#country').val() || '—');
    }

    // ===== PACKAGE AUTO-FILL =====
    $('#safari_id').on('change', function() {
        var selected = $(this).find('option:selected');
        var duration = selected.data('duration');
        var price = selected.data('price');

        if (duration) {
            var durationStr = String(duration);
            var $durationSelect = $('#duration');
            var matched = false;

            $durationSelect.find('option').each(function() {
                if ($(this).val().toLowerCase().includes(durationStr.toLowerCase()) ||
                    durationStr.toLowerCase().includes($(this).val().toLowerCase())) {
                    $durationSelect.val($(this).val());
                    matched = true;
                    return false;
                }
            });

            var numMatch = durationStr.match(/(\d+)/);
            if (!matched && numMatch) {
                var days = parseInt(numMatch[1]);
                $durationSelect.find('option').each(function() {
                    var optVal = $(this).val();
                    var optMatch = optVal.match(/(\d+)/);
                    if (optMatch) {
                        var optDays = parseInt(optMatch[1]);
                        if (optDays >= days - 2 && optDays <= days + 2) {
                            $durationSelect.val($(this).val());
                            return false;
                        }
                    }
                });
            }
        }

        if ($(this).val()) {
            var text = selected.text();
            var info = 'You selected: <strong>' + text + '</strong>';
            if (price) {
                info += ' | Price from: <strong>$' + parseFloat(price).toLocaleString() + '</strong>';
            }
            $('#packageInfoText').html(info);
            $('#packageInfo').slideDown();
        } else {
            $('#packageInfo').slideUp();
        }
    });

    if ($('#safari_id').val()) {
        $('#safari_id').trigger('change');
    }

    // ===== FORM SUBMIT HANDLER =====
    $('#bookingForm').on('submit', function(e) {
        if (!validateStep(3)) {
            showStep(3);
            e.preventDefault();
            return;
        }

        var btn = $(this).find('button[type="submit"]');
        btn.prop('disabled', true);
        btn.html('<span class="spinner-border spinner-border-sm me-2" role="status"></span> Submitting...');
    });

    // ===== INITIAL STATE =====
    var savedStep = {{ $stepData ?? 1 }};
    if (savedStep > 1 && savedStep <= 4) {
        showStep(savedStep);
    }
});
</script>
@endsection