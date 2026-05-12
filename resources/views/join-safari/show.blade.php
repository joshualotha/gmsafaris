@extends('layouts.app')

@section('title', $joinSafari->title . ' - Join Safari')
@section('meta_description', Str::limit($joinSafari->description, 160))

@section('content')
    <style>
        .page-header {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("{{ $joinSafari->hero_image ? asset('storage/' . $joinSafari->hero_image) : asset('img/group-safari-header.webp') }}") center center no-repeat;
            background-size: cover;
        }
    </style>

    <!-- Hero Section -->
    <div class="container-fluid page-header py-6 wow bounceInUp" data-wow-delay="0.1s">
        <div class="container text-center py-6">
            <h1 class="display-4 text-white animated bounceInDown">{{ $joinSafari->title }}</h1>
            <nav aria-label="breadcrumb animated bounceInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('join-safari.index') }}">Join a Safari</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $joinSafari->title }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container-fluid py-6">
        <div class="container">
            <div class="row g-5">
                <!-- Left Column - Safari Details -->
                <div class="col-lg-8">
                    <!-- Status & Quick Info -->
                    <div class="d-flex flex-wrap gap-3 mb-4">
                        @php
                            $statusBadge = match($joinSafari->status) {
                                'open' => 'bg-success',
                                'confirmed' => 'bg-info',
                                'cancelled' => 'bg-danger',
                                'completed' => 'bg-secondary',
                                default => 'bg-secondary'
                            };
                        @endphp
                        <span class="badge {{ $statusBadge }} px-3 py-2 fs-6">{{ ucfirst($joinSafari->status) }}</span>
                        <span class="badge bg-light text-dark px-3 py-2 fs-6">
                            <i class="far fa-calendar-alt text-primary me-2"></i>{{ $joinSafari->start_date->format('F d, Y') }}
                            @if($joinSafari->end_date)
                                - {{ $joinSafari->end_date->format('F d, Y') }}
                            @endif
                        </span>
                        @if($joinSafari->duration)
                            <span class="badge bg-light text-dark px-3 py-2 fs-6">
                                <i class="far fa-clock text-primary me-2"></i>{{ $joinSafari->duration }}
                            </span>
                        @endif
                        @if($joinSafari->location)
                            <span class="badge bg-light text-dark px-3 py-2 fs-6">
                                <i class="fas fa-map-marker-alt text-primary me-2"></i>{{ $joinSafari->location }}
                            </span>
                        @endif
                    </div>

                    <!-- Description -->
                    @if($joinSafari->description)
                        <div class="mb-5">
                            <h3 class="fw-bold mb-3">About This Safari</h3>
                            <div class="text-body">{!! $joinSafari->description !!}</div>
                        </div>
                    @endif

                    <!-- Highlights -->
                    @if($joinSafari->highlights && count($joinSafari->highlights) > 0)
                        <div class="mb-5">
                            <h3 class="fw-bold mb-3">Safari Highlights</h3>
                            <div class="row g-3">
                                @foreach($joinSafari->highlights as $highlight)
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-start">
                                            <i class="fas fa-check-circle text-primary mt-1 me-2"></i>
                                            <span>{{ is_array($highlight) ? ($highlight['title'] ?? $highlight['description'] ?? json_encode($highlight)) : $highlight }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Inclusions / Exclusions -->
                    <div class="row g-4 mb-5">
                        @if($joinSafari->inclusions && count($joinSafari->inclusions) > 0)
                            <div class="col-md-6">
                                <div class="bg-light rounded p-4 h-100">
                                    <h5 class="fw-bold mb-3"><i class="fas fa-check-circle text-success me-2"></i>What's Included</h5>
                                    <ul class="list-unstyled mb-0">
                                        @foreach($joinSafari->inclusions as $inclusion)
                                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>{{ is_string($inclusion) ? $inclusion : json_encode($inclusion) }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        @if($joinSafari->exclusions && count($joinSafari->exclusions) > 0)
                            <div class="col-md-6">
                                <div class="bg-light rounded p-4 h-100">
                                    <h5 class="fw-bold mb-3"><i class="fas fa-times-circle text-danger me-2"></i>What's Excluded</h5>
                                    <ul class="list-unstyled mb-0">
                                        @foreach($joinSafari->exclusions as $exclusion)
                                            <li class="mb-2"><i class="fas fa-times text-danger me-2"></i>{{ is_string($exclusion) ? $exclusion : json_encode($exclusion) }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Important Notes -->
                    @if($joinSafari->important_notes)
                        <div class="mb-5">
                            <div class="alert alert-info">
                                <h5 class="fw-bold"><i class="fas fa-info-circle me-2"></i>Important Notes</h5>
                                <p class="mb-0">{{ $joinSafari->important_notes }}</p>
                            </div>
                        </div>
                    @endif

                    <!-- Day by Day Itinerary -->
                    @if($joinSafari->itinerary && count($joinSafari->itinerary) > 0)
                        <div class="mb-5">
                            <h3 class="fw-bold mb-4">Day by Day Itinerary</h3>
                            @foreach($joinSafari->itinerary as $day)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="fw-bold">
                                            Day {{ $loop->iteration }}
                                            @if(isset($day['title'])) - {{ $day['title'] }}@endif
                                        </h5>
                                        @if(isset($day['description']))
                                            <p class="mb-0">{{ $day['description'] }}</p>
                                        @elseif(is_string($day))
                                            <p class="mb-0">{{ $day }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Right Column - Join Form & Progress -->
                <div class="col-lg-4">
                    <!-- Pricing Card -->
                    <div class="bg-light rounded p-4 mb-4 sticky-top" style="top: 100px;">
                        <h4 class="fw-bold mb-3">
                            @if($joinSafari->price_per_person)
                                ${{ number_format($joinSafari->price_per_person) }}
                                <small class="text-muted fs-6">per person</small>
                            @else
                                Contact for Pricing
                            @endif
                        </h4>
                        @if($joinSafari->price_label)
                            <p class="text-muted small mb-3">{{ $joinSafari->price_label }}</p>
                        @endif

                        <!-- Overall Stats -->
                        <div class="d-flex justify-content-between mb-3">
                            <div class="text-center">
                                <strong class="d-block fs-4">{{ $joinSafari->spots_filled }}</strong>
                                <small class="text-muted">Joined</small>
                            </div>
                            <div class="text-center">
                                <strong class="d-block fs-4 text-success">Unlimited</strong>
                                <small class="text-muted">Capacity</small>
                            </div>
                            <div class="text-center">
                                <strong class="d-block fs-4">{{ $joinSafari->total_vehicles }}</strong>
                                <small class="text-muted">Vehicles</small>
                            </div>
                        </div>

                        <!-- Vehicle Cards -->
                        <div class="mb-3">
                            <h6 class="fw-bold mb-2"><i class="fas fa-car me-2 text-primary"></i>Vehicle Status</h6>
                            @forelse($joinSafari->vehicles as $vehicle)
                                @php
                                    $vBadgeClass = match($vehicle->status) {
                                        'open' => 'bg-primary',
                                        'confirmed' => 'bg-success',
                                        'cancelled' => 'bg-danger',
                                        default => 'bg-secondary'
                                    };
                                @endphp
                                <div class="card mb-2 {{ $vehicle->status === 'cancelled' ? 'border-danger opacity-50' : '' }}">
                                    <div class="card-body py-2 px-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="fw-bold">Vehicle #{{ $vehicle->vehicle_number }}</small>
                                            <span class="badge {{ $vBadgeClass }}">{{ ucfirst($vehicle->status) }}</span>
                                        </div>
                                        <small class="text-muted">Min {{ $vehicle->min_required }} to confirm</small>
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted small mb-0">No vehicles assigned yet.</p>
                            @endforelse
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            </div>
                        @endif

                        @if(session('warning'))
                            <div class="alert alert-warning">
                                <i class="fas fa-exclamation-triangle me-2"></i>{{ session('warning') }}
                            </div>
                        @endif

                        @if($joinSafari->is_joinable)
                            <!-- Join Form -->
                            <hr>
                            <h5 class="fw-bold mb-3">Join This Safari</h5>
                            <form action="{{ route('join-safari.join', $joinSafari->slug) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Your Name *</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" required>
                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email *</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}" required>
                                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Country</label>
                                    <input type="text" name="country" class="form-control" value="{{ old('country') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Number of People *</label>
                                    <input type="number" name="number_of_people" class="form-control @error('number_of_people') is-invalid @enderror"
                                           value="{{ old('number_of_people', 1) }}" min="1" required>
                                    <small class="text-muted">More vehicles are added automatically — there's always room!</small>
                                    @error('number_of_people') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Special Requests</label>
                                    <textarea name="special_requests" class="form-control" rows="3">{{ old('special_requests') }}</textarea>
                                </div>
                                <div class="alert alert-info small mb-3">
                                    <i class="fas fa-info-circle me-1"></i> We add vehicles as the group grows. Join with confidence — capacity is never an issue. Large parties may be split across vehicles.
                                </div>
                                <button type="submit" class="btn btn-primary w-100 rounded-pill py-2">
                                    <i class="fas fa-user-plus me-2"></i> Join Now
                                </button>
                            </form>
                        @elseif($joinSafari->status === 'confirmed')
                            <div class="alert alert-info">
                                <i class="fas fa-check-circle me-2"></i> This safari is confirmed! Minimum participants have been met.
                            </div>
                            <a href="{{ route('contact') }}" class="btn btn-primary w-100 rounded-pill py-2">
                                <i class="fas fa-envelope me-2"></i> Contact Us for Availability
                            </a>
                        @elseif($joinSafari->status === 'cancelled')
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-circle me-2"></i> This safari was cancelled as the minimum participant requirement was not met.
                            </div>
                        @elseif($joinSafari->status === 'completed')
                            <div class="alert alert-secondary">
                                <i class="fas fa-check-circle me-2"></i> This safari has been completed.
                            </div>
                        @else
                            <div class="alert alert-warning">
                                <i class="fas fa-exclamation-triangle me-2"></i> This safari is currently not accepting new participants.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
