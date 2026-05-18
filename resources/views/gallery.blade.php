@extends('layouts.app')

@section('title', 'Tanzania Safari Photo Gallery | Wildlife & Landscape Images')
@section('keywords', 'Tanzania safari gallery, wildlife photos, Serengeti pictures, Kilimanjaro photos, Zanzibar photos, safari images')
@section('description', 'Browse our Tanzania safari photo gallery featuring stunning wildlife, breathtaking landscapes, and luxury lodges. Get inspired for your African adventure with Golden Memories Safaris.')
@section('canonical', 'https://www.gmsafaris.co.tz/gallery')
@section('og_title', 'Photo Gallery - Golden Memories Safaris')
@section('og_description', 'Explore stunning photos from Golden Memories Safaris adventures across Tanzania. Get inspired by incredible wildlife, breathtaking landscapes, vibrant cultures, and beautiful lodges.')
@section('og_url', 'https://www.gmsafaris.co.tz/gallery')
@section('og_image', 'https://www.gmsafaris.co.tz/img/hero-1.webp')
@section('twitter_title', 'Photo Gallery - Golden Memories Safaris')
@section('twitter_description', 'Explore stunning photos from Golden Memories Safaris adventures across Tanzania. Get inspired by incredible wildlife, breathtaking landscapes, vibrant cultures, and beautiful lodges.')
@section('twitter_image', 'https://www.gmsafaris.co.tz/img/hero-1.webp')

@section('structured_data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://www.gmsafaris.co.tz/" },
        { "@type": "ListItem", "position": 2, "name": "Gallery", "item": "https://www.gmsafaris.co.tz/gallery" }
    ]
}
</script>
@endsection

@section('extra_styles')
<style>
    .page-header {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('img/gallery-hero.webp') }}) center center no-repeat;
        background-size: cover;
    }
    .gallery-item-inner { position: relative; overflow: hidden; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); transition: transform 0.3s ease; background-color: #f8f9fa; padding: 1rem; height: 100%; }
    .gallery-item-inner:hover { transform: translateY(-5px); box-shadow: 0 8px 16px rgba(0,0,0,0.15); }
    .gallery-item-inner img { display: block; width: 100%; height: 280px; object-fit: cover; border-radius: 4px; }
    .gallery-item-inner .gallery-overlay { position: absolute; top: 1rem; left: 1rem; right: 1rem; bottom: 1rem; background: rgba(0, 0, 0, 0.5); display: flex; justify-content: center; align-items: center; opacity: 0; transition: opacity 0.3s ease; border-radius: 4px; }
    .gallery-item-inner:hover .gallery-overlay { opacity: 1; }
    .gallery-item-inner .gallery-overlay i { color: white; font-size: 2rem; }
    .footer-logo { max-width: 100%; height: auto; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1)); }
    .py-6 { padding-top: 6rem; padding-bottom: 6rem; }
</style>
@endsection

@section('body_content')

    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Our Safari Gallery</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Gallery</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container-fluid py-6">
        <div class="container">
            <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                 <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Visual Journey</small>
                <h1 class="display-5 mb-4">Experience Tanzania Through Our Lens</h1>
                <p class="lead mb-5 mx-auto" style="max-width: 800px;">
                    Welcome to the Golden Memories Safaris gallery! This section offers a glimpse into the magic of Tanzania as captured during our adventures. Browse through stunning wildlife encounters, breathtaking landscapes, vibrant cultural moments, and the comfortable lodges that await you. We hope these images inspire your own unforgettable Tanzanian journey.
                </p>
            </div>
        </div>
    </div>

    <div class="container-fluid gallery-main-content pb-6">
        <div class="container">
            <div class="row g-4 gallery-container">
                <div id="gallery-items-placeholder" style="display:contents;"></div> 
            </div>
        </div>
    </div>

@endsection

@section('extra_scripts')
<script>
    function shuffleArray(arr) {
        for (var i = arr.length - 1; i > 0; i--) {
            var j = Math.floor(Math.random() * (i + 1));
            var temp = arr[i];
            arr[i] = arr[j];
            arr[j] = temp;
        }
        return arr;
    }

    function loadGalleryFromApi() {
        var placeholder = document.getElementById('gallery-items-placeholder');
        if (!placeholder) return;

        fetch('{{ route("api.gallery") }}')
            .then(function(response) { return response.json(); })
            .then(function(images) {
                // Shuffle for random display
                images = shuffleArray(images);

                if (images.length === 0) {
                    placeholder.innerHTML = '<div class="col-12 text-center py-5"><p class="text-muted">No gallery images available yet.</p></div>';
                    return;
                }

                var galleryHtml = '';
                images.forEach(function(image, index) {
                    var delay = ((index % 10) + 1) * 0.1;
                    var title = image.caption || 'Golden Memories Safari - Tanzania';
                    var alt = image.alt_text || 'Tanzania Safari Gallery Image';
                    galleryHtml += '<div class="col-lg-4 col-md-6 wow fadeInUp gallery-item" data-wow-delay="' + delay.toFixed(1) + 's">' +
                        '<div class="gallery-item-inner">' +
                        '<a href="' + image.full_url + '" data-lightbox="gallery" data-title="' + title.replace(/"/g, '"') + '">' +
                        '<img src="' + image.thumb_url + '" class="img-fluid w-100" alt="' + alt.replace(/"/g, '"') + '" loading="lazy">' +
                        '<div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>' +
                        '</a>' +
                        '</div></div>';
                });
                placeholder.innerHTML = galleryHtml;

                // Re-initialize WOW for new items
                if (typeof WOW !== 'undefined') {
                    new WOW().init();
                }
            })
            .catch(function() {
                placeholder.innerHTML = '<div class="col-12 text-center py-5"><p class="text-muted">Unable to load gallery images. Please try again later.</p></div>';
            });
    }

    document.addEventListener('DOMContentLoaded', function() {
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'fadeDuration': 300,
            'imageFadeDuration': 300,
            'alwaysShowNavOnTouchDevices': true
        });
        new WOW().init();
        loadGalleryFromApi();
    });
</script>
@endsection
