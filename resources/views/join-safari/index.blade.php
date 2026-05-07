@extends('layouts.app')

@section('title', 'Join a Safari - Group Safari Adventures')
@section('meta_description', 'Join a group safari adventure in Tanzania. Travel with like-minded explorers, share the experience, and save on costs. Fixed departures with guaranteed experiences.')

@section('content')
    <style>
        .page-header {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("{{ asset('img/group-safari-header.webp') }}") center center no-repeat;
            background-size: cover;
        }
        .safari-img { position: relative; overflow: hidden; }
        .safari-overlay { display: none; }
    </style>

    <!-- Hero Section -->
    <div class="container-fluid page-header py-6 wow bounceInUp" data-wow-delay="0.1s">
        <div class="container text-center py-6">
            <h1 class="display-4 text-white animated bounceInDown">Join a Safari</h1>
            <nav aria-label="breadcrumb animated bounceInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Join a Safari</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container-fluid py-6">
        <div class="container">

            @if($featured->count() > 0)
                <!-- Featured Join Safaris -->
                <div class="mb-5">
                    <h3 class="fw-bold mb-4"><i class="fas fa-star text-warning me-2"></i>Featured Group Departures</h3>
                    <div class="row g-4">
                        @foreach($featured as $joinSafari)
                            <div class="col-lg-4 col-md-6 wow bounceInUp" data-wow-delay="0.1s">
                                <div class="safari-card rounded overflow-hidden h-100 d-flex flex-column">
                                    <div class="safari-img position-relative">
                                        <img src="{{ $joinSafari->hero_image ? asset('storage/' . $joinSafari->hero_image) : asset('img/group-safari-header.webp') }}"
                                             class="img-fluid w-100" alt="{{ $joinSafari->title }}" style="height: 220px; object-fit: cover;">
                                        <div class="position-absolute top-0 start-0 m-3">
                                            <span class="badge bg-warning text-dark px-3 py-2">
                                                <i class="fas fa-star me-1"></i> Featured
                                            </span>
                                        </div>
                                        <div class="position-absolute top-0 end-0 m-3">
                                            @php
                                                $statusBadge = match($joinSafari->status) {
                                                    'open' => 'bg-success',
                                                    'confirmed' => 'bg-info',
                                                    'cancelled' => 'bg-danger',
                                                    'completed' => 'bg-secondary',
                                                    default => 'bg-secondary'
                                                };
                                            @endphp
                                            <span class="badge {{ $statusBadge }} px-3 py-2 text-uppercase">{{ $joinSafari->status }}</span>
                                        </div>
                                    </div>
                                    <div class="p-4 d-flex flex-column flex-grow-1">
                                        <div class="d-flex mb-2">
                                            <small class="flex-fill text-body"><i class="far fa-calendar-alt text-primary me-2"></i>{{ $joinSafari->start_date->format('M d, Y') }}</small>
                                            @if($joinSafari->duration)
                                                <small class="flex-fill text-body text-end"><i class="far fa-clock text-primary me-2"></i>{{ $joinSafari->duration }}</small>
                                            @endif
                                        </div>
                                        <h5 class="mb-2">{{ $joinSafari->title }}</h5>
                                        @if($joinSafari->location)
                                            <p class="text-body mb-2"><i class="fas fa-map-marker-alt text-primary me-2"></i>{{ $joinSafari->location }}</p>
                                        @endif
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div>
                                                <small class="text-muted">Spots:</small>
                                                <div class="d-flex align-items-center gap-2 mt-1">
                                                    <span class="badge bg-success">{{ $joinSafari->spots_filled }} filled</span>
                                                    <span class="badge bg-warning text-dark">{{ $joinSafari->spots_remaining }} left</span>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                @if($joinSafari->price_per_person)
                                                    <strong class="text-primary fs-5">${{ number_format($joinSafari->price_per_person) }}</strong>
                                                    <small class="d-block text-muted">per person</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="progress mb-3" style="height: 8px;">
                                            @php
                                                $pct = $joinSafari->max_participants > 0
                                                    ? round(($joinSafari->spots_filled / $joinSafari->max_participants) * 100)
                                                    : 0;
                                            @endphp
                                            <div class="progress-bar bg-success" style="width: {{ min($pct, 100) }}%"></div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-auto">
                                            <small class="text-muted">
                                                <i class="fas fa-users me-1"></i> Min {{ $joinSafari->min_participants }} people
                                            </small>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('join-safari.show', $joinSafari->slug) }}" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                                    Details
                                                </a>
                                                <a href="{{ route('join-safari.show', $joinSafari->slug) }}#join" class="btn btn-primary rounded-pill px-3 btn-sm">
                                                    Join Now <i class="fas fa-arrow-right ms-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Intro Text Before Listing -->
            <div class="text-center mb-5 wow bounceInUp" data-wow-delay="0.1s">
                <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Group Departures</small>
                <h2 class="display-5 mb-3">Open Group Departures</h2>
                <p class="text-muted mx-auto" style="max-width: 700px;">
                    Browse our scheduled group safari departures and join fellow travelers for an unforgettable adventure.
                    Each departure has a fixed date, itinerary, and minimum participant requirement. Once the minimum is met,
                    the safari is confirmed to run. If you've been dreaming of a Tanzanian safari but prefer to travel with
                    company, these group departures are perfect for you!
                </p>
            </div>

            @if($joinSafaris->count() > 0)
                <div class="row g-4">
                    @foreach($joinSafaris as $joinSafari)
                        <div class="col-lg-4 col-md-6 wow bounceInUp" data-wow-delay="0.1s">
                            <div class="safari-card rounded overflow-hidden h-100 d-flex flex-column">
                                <div class="safari-img position-relative">
                                    <img src="{{ $joinSafari->hero_image ? asset('storage/' . $joinSafari->hero_image) : asset('img/group-safari-header.webp') }}"
                                         class="img-fluid w-100" alt="{{ $joinSafari->title }}" style="height: 200px; object-fit: cover;">
                                    <div class="position-absolute top-0 end-0 m-3">
                                        @php
                                            $statusBadge = match($joinSafari->status) {
                                                'open' => 'bg-success',
                                                'confirmed' => 'bg-info',
                                                'cancelled' => 'bg-danger',
                                                'completed' => 'bg-secondary',
                                                default => 'bg-secondary'
                                            };
                                        @endphp
                                        <span class="badge {{ $statusBadge }} px-3 py-2 text-uppercase">{{ $joinSafari->status }}</span>
                                    </div>
                                </div>
                                <div class="p-4 d-flex flex-column flex-grow-1">
                                    <div class="d-flex mb-2">
                                        <small class="flex-fill text-body"><i class="far fa-calendar-alt text-primary me-2"></i>{{ $joinSafari->start_date->format('M d, Y') }}</small>
                                        @if($joinSafari->duration)
                                            <small class="flex-fill text-body text-end"><i class="far fa-clock text-primary me-2"></i>{{ $joinSafari->duration }}</small>
                                        @endif
                                    </div>
                                    <h5 class="mb-2">{{ $joinSafari->title }}</h5>
                                    @if($joinSafari->location)
                                        <p class="text-body mb-2"><i class="fas fa-map-marker-alt text-primary me-2"></i>{{ $joinSafari->location }}</p>
                                    @endif
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <small class="text-muted">Spots:</small>
                                            <div class="d-flex align-items-center gap-2 mt-1">
                                                <span class="badge bg-success">{{ $joinSafari->spots_filled }} filled</span>
                                                <span class="badge bg-warning text-dark">{{ $joinSafari->spots_remaining }} left</span>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            @if($joinSafari->price_per_person)
                                                <strong class="text-primary fs-5">${{ number_format($joinSafari->price_per_person) }}</strong>
                                                <small class="d-block text-muted">per person</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="progress mb-3" style="height: 8px;">
                                        @php
                                            $pct = $joinSafari->max_participants > 0
                                                ? round(($joinSafari->spots_filled / $joinSafari->max_participants) * 100)
                                                : 0;
                                        @endphp
                                        <div class="progress-bar bg-success" style="width: {{ min($pct, 100) }}%"></div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-auto">
                                        <small class="text-muted">
                                            <i class="fas fa-users me-1"></i> Min {{ $joinSafari->min_participants }} people
                                        </small>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('join-safari.show', $joinSafari->slug) }}" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                                Details
                                            </a>
                                            <a href="{{ route('join-safari.show', $joinSafari->slug) }}#join" class="btn btn-primary rounded-pill px-3 btn-sm">
                                                Join Now <i class="fas fa-arrow-right ms-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    {{ $joinSafaris->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                    <h4>No Open Group Departures Right Now</h4>
                    <p class="text-muted">We don't have any open group safaris at the moment. Check back soon or <a href="{{ route('contact') }}">contact us</a> to express your interest!</p>
                    <a href="{{ route('safaris') }}" class="btn btn-primary rounded-pill px-4 py-2 mt-2">
                        Browse Safari Packages <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Why Join a Safari Section -->
    <div class="container-fluid py-6">
        <div class="container">
            <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Why Join a Safari</small>
                <h2 class="display-5 mb-3">Why Join a Group Safari?</h2>
                <p class="text-muted mx-auto mb-5" style="max-width: 700px;">
                    Traveling with a group doesn't mean compromising on experience. In fact, it often enhances it.
                    Here's why joining a group safari might be the best choice for your Tanzanian adventure.
                </p>
            </div>

            <!-- Benefits Cards -->
            <div class="row g-4 mb-5">
                <div class="col-md-4 wow bounceInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-4 h-100 text-center">
                        <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                            <i class="fas fa-dollar-sign fa-2x text-white"></i>
                        </div>
                        <h5>Cost Effective</h5>
                        <p class="text-muted mb-0">Share the costs of transportation, guide fees, and park entry fees with fellow travelers. Group safaris are significantly more affordable than private ones.</p>
                    </div>
                </div>
                <div class="col-md-4 wow bounceInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-4 h-100 text-center">
                        <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                            <i class="fas fa-user-friends fa-2x text-white"></i>
                        </div>
                        <h5>Meet Like-Minded Travelers</h5>
                        <p class="text-muted mb-0">Share the adventure with fellow explorers from around the world. Make new friends and create lasting memories together.</p>
                    </div>
                </div>
                <div class="col-md-4 wow bounceInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-4 h-100 text-center">
                        <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                            <i class="fas fa-calendar-check fa-2x text-white"></i>
                        </div>
                        <h5>Fixed Itinerary</h5>
                        <p class="text-muted mb-0">No planning required. Our group departures come with a pre-set itinerary covering the best destinations and experiences.</p>
                    </div>
                </div>
            </div>

            <!-- Comparison Table -->
            <div class="row justify-content-center wow bounceInUp" data-wow-delay="0.1s">
                <div class="col-lg-10">
                    <h4 class="fw-bold text-center mb-4">Private Safari vs Join Safari</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 30%;">Feature</th>
                                    <th style="width: 35%;" class="text-center">Private Safari</th>
                                    <th style="width: 35%;" class="text-center bg-primary text-white">Join Safari</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Cost</strong></td>
                                    <td class="text-center"><span class="text-danger">Higher</span> — you pay for the entire vehicle and guide</td>
                                    <td class="text-center bg-light"><span class="text-success fw-bold">Lower</span> — costs shared among the group</td>
                                </tr>
                                <tr>
                                    <td><strong>Group Size</strong></td>
                                    <td class="text-center">Just you / your party (private vehicle)</td>
                                    <td class="text-center bg-light">Small group (typically 4–8 people)</td>
                                </tr>
                                <tr>
                                    <td><strong>Flexibility</strong></td>
                                    <td class="text-center"><span class="text-success fw-bold">High</span> — customize your itinerary</td>
                                    <td class="text-center bg-light"><span class="text-warning fw-bold">Moderate</span> — fixed itinerary, but well-planned</td>
                                </tr>
                                <tr>
                                    <td><strong>Social Experience</strong></td>
                                    <td class="text-center">Private — just your travel companions</td>
                                    <td class="text-center bg-light"><span class="text-success fw-bold">Shared</span> — meet and travel with others</td>
                                </tr>
                                <tr>
                                    <td><strong>Departure Guarantee</strong></td>
                                    <td class="text-center"><span class="text-success fw-bold">Guaranteed</span> — runs on your schedule</td>
                                    <td class="text-center bg-light">Conditional — requires minimum participants</td>
                                </tr>
                                <tr>
                                    <td><strong>Best For</strong></td>
                                    <td class="text-center">Couples, families, or those seeking exclusivity</td>
                                    <td class="text-center bg-light">Solo travelers, duos, or budget-conscious adventurers</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="text-muted text-center mt-3 small">
                        <i class="fas fa-info-circle me-1"></i>
                        Both options include expert guides, park fees, accommodation, and meals. Choose what suits your travel style best!
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- How It Works -->
    <div class="container-fluid py-6 bg-light">
        <div class="container">
            <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">How It Works</small>
                <h2 class="display-5 mb-5">How Join Safaris Work</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-3 text-center wow bounceInUp" data-wow-delay="0.1s">
                    <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-search fa-2x text-primary"></i>
                    </div>
                    <h5>1. Browse Departures</h5>
                    <p class="text-muted">Find a group safari that matches your travel dates and interests.</p>
                </div>
                <div class="col-md-3 text-center wow bounceInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-user-plus fa-2x text-primary"></i>
                    </div>
                    <h5>2. Join the Group</h5>
                    <p class="text-muted">Sign up and secure your spot. You'll be added as a confirmed participant.</p>
                </div>
                <div class="col-md-3 text-center wow bounceInUp" data-wow-delay="0.5s">
                    <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-users fa-2x text-primary"></i>
                    </div>
                    <h5>3. Minimum Met</h5>
                    <p class="text-muted">Once the minimum participants are reached, the safari is confirmed to run.</p>
                </div>
                <div class="col-md-3 text-center wow bounceInUp" data-wow-delay="0.7s">
                    <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-plane-departure fa-2x text-primary"></i>
                    </div>
                    <h5>4. Adventure Awaits!</h5>
                    <p class="text-muted">Pack your bags and get ready for an unforgettable group safari experience!</p>
                </div>
            </div>
        </div>
    </div>
@endsection
