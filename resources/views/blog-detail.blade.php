@extends('layouts.app')

@section('title', $post->seo_title ?? $post->title . ' - Golden Memories Safaris Blog')
@section('keywords', $post->seo_keywords ?? implode(', ', $post->tags ?? []))
@section('description', $post->seo_description ?? $post->excerpt)
@section('canonical', 'https://www.gmsafaris.co.tz/blog/' . $post->slug)
@section('og_title', $post->seo_title ?? $post->title . ' - Golden Memories Safaris Blog')
@section('og_description', $post->seo_description ?? $post->excerpt)
@section('og_url', 'https://www.gmsafaris.co.tz/blog/' . $post->slug)
@section('og_image', $post->hero_image_url ?? 'https://www.gmsafaris.co.tz/img/logo.png')
@section('twitter_title', $post->seo_title ?? $post->title . ' - Golden Memories Safaris Blog')
@section('twitter_description', $post->seo_description ?? $post->excerpt)
@section('twitter_image', $post->hero_image_url ?? 'https://www.gmsafaris.co.tz/img/logo.png')

@section('extra_styles')
<style>
    .page-header {
        background: linear-gradient(rgba(0, 0, 0, .6), rgba(0, 0, 0, .6)), url({{ $post->hero_image_url ?? 'img/blog-hero.jpg' }}) center center no-repeat;
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
            "name": "Blog",
            "item": "https://www.gmsafaris.co.tz/blog"
        },
        {
            "@type": "ListItem",
            "position": 3,
            "name": "{{ $post->title }}",
            "item": "https://www.gmsafaris.co.tz/blog/{{ $post->slug }}"
        }
    ]
}
</script>
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

                </div>
            </div>

        </div>
    </div>
</div>
<!-- Blog Detail Content End -->

<!-- Footer Start -->
<div class="container-fluid footer py-6 my-6 mb-0 bg-light wow bounceInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="Golden Memories Safaris Logo" class="footer-logo mb-4" width="180" height="40">
                    </a>
                    <div class="d-flex flex-column align-items-start mb-4">
                        <p class="mb-1"><i class="fa fa-map-marker-alt text-primary me-2"></i> Arusha, Tanzania</p>
                        <p class="mb-1"><i class="fa fa-phone-alt text-primary me-2"></i> +255 786 383 273</p>
                        <p class="mb-1"><i class="fas fa-envelope text-primary me-2"></i> info@gmsafaris.co.tz</p>
                        <p class="mb-1"><i class="fa fa-clock text-primary me-2"></i> Mon-Sun: 8AM - 6PM</p>
                    </div>
                    <div class="footer-icon d-flex">
                        <a class="btn btn-primary btn-sm-square me-2 rounded-circle" href="#" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-sm-square me-2 rounded-circle" href="#" target="_blank" rel="noopener noreferrer" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
                        <a href="#" class="btn btn-primary btn-sm-square me-2 rounded-circle" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="btn btn-primary btn-sm-square rounded-circle" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="mb-4">Our Services</h4>
                    <div class="d-flex flex-column align-items-start">
                        <a class="text-body mb-2" href="{{ route('tailoredsafaris') }}"><i class="fa fa-check text-primary me-2"></i>Tailored Safaris</a>
                        <a class="text-body mb-2" href="{{ route('luxurysafari') }}"><i class="fa fa-check text-primary me-2"></i>Luxury Safaris</a>
                        <a class="text-body mb-2" href="{{ route('mountaintrekking') }}"><i class="fa fa-check text-primary me-2"></i>Mountain Trekking</a>
                        <a class="text-body mb-2" href="{{ route('groupsafaris') }}"><i class="fa fa-check text-primary me-2"></i>Group Safaris</a>
                        <a class="text-body mb-2" href="{{ url('/ZanzibarArchipelago') }}"><i class="fa fa-check text-primary me-2"></i>Zanzibar Holidays</a>
                        <a class="text-body mb-2" href="{{ route('budgetsafari') }}"><i class="fa fa-check text-primary me-2"></i>Budget Safaris</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="mb-4">Useful Links</h4>
                    <div class="d-flex flex-column align-items-start">
                        <a class="text-body mb-2" href="{{ route('besttimetovisit') }}"><i class="fa fa-check text-primary me-2"></i>Best Time to Visit</a>
                        <a class="text-body mb-2" href="{{ route('localcustoms') }}"><i class="fa fa-check text-primary me-2"></i>Local Customs & Etiquette</a>
                        <a class="text-body mb-2" href="{{ route('healthandsafety') }}"><i class="fa fa-check text-primary me-2"></i>Health & Safety Guide</a>
                        <a class="text-body mb-2" href="{{ route('visa') }}"><i class="fa fa-check text-primary me-2"></i>Visa Information</a>
                        <a class="text-body mb-2" href="{{ route('insuarance') }}"><i class="fa fa-check text-primary me-2"></i>Insurance & Emergency</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
@endsection
