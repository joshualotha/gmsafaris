@extends('layouts.app')

@section('title', 'Destinations - Golden Memories Safaris')
@section('keywords', 'Tanzania destinations, Serengeti, Kilimanjaro, Zanzibar, Ngorongoro, Tarangire, national parks Tanzania, lakes Tanzania, mountains Tanzania')
@section('description', 'Explore the breathtaking destinations of Tanzania with Golden Memories Safaris. Discover iconic national parks, stunning lakes, majestic mountains, and unique attractions.')
@section('canonical', 'https://www.gmsafaris.co.tz/destinations')
@section('og_title', 'Tanzania Destinations - Golden Memories Safaris')
@section('og_description', 'Explore the breathtaking destinations of Tanzania with Golden Memories Safaris. Discover iconic national parks, stunning lakes, majestic mountains, and unique attractions.')
@section('og_url', 'https://www.gmsafaris.co.tz/destinations')
@section('og_image', 'https://www.gmsafaris.co.tz/img/hero-3.jpg')
@section('twitter_title', 'Tanzania Destinations - Golden Memories Safaris')
@section('twitter_description', 'Explore the breathtaking destinations of Tanzania with Golden Memories Safaris. Discover iconic national parks, stunning lakes, majestic mountains, and unique attractions.')
@section('twitter_image', 'https://www.gmsafaris.co.tz/img/hero-3.jpg')

@section('extra_styles')
<style>
    .page-header {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset("img/destinations-hero.jpg") }}') center center no-repeat;
        background-size: cover;
    }
    .destination-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid #eee;
    }
    .destination-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .destination-card .card-img-top {
        height: 250px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .destination-card:hover .card-img-top {
        transform: scale(1.05);
    }
    .destination-card .card-body {
        display: flex;
        flex-direction: column;
    }
    .destination-card .card-text {
        flex-grow: 1;
        margin-bottom: 1rem;
    }
    .destination-card .btn {
        align-self: flex-start;
        margin-top: auto;
    }
    .category-heading {
        position: relative;
        padding-bottom: 10px;
        margin-bottom: 30px;
    }
    .category-heading::after {
        content: '';
        position: absolute;
        display: block;
        width: 60px;
        height: 3px;
        background: var(--bs-primary);
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }
    .footer-logo {
        max-width: 100%;
        height: auto;
        filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
    }
    .py-6 {
        padding-top: 6rem;
        padding-bottom: 6rem;
    }
    .bg-light.py-6 {
        padding-top: 5.5rem;
        padding-bottom: 5.5rem;
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
        { "@type": "ListItem", "position": 2, "name": "Destinations", "item": "https://www.gmsafaris.co.tz/destinations" }
    ]
}
</script>
@endsection

@section('body_content')
    <!-- Modal Search End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Tanzania Destinations</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Destinations</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Destinations Content Start -->
    <div class="container-fluid py-6">
        <div class="container">
            <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Explore Tanzania</small>
                <h1 class="display-5 mb-5">Iconic Parks, Peaks, Lakes & Attractions</h1>
            </div>

            @php
                $categoryLabels = [
                    'National Parks' => 'National Parks',
                    'Mountains & Highlands' => 'Mountains & Highlands',
                    'Lakes' => 'Lakes',
                    'Cultural & Day Trips' => 'Cultural & Day Trips',
                    'Wildlife Experiences' => 'Wildlife Experiences',
                    'Beaches & Islands' => 'Beaches & Islands',
                ];
                $categoryIcons = [
                    'National Parks' => 'fas fa-tree',
                    'Mountains & Highlands' => 'fas fa-mountain',
                    'Lakes' => 'fas fa-water',
                    'Cultural & Day Trips' => 'fas fa-leaf',
                    'Wildlife Experiences' => 'fas fa-paw',
                    'Beaches & Islands' => 'fas fa-umbrella-beach',
                ];
            @endphp

            @foreach($grouped as $category => $destinations)
                @php
                    $label = $categoryLabels[$category] ?? $category;
                    $icon = $categoryIcons[$category] ?? 'fas fa-map-marker-alt';
                    $isOdd = $loop->odd;
                @endphp

                <section class="{{ $isOdd ? 'mb-5' : 'my-5 py-5 bg-light' }}">
                    <div class="{{ !$isOdd ? 'container' : '' }}">
                        <h2 class="text-center mb-4 category-heading wow fadeInUp" data-wow-delay="0.1s">
                            <i class="{{ $icon }} text-primary me-2"></i>{{ $label }}
                        </h2>
                        <div class="row g-4 justify-content-center">
                            @foreach($destinations as $destination)
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ min($loop->iteration + 1, 9) }}s">
                                <div class="destination-card card h-100 shadow-sm border-0 overflow-hidden">
                                    <img src="{{ $destination->thumbnail_image ? \App\Models\Destination::resolveImageUrl($destination->thumbnail_image) : ($destination->hero_image ? \App\Models\Destination::resolveImageUrl($destination->hero_image) : asset('img/hero-3.jpg')) }}" class="card-img-top" alt="{{ $destination->name }}" loading="lazy">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">{{ $destination->name }}</h5>
                                        <p class="card-text small text-muted flex-grow-1">{{ $destination->short_description ? Str::limit(strip_tags($destination->short_description), 150) : '' }}</p>
                                        <a href="{{ route('destination.show', $destination->slug) }}" class="btn btn-sm btn-primary mt-auto">View More <i class="fas fa-arrow-right ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endforeach
        </div>
    </div>
    <!-- Destinations Content End -->

@endsection
