@extends('layouts.app')

@section('title', 'Tanzania Safari Blog | Travel Tips & Wildlife Guides')
@section('keywords', 'Tanzania safari blog, travel tips Tanzania, wildlife news, Kilimanjaro advice, Zanzibar stories, Golden Memories Safaris blog')
@section('description', 'Read expert Tanzania travel tips, safari guides, and wildlife stories from Golden Memories Safaris. Plan your Serengeti adventure, Kilimanjaro climb & Zanzibar getaway.')
@section('canonical', 'https://www.gmsafaris.co.tz/blog')
@section('og_title', 'Travel Blog - Golden Memories Safaris')
@section('og_description', 'Read the latest safari stories, travel tips, wildlife news, and adventure advice from the experts at Golden Memories Safaris Blog.')
@section('og_url', 'https://www.gmsafaris.co.tz/blog')
@section('og_image', 'https://www.gmsafaris.co.tz/img/hero-1.jpg')
@section('twitter_title', 'Travel Blog - Golden Memories Safaris')
@section('twitter_description', 'Read the latest safari stories, travel tips, wildlife news, and adventure advice from the experts at Golden Memories Safaris Blog.')
@section('twitter_image', 'https://www.gmsafaris.co.tz/img/hero-1.jpg')

@section('extra_styles')
<style>
    .page-header {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(img/blog-hero.jpg) center center no-repeat;
        background-size: cover;
    }
    .blog-post-item .card-img-top {
        height: 250px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    .blog-post-item:hover .card-img-top {
        transform: scale(1.05);
    }
    .blog-post-item {
        transition: box-shadow 0.3s ease-in-out;
    }
    .blog-post-item:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
    .blog-post-item .card-title a {
        color: var(--bs-dark);
        text-decoration: none;
        transition: color 0.3s ease;
    }
    .blog-post-item .card-title a:hover {
        color: var(--bs-primary);
    }
    .blog-post-meta small {
        margin-right: 15px;
        font-size: 0.85em;
    }
    .blog-post-meta i {
        margin-right: 5px;
    }
    .blog-post-item .card-body {
        position: relative;
    }
    .pagination .page-item .page-link {
        color: var(--bs-primary);
        border: 1px solid #dee2e6;
        transition: all 0.3s ease;
        margin: 0 2px;
        border-radius: 0.25rem;
    }
    .pagination .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: var(--bs-primary);
        border-color: var(--bs-primary);
    }
    .pagination .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        background-color: #fff;
        border-color: #dee2e6;
    }
    .pagination .page-item .page-link:hover {
        z-index: 2;
        color: var(--bs-primary);
        background-color: #e9ecef;
        border-color: #dee2e6;
    }
    .pagination .page-item.active .page-link:hover {
        background-color: var(--bs-primary);
        border-color: var(--bs-primary);
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
</style>
@endsection

@section('structured_data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "https://www.gmsafaris.co.tz/"
        },
        {
            "@type": "ListItem",
            "position": 2,
            "name": "Safari Blog",
            "item": "https://www.gmsafaris.co.tz/blog"
        }
    ]
}
</script>
@endsection

@section('body_content')

<!-- Page Header Start -->
<div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Our Safari Blog</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Blog</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Blog Intro Start -->
<div class="container-fluid bg-light py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h2 class="mb-3">Safari Stories, Tips & Inspiration</h2>
            <p class="lead text-muted mx-auto" style="max-width: 700px;">
                Welcome to the Golden Memories Safaris journal! Dive into our collection of articles featuring expert travel advice, fascinating wildlife facts, cultural insights, recent trip reports, and everything you need to know to plan your perfect Tanzanian adventure.
            </p>
        </div>
    </div>
</div>
<!-- Blog Intro End -->

<!-- Blog List Start -->
<div class="container-fluid py-6">
    <div class="container">
        <div class="row g-4 justify-content-center">

            @forelse($posts as $post)
            <!-- Blog Post -->
            <div class="col-lg-6 mb-4 wow fadeInUp" data-wow-delay="{{ $loop->index % 2 == 0 ? '0.1s' : '0.2s' }}">
                <div class="card blog-post-item h-100 border-0 shadow-sm overflow-hidden">
                    <a href="{{ route('blog.show', $post->slug) }}">
                        <img src="{{ $post->hero_image_url ?? asset('img/blog-hero.jpg') }}" class="card-img-top" alt="{{ $post->title }}" loading="lazy">
                    </a>
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3 blog-post-meta">
                            @if($post->published_at)
                            <small class="text-muted"><i class="fas fa-calendar-alt"></i> {{ $post->published_at->format('F d, Y') }}</small>
                            @endif
                            @if($post->category)
                            <small class="text-muted ms-2"><i class="fas fa-tag"></i> {{ $post->category }}</small>
                            @endif
                        </div>
                        <h4 class="card-title mb-3">
                            <a href="{{ route('blog.show', $post->slug) }}" class="stretched-link">{{ $post->title }}</a>
                        </h4>
                        <p class="card-text text-muted flex-grow-1">
                            {{ $post->excerpt }}
                        </p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <h3>No Blog Posts Yet</h3>
                <p class="text-muted">Check back soon for new safari stories and travel tips!</p>
            </div>
            @endforelse

        </div>

        <!-- Pagination Start -->
        @if($posts->hasPages())
        <div class="row mt-5 wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-12 d-flex justify-content-center">
                <nav aria-label="Blog page navigation">
                    <ul class="pagination">
                        {{ $posts->links() }}
                    </ul>
                </nav>
            </div>
        </div>
        @endif

    </div>
</div>
<!-- Blog List End -->

@endsection
