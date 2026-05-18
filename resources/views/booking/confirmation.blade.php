@extends('layouts.app')

@section('title', 'Booking Confirmation - Golden Memories Safaris')
@section('keywords', 'Tanzania safari booking confirmation, booking received')
@section('description', 'Your safari booking request has been received. Our team will contact you within 24 hours.')
@section('canonical', 'https://www.gmsafaris.co.tz/booking/confirmation')
@section('og_title', 'Booking Confirmation - Golden Memories Safaris')
@section('og_description', 'Your safari booking request has been received.')

@section('extra_styles')
<style>
    .page-header-confirmation {
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ site_image('hero_fallback_1') }}') center center no-repeat;
        background-size: cover;
    }
    .confirmation-icon {
        font-size: 4rem;
        color: #28a745;
    }
    .detail-label {
        font-weight: 600;
        color: #6c757d;
        min-width: 140px;
    }
    .reference-badge {
        font-size: 1.2rem;
        letter-spacing: 2px;
        background: var(--bs-primary);
        color: #fff;
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        display: inline-block;
    }
</style>
@endsection

@section('body_content')

    <!-- Page Header -->
    <div class="container-fluid page-header-confirmation py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Booking Confirmed!</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('booking.create') }}">Booking</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Confirmation</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Confirmation Content -->
    <div class="container-fluid py-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-5">
                        <div class="confirmation-icon mb-3">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h2 class="display-6 mb-2">Booking Request Received!</h2>
                        <p class="lead text-muted">Thank you, <strong>{{ $booking->full_name }}</strong>!</p>
                        <div class="mt-3">
                            <span class="reference-badge">
                                <i class="fas fa-ticket-alt me-2"></i> Ref: {{ $booking->booking_reference }}
                            </span>
                        </div>
                    </div>

                    <div class="card shadow-sm border-light p-4 mb-4">
                        <h5 class="mb-4 border-bottom pb-2"><i class="fas fa-info-circle text-primary me-2"></i>What Happens Next?</h5>
                        <div class="row">
                            <div class="col-md-4 mb-3 mb-md-0">
                                <div class="text-center">
                                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <h6>Step 1</h6>
                                    <small class="text-muted">Our team reviews your request (within 24 hours)</small>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3 mb-md-0">
                                <div class="text-center">
                                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <h6>Step 2</h6>
                                    <small class="text-muted">A safari specialist contacts you with a personalized quote</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                                        <i class="fas fa-map-marked-alt"></i>
                                    </div>
                                    <h6>Step 3</h6>
                                    <small class="text-muted">We finalize your dream safari itinerary together</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm border-light p-4 mb-4">
                        <h5 class="mb-4 border-bottom pb-2"><i class="fas fa-receipt text-primary me-2"></i>Booking Summary</h5>
                        <div class="row mb-2">
                            <div class="col-sm-4 detail-label">Reference</div>
                            <div class="col-sm-8">{{ $booking->booking_reference }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 detail-label">Package</div>
                            <div class="col-sm-8">{{ $booking->safari ? $booking->safari->title : ($booking->safari_type ?: 'Custom Safari') }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 detail-label">Duration</div>
                            <div class="col-sm-8">{{ $booking->duration ?: 'Flexible' }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 detail-label">Travel Month</div>
                            <div class="col-sm-8">{{ $booking->travel_month ?: 'Flexible' }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 detail-label">Travelers</div>
                            <div class="col-sm-8">{{ $booking->number_of_adults }} Adult(s){{ $booking->number_of_children > 0 ? ', ' . $booking->number_of_children . ' Child(ren)' : '' }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 detail-label">Accommodation</div>
                            <div class="col-sm-8">{{ $booking->accommodation_style ?: 'Flexible' }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 detail-label">Destinations</div>
                            <div class="col-sm-8">{{ $booking->preferred_destinations ?: 'Flexible' }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 detail-label">Status</div>
                            <div class="col-sm-8">{!! $booking->status_badge !!}</div>
                        </div>
                    </div>

                    <div class="alert alert-info">
                        <i class="fas fa-envelope me-2"></i>
                        A confirmation email has been sent to <strong>{{ $booking->email }}</strong>. Please check your inbox (and spam folder) for your booking reference and next steps.
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('safaris') }}" class="btn btn-primary rounded-pill px-4 py-2 me-2">
                            <i class="fas fa-safari me-2"></i> Explore More Safaris
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-outline-primary rounded-pill px-4 py-2">
                            <i class="fas fa-home me-2"></i> Return Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
