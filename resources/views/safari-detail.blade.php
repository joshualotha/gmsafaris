@extends('layouts.app')

@section('title', $safari->seo_title ?? $safari->title . ' | Golden Memories Safaris')
@section('keywords', $safari->seo_keywords ?? '')
@section('description', $safari->seo_description ?? strip_tags($safari->short_description))
@section('canonical', 'https://www.gmsafaris.co.tz/safari/' . $safari->slug)
@section('og_title', $safari->seo_title ?? $safari->title . ' | Golden Memories Safaris')
@section('og_description', $safari->seo_description ?? strip_tags($safari->short_description))
@section('og_url', 'https://www.gmsafaris.co.tz/safari/' . $safari->slug)
@section('og_image', $safari->hero_image ? \App\Models\Safari::resolveImageUrl($safari->hero_image) : asset('img/logo.png'))
@section('twitter_title', $safari->seo_title ?? $safari->title . ' | Golden Memories Safaris')
@section('twitter_description', $safari->seo_description ?? strip_tags($safari->short_description))
@section('twitter_image', $safari->hero_image ? \App\Models\Safari::resolveImageUrl($safari->hero_image) : asset('img/logo.png'))

@section('extra_styles')
<style>
    .package-hero { min-height: 60vh; background-size: cover; background-position: center; position: relative; display: flex; align-items: center; }
    .package-hero-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to bottom, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.7) 100%); }
    .package-hero-content { position: relative; z-index: 2; color: white; }
    .package-title { font-size: 3rem; font-weight: 700; margin-bottom: 1rem; text-shadow: 0 2px 4px rgba(0,0,0,0.5); }
    .package-subtitle { font-size: 1.5rem; margin-bottom: 2rem; text-shadow: 0 1px 3px rgba(0,0,0,0.5); }
    .package-meta { display: flex; flex-wrap: wrap; gap: 1.5rem; margin-bottom: 2rem; }
    .package-meta-item { display: flex; align-items: center; }
    .package-meta-item i { margin-right: 0.5rem; color: #d69c40; }
    .package-details-section { padding: 5rem 0; }
    .package-highlights { background-color: #f8f9fa; border-radius: 0.5rem; padding: 2rem; margin-bottom: 2rem; }
    .highlight-item { display: flex; align-items: flex-start; margin-bottom: 1rem; }
    .highlight-icon { color: #d69c40; margin-right: 1rem; font-size: 1.2rem; margin-top: 0.2rem; }
    .package-itinerary { margin-top: 3rem; }
    .itinerary-day { margin-bottom: 2rem; border-left: 3px solid #d69c40; padding-left: 1.5rem; position: relative; }
    .itinerary-day:last-child { margin-bottom: 0; }
    .day-number { position: absolute; left: -1.2rem; top: 0; background-color: #d69c40; color: white; width: 2.4rem; height: 2.4rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; }
    .day-title { font-size: 1.5rem; margin-bottom: 1rem; padding-top: 0.3rem; }
    .day-location { color: #d69c40; font-weight: 600; margin-bottom: 0.5rem; }
    .pricing-section { background-color: #f8f9fa; padding: 5rem 0; }
    .price-card { background-color: white; border-radius: 0.5rem; box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1); padding: 1.5rem; margin-bottom: 2rem; }
    .price-per { color: #6c757d; font-size: 0.75rem; }
    .price-feature { display: flex; align-items: center; margin-bottom: 0.5rem; }
    .price-feature i { margin-right: 0.5rem; }
    .price-includes .price-feature i { color: #28a745; }
    .price-excludes .price-feature.excluded i { color: #dc3545; }
    .gallery-img { border-radius: 0.5rem; overflow: hidden; transition: transform 0.3s ease; height: 200px; object-fit: cover; width: 100%; }
    .gallery-img:hover { transform: scale(1.05); }
    .badge-custom { font-size: 0.9rem; padding: 0.5rem 1rem; }
    .related-card { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .related-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
    .related-card img { height: 200px; object-fit: cover; }
    .footer-logo { max-width: 100%; height: auto; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1)); }
    .py-6 { padding-top: 6rem; padding-bottom: 6rem; }
</style>
@endsection

@section('structured_data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://www.gmsafaris.co.tz/" },
        { "@type": "ListItem", "position": 2, "name": "Safaris", "item": "https://www.gmsafaris.co.tz/safaris" },
        { "@type": "ListItem", "position": 3, "name": "{{ $safari->title }}", "item": "https://www.gmsafaris.co.tz/safari/{{ $safari->slug }}" }
    ]
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "TouristTrip",
    "name": "{{ $safari->title }}",
    "description": "{{ strip_tags($safari->short_description) }}",
    "touristType": "Safari",
    "itinerary": {
        "@type": "ItemList",
        "numberOfItems": {{ is_array($safari->itinerary) ? count($safari->itinerary) : 0 }},
        "itemListElement": [
            @if(is_array($safari->itinerary))
                @foreach($safari->itinerary as $index => $day)
                {
                    "@type": "ListItem",
                    "position": {{ $index + 1 }},
                    "name": "{{ $day['title'] ?? 'Day ' . ($index + 1) }}"
                }@if(!$loop->last),@endif
                @endforeach
            @endif
        ]
    },
    "provider": {
        "@type": "TravelAgency",
        "name": "Golden Memories Safaris",
        "url": "https://www.gmsafaris.co.tz"
    }
}
</script>
@endsection

@section('body_content')

    <!-- Package Hero Section -->
    <div class="package-hero" style="background-image: url('{{ $safari->hero_image ? \App\Models\Safari::resolveImageUrl($safari->hero_image) : asset('img/hero-1.jpeg') }}');">
        <div class="package-hero-overlay"></div>
        <div class="container package-hero-content">
            <div class="row">
                <div class="col-lg-8">
                    @if($safari->badge_text)
                        <small class="d-inline-block fw-bold text-white text-uppercase border border-white rounded-pill px-4 py-1 mb-3">{{ $safari->badge_text }}</small>
                    @endif
                    <h1 class="package-title text-white">{{ $safari->title }}</h1>
                    @if($safari->subtitle)
                        <p class="package-subtitle">{{ $safari->subtitle }}</p>
                    @endif
                    
                    <div class="package-meta">
                        @if($safari->duration)
                        <div class="package-meta-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span>{{ $safari->duration }}</span>
                        </div>
                        @endif
                        @if($safari->location)
                        <div class="package-meta-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $safari->location }}</span>
                        </div>
                        @endif
                        @if($safari->type)
                        <div class="package-meta-item">
                            <i class="fas fa-tag"></i>
                            <span>{{ $safari->type }}</span>
                        </div>
                        @endif
                    </div>
                    
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('booking.create', $safari->slug) }}" class="btn btn-primary py-3 px-5 rounded-pill">Book This Safari</a>
                        <a href="#itinerary" class="btn btn-outline-light py-3 px-5 rounded-pill">View Itinerary</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Package Details Section -->
    <section class="package-details-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if($safari->description)
                    <h2 class="mb-4">Safari Overview</h2>
                    {!! $safari->description !!}
                    @endif
                    
                    @if(is_array($safari->highlights) && count($safari->highlights) > 0)
                    <div class="package-highlights mt-5">
                        <h3 class="mb-4">Safari Highlights</h3>
                        <div class="row">
                            @foreach($safari->highlights as $highlight)
                            <div class="col-md-6">
                                <div class="highlight-item">
                                    <i class="fas fa-check highlight-icon"></i>
                                    <div>
                                        <h5 class="mb-1">{{ $highlight['title'] ?? $highlight }}</h5>
                                        @if(isset($highlight['description']))
                                            <p class="mb-0">{{ $highlight['description'] }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    
                    @if(is_array($safari->itinerary) && count($safari->itinerary) > 0)
                    <div class="package-itinerary mt-5" id="itinerary">
                        <h2 class="mb-4">Detailed Itinerary</h2>
                        
                        @foreach($safari->itinerary as $day)
                        <div class="itinerary-day">
                            <div class="day-number">{{ $loop->iteration }}</div>
                            <h3 class="day-title">{{ $day['title'] ?? 'Day ' . $loop->iteration }}</h3>
                            @if(isset($day['location']))
                                <p class="day-location">{{ $day['location'] }}</p>
                            @endif
                            <p>{{ $day['description'] ?? '' }}</p>
                            @if(isset($day['meals']))
                                <p><strong>Meals:</strong> {{ $day['meals'] }}</p>
                            @endif
                            @if(isset($day['accommodation']))
                                <p><strong>Accommodation:</strong> {{ $day['accommodation'] }}</p>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    @endif
                    
                    @if(is_array($safari->important_notes) && count($safari->important_notes) > 0)
                    <div class="mt-5">
                        <h3 class="mb-4">Important Notes</h3>
                        <ul class="list-unstyled">
                            @foreach($safari->important_notes as $note)
                            <li class="mb-2"><i class="fas fa-info-circle text-primary me-2"></i> {{ $note }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                
                <div class="col-lg-4">
                    <div class="sticky-top" style="top: 20px;">
                        <div class="price-card">
                            <h3 class="mb-3">Package Pricing</h3>
                            
                            @if(is_array($safari->pricing_tiers) && count($safari->pricing_tiers) > 0)
                                @php
                                    $tierCount = count($safari->pricing_tiers);
                                    $firstTier = $safari->pricing_tiers[0];
                                    $firstPrice = $firstTier['price'] ?? $firstTier['amount'] ?? '0';
                                    $firstIsNumeric = is_numeric($firstPrice);
                                @endphp
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <strong class="text-dark">{{ $firstTier['label'] ?? 'Price' }}</strong>
                                    <div class="text-end">
                                        @if($firstIsNumeric)
                                            <strong class="text-primary" style="font-size: 1.3rem;">${{ number_format((float)$firstPrice) }}</strong>
                                            <small class="text-muted d-block">{{ $firstTier['note'] ?? 'per person' }}</small>
                                        @else
                                            <span class="text-muted">{{ $firstPrice }}</span>
                                        @endif
                                    </div>
                                </div>
                                @if($tierCount > 1)
                                    <div class="collapse" id="morePricing">
                                        <hr class="my-2">
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    @foreach($safari->pricing_tiers as $i => $tier)
                                                        @if($i === 0) @continue @endif
                                                        @php
                                                            $price = $tier['price'] ?? $tier['amount'] ?? '0';
                                                            $isNumeric = is_numeric($price);
                                                        @endphp
                                                        <tr>
                                                            <td class="ps-0 py-1" style="width: 50%;">
                                                                <small class="text-dark">{{ $tier['label'] ?? 'Price' }}</small>
                                                            </td>
                                                            <td class="pe-0 py-1 text-end">
                                                                @if($isNumeric)
                                                                    <small class="text-primary fw-bold">${{ number_format((float)$price) }}</small>
                                                                    <small class="text-muted d-block">{{ $tier['note'] ?? 'per person' }}</small>
                                                                @else
                                                                    <small class="text-muted">{{ $price }}</small>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <a class="d-block text-center small text-primary mt-1" data-bs-toggle="collapse" href="#morePricing" role="button" aria-expanded="false" aria-controls="morePricing" onclick="this.textContent = this.textContent === 'View more pricing options \u25BC' ? 'Show less \u25B2' : 'View more pricing options \u25BC'">
                                        View more pricing options &#9660;
                                    </a>
                                @endif
                            @elseif($safari->price_from)
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <strong class="text-dark">Price</strong>
                                    <div class="text-end">
                                        <strong class="text-primary" style="font-size: 1.3rem;">${{ number_format($safari->price_from, 2) }}</strong>
                                        <small class="text-muted d-block">per person</small>
                                    </div>
                                </div>
                                @if($safari->price_label)
                                    <p class="text-muted small mb-0">{{ $safari->price_label }}</p>
                                @endif
                            @else
                                <div class="text-center py-3">
                                    <strong class="text-primary" style="font-size: 1.3rem;">Price on Request</strong>
                                    <p class="text-muted small mb-0 mt-1">Contact us for a personalized quote</p>
                                </div>
                            @endif
                            
                            <div class="d-grid gap-2 mt-3">
                                <a href="{{ route('booking.create', $safari->slug) }}" class="btn btn-primary btn-lg rounded-pill">Book Now</a>
                                <a href="{{ route('inquiry.create', $safari->slug) }}" class="btn btn-outline-primary btn-lg rounded-pill">Inquire Now</a>
                            </div>
                            
                            @if(is_array($safari->inclusions) && count($safari->inclusions) > 0)
                            <div class="price-includes mt-4">
                                <h6><i class="fas fa-check-circle text-primary me-2"></i> What's Included</h6>
                                @foreach($safari->inclusions as $inclusion)
                                <div class="price-feature small"><i class="fas fa-check"></i><span>{{ $inclusion }}</span></div>
                                @endforeach
                            </div>
                            @endif
                            
                            @if(is_array($safari->exclusions) && count($safari->exclusions) > 0)
                            <div class="price-excludes mt-3">
                                <h6><i class="fas fa-times-circle text-danger me-2"></i> What's Excluded</h6>
                                @foreach($safari->exclusions as $exclusion)
                                <div class="price-feature excluded small"><i class="fas fa-times"></i><span>{{ $exclusion }}</span></div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        
                        <div class="card mt-4">
                            <div class="card-body">
                                <h6 class="card-title">Need Help?</h6>
                                <p class="card-text small">Our safari specialists are ready to answer your questions and help you plan your perfect Tanzania adventure.</p>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-phone-alt text-primary me-3"></i>
                                    <div>
                                        <small class="text-muted d-block">Call Us</small>
                                        <a href="tel:+255786383273" class="text-dark small">+255 786 383 273</a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-envelope text-primary me-3"></i>
                                    <div>
                                        <small class="text-muted d-block">Email Us</small>
                                        <a href="mailto:info@gmsafaris.co.tz" class="text-dark small">info@gmsafaris.co.tz</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @php
        $resolvedGallery = \App\Models\Safari::resolveGalleryImages($safari->gallery_images);
    @endphp
    @if(count($resolvedGallery) > 0)
    <!-- Gallery Section -->
    <section class="container-fluid py-6">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="mb-3">{{ $safari->title }} Gallery</h2>
                <p class="lead text-muted">Photos from this safari experience</p>
            </div>
            <div class="row g-3">
                @foreach($resolvedGallery as $image)
                <div class="col-lg-3 col-md-6">
                    <a href="{{ is_string($image) ? $image : ($image['full'] ?? '#') }}" data-lightbox="safari-gallery" data-title="{{ $image['caption'] ?? $safari->title }}">
                        <img src="{{ is_string($image) ? $image : ($image['thumb'] ?? $image['full'] ?? '#') }}" class="gallery-img img-fluid rounded shadow-sm" alt="{{ $image['alt'] ?? $safari->title . ' Gallery' }}" loading="lazy">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Gallery Section End -->
    @endif

    @if($relatedSafaris->count() > 0)
    <!-- Related Safaris Section -->
    <div class="container-fluid bg-light py-6">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="mb-3">Explore More Safaris</h2>
                <p class="lead text-muted">Discover other incredible Tanzania safari packages</p>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach($relatedSafaris as $related)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->iteration }}s">
                    <div class="related-card card h-100 shadow-sm">
                        <img src="{{ $related->hero_image ? \App\Models\Safari::resolveImageUrl($related->hero_image) : asset('img/hero-1.jpeg') }}" class="card-img-top" alt="{{ $related->title }}" loading="lazy" style="height: 200px; object-fit: cover;">
                        @if($related->duration)
                            <div class="badge bg-primary position-absolute top-0 start-0 m-3 py-2 px-3">{{ $related->duration }}</div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title mb-2">
                                <a href="{{ route('safari.show', $related->slug) }}" class="text-dark text-decoration-none">{{ $related->title }}</a>
                            </h4>
                            @if($related->short_description)
                                <p class="card-text text-muted flex-grow-1">{{ Str::limit(strip_tags($related->short_description), 120) }}</p>
                            @endif
                            <div class="d-flex justify-content-between mt-auto">
                                <a href="{{ route('safari.show', $related->slug) }}" class="btn btn-outline-primary btn-sm px-3">View Details</a>
                                <a href="{{ route('booking.create', $related->slug) }}" class="btn btn-primary btn-sm px-3">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('safaris') }}" class="btn btn-primary rounded-pill px-5 py-3">View All Safaris</a>
            </div>
        </div>
    </div>
    @endif
@endsection
