@extends('layouts.app')

@section('title', $destination->seo_title ?? $destination->name . ' | Golden Memories Safaris')
@section('keywords', $destination->seo_keywords ?? '')
@section('description', $destination->seo_description ?? strip_tags($destination->short_description))
@section('canonical', 'https://www.gmsafaris.co.tz/destination/' . $destination->slug)
@section('og_title', $destination->seo_title ?? $destination->name . ' | Golden Memories Safaris')
@section('og_description', $destination->seo_description ?? strip_tags($destination->short_description))
@section('og_url', 'https://www.gmsafaris.co.tz/destination/' . $destination->slug)
@section('og_image', $destination->hero_image ? \App\Models\Destination::resolveImageUrl($destination->hero_image) : asset('img/logo.png'))
@section('twitter_title', $destination->seo_title ?? $destination->name . ' | Golden Memories Safaris')
@section('twitter_description', $destination->seo_description ?? strip_tags($destination->short_description))
@section('twitter_image', $destination->hero_image ? \App\Models\Destination::resolveImageUrl($destination->hero_image) : asset('img/logo.png'))

@section('extra_styles')
<style>
    .destination-hero { min-height: 60vh; background-size: cover; background-position: center; position: relative; display: flex; align-items: center; }
    .destination-hero-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to bottom, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.7) 100%); }
    .destination-hero-content { position: relative; z-index: 2; color: white; }
    .destination-title { font-size: 3rem; font-weight: 700; margin-bottom: 1rem; text-shadow: 0 2px 4px rgba(0,0,0,0.5); }
    .destination-subtitle { font-size: 1.5rem; margin-bottom: 2rem; text-shadow: 0 1px 3px rgba(0,0,0,0.5); }
    .destination-details-section { padding: 5rem 0; }
    .destination-highlights { background-color: #f8f9fa; border-radius: 0.5rem; padding: 2rem; margin-bottom: 2rem; }
    .highlight-item { display: flex; align-items: flex-start; margin-bottom: 1rem; }
    .highlight-icon { color: #d69c40; margin-right: 1rem; font-size: 1.2rem; margin-top: 0.2rem; }
    .quick-fact-card { background-color: #f8f9fa; border-radius: 0.5rem; padding: 1.5rem; text-align: center; height: 100%; transition: transform 0.3s ease; }
    .quick-fact-card:hover { transform: translateY(-3px); }
    .quick-fact-label { font-size: 0.85rem; color: #6c757d; text-transform: uppercase; letter-spacing: 0.5px; }
    .quick-fact-value { font-size: 1.1rem; font-weight: 600; color: #333; margin-top: 0.3rem; }
    .feature-card { border-radius: 0.5rem; padding: 1.5rem; margin-bottom: 1rem; background-color: white; box-shadow: 0 2px 8px rgba(0,0,0,0.06); transition: transform 0.3s ease; height: 100%; }
    .feature-card:hover { transform: translateY(-3px); box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
    .feature-icon { font-size: 2rem; color: #d69c40; margin-bottom: 1rem; }
    .season-card { background-color: #f8f9fa; border-left: 4px solid #d69c40; border-radius: 0.25rem; padding: 1.25rem; margin-bottom: 1rem; }
    .activity-card { border-radius: 0.5rem; overflow: hidden; margin-bottom: 1.5rem; background-color: white; box-shadow: 0 2px 8px rgba(0,0,0,0.06); transition: transform 0.3s ease; height: 100%; }
    .activity-card:hover { transform: translateY(-3px); box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
    .activity-icon { font-size: 1.5rem; color: #d69c40; }
    .gallery-img { border-radius: 0.5rem; overflow: hidden; transition: transform 0.3s ease; height: 200px; object-fit: cover; width: 100%; }
    .gallery-img:hover { transform: scale(1.05); }
    .badge-custom { font-size: 0.9rem; padding: 0.5rem 1rem; }
    .related-card { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .related-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
    .related-card img { height: 200px; object-fit: cover; }
    .footer-logo { max-width: 100%; height: auto; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1)); }
    .py-6 { padding-top: 6rem; padding-bottom: 6rem; }
    .faq-accordion .accordion-button:not(.collapsed) { background-color: #f8f9fa; color: #333; }
    .faq-accordion .accordion-button:focus { box-shadow: none; border-color: rgba(0,0,0,0.125); }
    .map-container { border-radius: 0.5rem; overflow: hidden; }
    .map-container iframe { width: 100%; height: 400px; border: 0; }
    .wildlife-item { display: flex; align-items: flex-start; margin-bottom: 0.75rem; }
    .wildlife-item i { color: #28a745; margin-right: 0.75rem; margin-top: 0.25rem; }
    .attraction-tag { display: inline-block; background-color: #f8f9fa; border: 1px solid #dee2e6; border-radius: 50rem; padding: 0.35rem 0.75rem; margin: 0.2rem; font-size: 0.85rem; }
</style>
@endsection

@section('structured_data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://www.gmsafaris.co.tz/" },
        { "@type": "ListItem", "position": 2, "name": "Destinations", "item": "https://www.gmsafaris.co.tz/destinations" },
        { "@type": "ListItem", "position": 3, "name": "{{ $destination->name }}", "item": "https://www.gmsafaris.co.tz/destination/{{ $destination->slug }}" }
    ]
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "TouristAttraction",
    "name": "{{ $destination->name }}",
    "description": "{{ strip_tags($destination->short_description) }}",
    "location": {
        "@type": "Place",
        "name": "{{ $destination->location ?? $destination->name }}",
        "address": {
            "@type": "PostalAddress",
            "addressRegion": "Tanzania",
            "addressCountry": "TZ"
        }
    },
    "provider": {
        "@type": "TravelAgency",
        "name": "Golden Memories Safaris",
        "url": "https://www.gmsafaris.co.tz"
    }
}
</script>
@if(is_array($destination->faq) && count($destination->faq) > 0)
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        @foreach($destination->faq as $index => $faq)
        {
            "@type": "Question",
            "name": "{{ $faq['question'] ?? '' }}",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "{{ strip_tags($faq['answer'] ?? '') }}"
            }
        }@if(!$loop->last),@endif
        @endforeach
    ]
}
</script>
@endif
@endsection

@section('body_content')

    <!-- Destination Hero Section -->
    <div class="destination-hero" style="background-image: url('{{ $destination->hero_image ? \App\Models\Destination::resolveImageUrl($destination->hero_image) : asset('img/hero-3.jpg') }}');">
        <div class="destination-hero-overlay"></div>
        <div class="container destination-hero-content">
            <div class="row">
                <div class="col-lg-8">
                    @if($destination->badge_text)
                        <small class="d-inline-block fw-bold text-white text-uppercase border border-white rounded-pill px-4 py-1 mb-3">{{ $destination->badge_text }}</small>
                    @endif
                    <h1 class="destination-title text-white">{{ $destination->name }}</h1>
                    @if($destination->subtitle)
                        <p class="destination-subtitle">{{ $destination->subtitle }}</p>
                    @endif

                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('booking') }}" class="btn btn-primary py-3 px-5 rounded-pill">Book a Safari Here</a>
                        @if($destination->cta_text && $destination->cta_url)
                            <a href="{{ $destination->cta_url }}" class="btn btn-outline-light py-3 px-5 rounded-pill">{{ $destination->cta_text }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Destination Details Section -->
    <section class="destination-details-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if($destination->description)
                    <h2 class="mb-4">About {{ $destination->name }}</h2>
                    {!! $destination->description !!}
                    @endif

                    @if(is_array($destination->highlights) && count($destination->highlights) > 0)
                    <div class="destination-highlights mt-5">
                        <h3 class="mb-4">Destination Highlights</h3>
                        <div class="row">
                            @foreach($destination->highlights as $highlight)
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

                    @if(is_array($destination->features) && count($destination->features) > 0)
                    <div class="mt-5">
                        <h3 class="mb-4">What Makes It Special</h3>
                        <div class="row">
                            @foreach($destination->features as $feature)
                            <div class="col-md-6">
                                <div class="feature-card">
                                    @if(isset($feature['icon']))
                                        <div class="feature-icon"><i class="{{ $feature['icon'] }}"></i></div>
                                    @endif
                                    <h5>{{ $feature['title'] ?? 'Feature' }}</h5>
                                    @if(isset($feature['description']))
                                        <p class="text-muted mb-0">{{ $feature['description'] }}</p>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    @if(is_array($destination->best_time_to_visit) && count($destination->best_time_to_visit) > 0)
                    <div class="mt-5">
                        <h3 class="mb-4">Best Time to Visit</h3>
                        @foreach($destination->best_time_to_visit as $season)
                        <div class="season-card">
                            <h5 class="mb-2">{{ $season['season'] ?? 'Season' }}</h5>
                            @if(isset($season['description']))
                                <p class="mb-0 text-muted">{{ $season['description'] }}</p>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    @endif

                    @if($destination->wildlife_highlights)
                    <div class="mt-5">
                        <h3 class="mb-4">Wildlife Highlights</h3>
                        {!! $destination->wildlife_highlights !!}
                    </div>
                    @endif

                    @if(is_array($destination->activities) && count($destination->activities) > 0)
                    <div class="mt-5">
                        <h3 class="mb-4">Activities & Experiences</h3>
                        <div class="row">
                            @foreach($destination->activities as $activity)
                            <div class="col-md-6">
                                <div class="activity-card p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        @if(isset($activity['icon']))
                                            <div class="activity-icon me-3"><i class="{{ $activity['icon'] }}"></i></div>
                                        @else
                                            <div class="activity-icon me-3"><i class="fas fa-hiking"></i></div>
                                        @endif
                                        <h5 class="mb-0">{{ $activity['title'] ?? 'Activity' }}</h5>
                                    </div>
                                    @if(isset($activity['description']))
                                        <p class="text-muted mb-0">{{ $activity['description'] }}</p>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    @if($destination->key_attractions)
                    <div class="mt-5">
                        <h3 class="mb-4">Key Attractions</h3>
                        <div>
                            @foreach(explode(',', $destination->key_attractions) as $attraction)
                                <span class="attraction-tag">{{ trim($attraction) }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    @if(is_array($destination->faq) && count($destination->faq) > 0)
                    <div class="mt-5">
                        <h3 class="mb-4">Frequently Asked Questions</h3>
                        <div class="accordion faq-accordion" id="destinationFaq">
                            @foreach($destination->faq as $index => $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $index }}">
                                        {{ $faq['question'] ?? 'Question' }}
                                    </button>
                                </h2>
                                <div id="faq{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#destinationFaq">
                                    <div class="accordion-body">
                                        {{ $faq['answer'] ?? '' }}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <div class="col-lg-4">
                    <div class="sticky-top" style="top: 20px;">
                        @if(is_array($destination->quick_facts) && count($destination->quick_facts) > 0)
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title mb-3"><i class="fas fa-info-circle text-primary me-2"></i>Quick Facts</h5>
                                @foreach($destination->quick_facts as $fact)
                                <div class="mb-3">
                                    <small class="text-muted text-uppercase d-block" style="font-size: 0.75rem; letter-spacing: 0.5px;">{{ $fact['label'] ?? '' }}</small>
                                    <strong>{{ $fact['value'] ?? '' }}</strong>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        @if($destination->location)
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title mb-3"><i class="fas fa-map-marker-alt text-primary me-2"></i>Location</h5>
                                <p class="card-text">{{ $destination->location }}</p>
                                @if($destination->map_embed_url)
                                <div class="map-container mt-3">
                                    <iframe src="{{ $destination->map_embed_url }}" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endif

                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title mb-3"><i class="fas fa-phone-alt text-primary me-2"></i>Plan Your Visit</h5>
                                <p class="card-text small text-muted">Ready to explore {{ $destination->name }}? Our team is here to help you plan the perfect experience.</p>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-phone-alt text-primary me-3"></i>
                                    <div>
                                        <small class="text-muted d-block">Call Us</small>
                                        <a href="tel:+255786383273" class="text-dark small">+255 786 383 273</a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-envelope text-primary me-3"></i>
                                    <div>
                                        <small class="text-muted d-block">Email Us</small>
                                        <a href="mailto:info@gmsafaris.co.tz" class="text-dark small">info@gmsafaris.co.tz</a>
                                    </div>
                                </div>
                                <div class="d-grid gap-2">
                                    <a href="{{ route('booking') }}" class="btn btn-primary rounded-pill">Book Now</a>
                                    <a href="{{ route('contact') }}" class="btn btn-outline-primary rounded-pill">Enquire Now</a>
                                </div>
                            </div>
                        </div>

                        @if($destination->video_url)
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title mb-3"><i class="fas fa-video text-primary me-2"></i>Video</h5>
                                <div class="ratio ratio-16x9">
                                    <iframe src="{{ $destination->video_url }}" allowfullscreen loading="lazy"></iframe>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    @php
        $resolvedGallery = \App\Models\Destination::resolveGalleryImages($destination->gallery_images);
    @endphp
    @if(count($resolvedGallery) > 0)
    <!-- Gallery Section -->
    <section class="container-fluid py-6 bg-light">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="mb-3">{{ $destination->name }} Gallery</h2>
                <p class="lead text-muted">Photos from this destination</p>
            </div>
            <div class="row g-3">
                @foreach($resolvedGallery as $image)
                <div class="col-lg-3 col-md-6">
                    <a href="{{ is_string($image) ? $image : ($image['full'] ?? '#') }}" data-lightbox="destination-gallery" data-title="{{ $image['caption'] ?? $destination->name }}">
                        <img src="{{ is_string($image) ? $image : ($image['thumb'] ?? $image['full'] ?? '#') }}" class="gallery-img img-fluid rounded shadow-sm" alt="{{ $image['alt'] ?? $destination->name . ' Gallery' }}" loading="lazy">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Gallery Section End -->
    @endif

    @if($relatedDestinations->count() > 0)
    <!-- Related Destinations Section -->
    <div class="container-fluid py-6">
        <div class="container">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="mb-3">Explore More Destinations</h2>
                <p class="lead text-muted">Discover other incredible Tanzania destinations</p>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach($relatedDestinations as $related)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->iteration }}s">
                    <div class="related-card card h-100 shadow-sm">
                        <img src="{{ $related->hero_image ? \App\Models\Destination::resolveImageUrl($related->hero_image) : asset('img/hero-3.jpg') }}" class="card-img-top" alt="{{ $related->name }}" loading="lazy" style="height: 200px; object-fit: cover;">
                        @if($related->badge_text)
                            <div class="badge bg-primary position-absolute top-0 start-0 m-3 py-2 px-3">{{ $related->badge_text }}</div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title mb-2">
                                <a href="{{ route('destination.show', $related->slug) }}" class="text-dark text-decoration-none">{{ $related->name }}</a>
                            </h4>
                            @if($related->short_description)
                                <p class="card-text text-muted flex-grow-1">{{ Str::limit(strip_tags($related->short_description), 120) }}</p>
                            @endif
                            <div class="d-flex justify-content-between mt-auto">
                                <a href="{{ route('destination.show', $related->slug) }}" class="btn btn-outline-primary btn-sm px-3">View Details</a>
                                <a href="{{ route('booking') }}" class="btn btn-primary btn-sm px-3">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('destinations') }}" class="btn btn-primary rounded-pill px-5 py-3">View All Destinations</a>
            </div>
        </div>
    </div>
    @endif

@endsection
