@extends('layouts.app')

@section('title', $post->seo_title ?? $post->title . ' - Golden Memories Safaris Blog')
@section('keywords', $post->seo_keywords ?? implode(', ', $post->tags ?? []))
@section('description', $post->seo_description ?? $post->excerpt)
@section('canonical', 'https://www.gmsafaris.co.tz/blog/' . $post->slug)
@section('og_title', $post->seo_title ?? $post->title . ' - Golden Memories Safaris Blog')
@section('og_description', $post->seo_description ?? $post->excerpt)
@section('og_url', 'https://www.gmsafaris.co.tz/blog/' . $post->slug)
@section('og_image', $post->hero_image_url ?? site_image('logo'))
@section('twitter_title', $post->seo_title ?? $post->title . ' - Golden Memories Safaris Blog')
@section('twitter_description', $post->seo_description ?? $post->excerpt)
@section('twitter_image', $post->hero_image_url ?? site_image('logo'))

@section('structured_data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://www.gmsafaris.co.tz/" },
        { "@type": "ListItem", "position": 2, "name": "Blog", "item": "https://www.gmsafaris.co.tz/blog" },
        { "@type": "ListItem", "position": 3, "name": "{{ $post->title }}", "item": "https://www.gmsafaris.co.tz/blog/{{ $post->slug }}" }
    ]
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Article",
    "headline": "{{ $post->title }}",
    "description": "{{ $post->seo_description ?? $post->excerpt }}",
    "image": "{{ $post->hero_image_url ?? site_image('logo') }}",
    "author": {
        "@type": "Person",
        "name": "{{ $post->author ?? 'Golden Memories Safaris' }}"
    },
    "publisher": {
        "@type": "Organization",
        "name": "Golden Memories Safaris",
        "logo": {
            "@type": "ImageObject",
            "url": "{{ site_image('logo') }}"
        }
    },
    "datePublished": "{{ $post->published_at ?? date('c') }}",
    "dateModified": "{{ $post->updated_at ?? $post->published_at ?? date('c') }}",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "https://www.gmsafaris.co.tz/blog/{{ $post->slug }}"
    }
}
</script>
@endsection

@section('extra_styles')
<style>
    .page-header {
        background: linear-gradient(rgba(0, 0, 0, .6), rgba(0, 0, 0, .6)), url({{ $post->hero_image_url ?? site_image('blog_hero_fallback') }}) center center no-repeat;
        background-size: cover;
    }
    .blog-content img {
        max-width: 100%; height: auto;
        border-radius: 0.375rem; margin: 1rem 0;
    }
    .blog-content h2, .blog-content h3, .blog-content h4 {
        margin-top: 2rem; margin-bottom: 1rem; font-weight: 600;
    }
    .blog-content ul {
        padding-left: 1.5rem; margin-bottom: 1rem;
    }
    .blog-content li { margin-bottom: 0.5rem; }
    .blog-content blockquote {
        border-left: 4px solid var(--bs-primary); padding-left: 1.5rem;
        margin: 1.5rem 0; font-style: italic; color: #6c757d;
    }
    .sidebar .widget {
        margin-bottom: 2rem; padding: 1.5rem; background-color: #f8f9fa;
        border-radius: 0.375rem; border: 1px solid #eee;
    }
    .sidebar .widget-title {
        font-size: 1.25rem; margin-bottom: 1rem; font-weight: 600;
        border-bottom: 2px solid var(--bs-primary); padding-bottom: 0.5rem;
        display: inline-block;
    }
    .sidebar ul { list-style: none; padding-left: 0; }
    .sidebar ul li { margin-bottom: 0.5rem; }
    .sidebar ul li a { text-decoration: none; color: var(--bs-dark); transition: color 0.2s ease; }
    .sidebar ul li a:hover { color: var(--bs-primary); }
    .sidebar .form-control { border-color: #ced4da; }
    .sidebar .btn-primary { border-radius: 0 0.25rem 0.25rem 0; }
    .blog-main-content { max-width: 900px; margin-left: auto; margin-right: auto; }
    .alert-warning { border-left: 5px solid var(--bs-warning); }
</style>
@endsection

@section('body_content')

<!-- Page Header Start -->
<div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-4">{{ $post->title }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="{{ route('blog') }}">Blog</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">{{ $post->category ?? 'Blog Post' }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Blog Detail Content Start -->
<div class="container-fluid py-6">
    <div class="container">
        <div class="row">
            <!-- Blog Post Content -->
            <div class="col-lg-8 wow bounceInUp" data-wow-delay="0.1s">
                <div class="blog-main-content blog-content">

                    @if($post->reading_time || $post->author)
                    <div class="blog-post-meta mb-4">
                        @if($post->author)
                        <small class="text-muted me-3"><i class="fas fa-user"></i> {{ $post->author }}</small>
                        @endif
                        @if($post->published_at)
                        <small class="text-muted me-3"><i class="fas fa-calendar-alt"></i> {{ $post->published_at->format('F d, Y') }}</small>
                        @endif
                        @if($post->reading_time)
                        <small class="text-muted"><i class="fas fa-clock"></i> {{ $post->reading_time }}</small>
                        @endif
                    </div>
                    @endif

                    {!! $post->content !!}

                    <!-- Author Bio Section (E-E-A-T Signal) -->
                    @if($post->author)
                    <div class="author-bio d-flex align-items-start p-4 mt-5 bg-light rounded-3 border-start border-primary border-4">
                        <div class="author-avatar me-4 flex-shrink-0">
                            <img src="{{ site_image('logo') }}"
                                 alt="{{ $post->author }} - Golden Memories Safaris"
                                 class="rounded-circle"
                                 width="80" height="80"
                                 loading="lazy"
                                 style="object-fit: cover; border: 3px solid #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                        </div>
                        <div class="author-info">
                            <h5 class="mb-1 fw-bold">{{ $post->author }}</h5>
                            <p class="text-muted small mb-2">
                                <i class="fas fa-map-pin text-primary me-1"></i>Arusha, Tanzania
                            </p>
                            <p class="mb-2 small lh-sm">
                                {{ $post->author === 'Golden Memories Safaris' ? 'Golden Memories Safaris is a locally owned and operated Tanzanian tour operator based in Arusha. We specialize in crafting authentic, responsible, and unforgettable safari adventures across Tanzania\'s most iconic destinations, from the Serengeti and Ngorongoro Crater to Kilimanjaro and Zanzibar. Our team of expert guides brings decades of combined experience and a deep passion for East African wildlife and culture.' : $post->author . ' is a contributor to the Golden Memories Safaris blog, sharing expert insights about Tanzania travel, safari adventures, and East African culture.' }}
                            </p>
                            <div class="d-flex gap-3">
                                <a href="{{ route('about') }}" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                    <i class="fas fa-user me-1"></i>About the Author
                                </a>
                                <a href="{{ route('booking') }}" class="btn btn-primary btn-sm rounded-pill px-3">
                                    <i class="fas fa-paper-plane me-1"></i>Plan Your Safari
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 wow bounceInUp" data-wow-delay="0.3s">
                <div class="sidebar">

                    <!-- Categories Widget -->
                    <div class="widget">
                        <h4 class="widget-title">Categories</h4>
                        <ul>
                            @php
                                $categories = \App\Models\BlogPost::published()->select('category')->distinct()->get();
                            @endphp
                            @foreach($categories as $cat)
                            <li><a href="{{ route('blog') }}?category={{ urlencode($cat->category) }}"><i class="fas fa-angle-right me-2"></i>{{ $cat->category }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Recent Posts Widget -->
                    @if(isset($relatedPosts) && $relatedPosts->count() > 0)
                    <div class="widget">
                        <h4 class="widget-title">Recent Posts</h4>
                        <ul>
                            @foreach($relatedPosts as $related)
                            <li>
                                <a href="{{ route('blog.show', $related->slug) }}">
                                    <i class="fas fa-angle-right me-2"></i>{{ $related->title }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Call to Action Widget -->
                    <div class="widget text-center">
                        <h4 class="widget-title">Ready for Adventure?</h4>
                        <p>Let us help you plan your dream Tanzanian safari.</p>
                        <a href="{{ route('booking') }}" class="btn btn-primary rounded-pill w-100">Plan Your Safari</a>
                    </div>

                    {{-- INTERNAL LINKING: Related Safaris --}}
                    @if(isset($relatedSafaris) && $relatedSafaris->count() > 0)
                    <div class="widget">
                        <h4 class="widget-title">Recommended Safaris</h4>
                        <ul>
                            @foreach($relatedSafaris as $safari)
                            <li class="mb-3">
                                <a href="{{ route('safari.show', $safari->slug) }}" class="d-flex align-items-start">
                                    <img src="{{ $safari->hero_image ? \App\Models\Safari::resolveImageUrl($safari->hero_image) : site_image('hero_fallback_1') }}"
                                         alt="{{ $safari->title }}"
                                         loading="lazy"
                                         style="width: 60px; height: 60px; object-fit: cover; border-radius: 0.25rem; margin-right: 0.75rem; flex-shrink: 0;">
                                    <div>
                                        <strong class="d-block small">{{ $safari->title }}</strong>
                                        @if($safari->duration)
                                            <small class="text-muted"><i class="fas fa-calendar-alt me-1"></i>{{ $safari->duration }}</small>
                                        @endif
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="text-center mt-3">
                            <a href="{{ route('safaris') }}" class="btn btn-outline-primary btn-sm rounded-pill">View All Safaris</a>
                        </div>
                    </div>
                    @endif

                    {{-- INTERNAL LINKING: Related Destinations --}}
                    @if(isset($relatedDestinations) && $relatedDestinations->count() > 0)
                    <div class="widget">
                        <h4 class="widget-title">Explore Destinations</h4>
                        <ul>
                            @foreach($relatedDestinations as $dest)
                            <li>
                                <a href="{{ route('destination.show', $dest->slug) }}">
                                    <i class="fas fa-map-marker-alt me-2 text-primary"></i>{{ $dest->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="text-center mt-3">
                            <a href="{{ route('destinations') }}" class="btn btn-outline-primary btn-sm rounded-pill">View All Destinations</a>
                        </div>
                    </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</div>
<!-- Blog Detail Content End -->

{{-- INTERNAL LINKING: Bottom Cross-Link Section (Safaris + Destinations) --}}
@if((isset($relatedSafaris) && $relatedSafaris->count() > 0) || (isset($relatedDestinations) && $relatedDestinations->count() > 0))
<div class="container-fluid bg-light py-6">
    <div class="container">
        @if(isset($relatedSafaris) && $relatedSafaris->count() > 0)
        <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <h2 class="mb-3">Plan Your Safari</h2>
            <p class="lead text-muted">Turn your Tanzania travel dreams into reality with these safari packages</p>
        </div>
        <div class="row g-4 justify-content-center mb-5">
            @foreach($relatedSafaris as $safari)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->iteration }}s">
                <div class="related-card card h-100 shadow-sm">
                    <img src="{{ $safari->hero_image ? \App\Models\Safari::resolveImageUrl($safari->hero_image) : site_image('hero_fallback_1') }}" class="card-img-top" alt="{{ $safari->title }}" loading="lazy" style="height: 200px; object-fit: cover;">
                    @if($safari->duration)
                        <div class="badge bg-primary position-absolute top-0 start-0 m-3 py-2 px-3">{{ $safari->duration }}</div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title mb-2">
                            <a href="{{ route('safari.show', $safari->slug) }}" class="text-dark text-decoration-none">{{ $safari->title }}</a>
                        </h4>
                        @if($safari->short_description)
                            <p class="card-text text-muted flex-grow-1">{{ Str::limit(strip_tags($safari->short_description), 120) }}</p>
                        @endif
                        <div class="d-flex justify-content-between mt-auto">
                            <a href="{{ route('safari.show', $safari->slug) }}" class="btn btn-outline-primary btn-sm px-3">View Details</a>
                            <a href="{{ route('booking.create', $safari->slug) }}" class="btn btn-primary btn-sm px-3">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        @if(isset($relatedDestinations) && $relatedDestinations->count() > 0)
        <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <h2 class="mb-3">Explore These Destinations</h2>
            <p class="lead text-muted">Discover more about Tanzania's incredible destinations</p>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($relatedDestinations as $dest)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->iteration }}s">
                <div class="related-card card h-100 shadow-sm">
                    <img src="{{ $dest->hero_image ? \App\Models\Destination::resolveImageUrl($dest->hero_image) : site_image('hero_fallback_3') }}" class="card-img-top" alt="{{ $dest->name }}" loading="lazy" style="height: 200px; object-fit: cover;">
                    @if($dest->badge_text)
                        <div class="badge bg-primary position-absolute top-0 start-0 m-3 py-2 px-3">{{ $dest->badge_text }}</div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title mb-2">
                            <a href="{{ route('destination.show', $dest->slug) }}" class="text-dark text-decoration-none">{{ $dest->name }}</a>
                        </h4>
                        @if($dest->short_description)
                            <p class="card-text text-muted flex-grow-1">{{ Str::limit(strip_tags($dest->short_description), 120) }}</p>
                        @endif
                        <div class="d-flex justify-content-between mt-auto">
                            <a href="{{ route('destination.show', $dest->slug) }}" class="btn btn-outline-primary btn-sm px-3">Explore</a>
                            <a href="{{ route('booking') }}" class="btn btn-primary btn-sm px-3">Book Safari</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <div class="text-center mt-5">
            <a href="{{ route('safaris') }}" class="btn btn-primary rounded-pill px-5 py-3 me-3">View All Safaris</a>
            <a href="{{ route('destinations') }}" class="btn btn-outline-primary rounded-pill px-5 py-3">View All Destinations</a>
        </div>
    </div>
</div>
@endif

@endsection
