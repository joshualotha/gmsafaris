@extends('layouts.app')

@section('title', 'Thank You - Inquiry Received - Golden Memories Safaris')
@section('keywords', 'Tanzania safari inquiry received, thank you')
@section('description', 'Thank you for your inquiry! Our safari specialists will get back to you within 24 hours.')
@section('canonical', 'https://www.gmsafaris.co.tz/inquiry/thank-you')
@section('og_title', 'Thank You - Golden Memories Safaris')
@section('og_description', 'Thank you for your inquiry! We will get back to you within 24 hours.')

@section('extra_styles')
<style>
    .page-header-thankyou {
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset("img/hero-1.jpg") }}') center center no-repeat;
        background-size: cover;
    }
    .thank-you-icon {
        font-size: 4rem;
        color: #28a745;
    }
</style>
@endsection

@section('body_content')

    <!-- Page Header -->
    <div class="container-fluid page-header-thankyou py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Thank You!</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('inquiry.create') }}">Inquiry</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Thank You</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Thank You Content -->
    <div class="container-fluid py-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="thank-you-icon mb-4">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h2 class="display-6 mb-3">Inquiry Received Successfully!</h2>
                    <p class="lead mb-2">Thank you, <strong>{{ $name ?: 'Valued Guest' }}</strong>!</p>
                    <p class="text-muted mb-4">We have received your inquiry and our safari specialists will review it shortly. You can expect to hear back from us within <strong>24 hours</strong> with personalized recommendations and answers to your questions.</p>

                    <div class="card shadow-sm border-light p-4 mb-4">
                        <h5 class="mb-3">What Happens Next?</h5>
                        <div class="row text-start">
                            <div class="col-md-4 mb-3 mb-md-0">
                                <div class="text-center">
                                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <h6>Step 1</h6>
                                    <small class="text-muted">We review your inquiry and travel preferences</small>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3 mb-md-0">
                                <div class="text-center">
                                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <h6>Step 2</h6>
                                    <small class="text-muted">A safari specialist contacts you within 24 hours</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                                        <i class="fas fa-map-marked-alt"></i>
                                    </div>
                                    <h6>Step 3</h6>
                                    <small class="text-muted">We craft a personalized safari itinerary for you</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        A confirmation email has been sent to your inbox. If you don't see it, please check your spam folder.
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('safaris') }}" class="btn btn-primary rounded-pill px-4 py-2 me-2">
                            <i class="fas fa-safari me-2"></i> Browse Safaris
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
