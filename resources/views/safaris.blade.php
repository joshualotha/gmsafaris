@extends('layouts.app')

@section('title', 'Our Safaris - Golden Memories Safaris')
@section('keywords', 'Tanzania safari packages, Serengeti safari tours, Kilimanjaro climbs, Zanzibar holidays, luxury safari Tanzania, budget safari Tanzania, family safari')
@section('description', 'Explore diverse Tanzania safari packages with Golden Memories Safaris. From thrilling wildlife adventures and Kilimanjaro treks to relaxing Zanzibar escapes, find your perfect journey.')
@section('canonical', 'https://www.gmsafaris.co.tz/safaris')
@section('og_title', 'Safari Packages - Golden Memories Safaris')
@section('og_description', 'Explore diverse Tanzania safari packages with Golden Memories Safaris. From thrilling wildlife adventures and Kilimanjaro treks to relaxing Zanzibar escapes, find your perfect journey.')
@section('og_url', 'https://www.gmsafaris.co.tz/safaris')
@section('og_image', 'https://www.gmsafaris.co.tz/img/hero-1.jpg')
@section('twitter_title', 'Safari Packages - Golden Memories Safaris')
@section('twitter_description', 'Explore diverse Tanzania safari packages with Golden Memories Safaris. From thrilling wildlife adventures and Kilimanjaro treks to relaxing Zanzibar escapes, find your perfect journey.')
@section('twitter_image', 'https://www.gmsafaris.co.tz/img/hero-1.jpg')

@section('extra_styles')
<style>
    /* Page Header Style */
    .page-header {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset("img/top.jpg") }}') center center no-repeat;
        background-size: cover;
    }

    /* Safari Package Card Styling - Redesigned */
    .safari-package-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
        background: #fff;
    }
    .safari-package-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.12) !important;
    }

    /* Image Wrapper */
    .safari-card-image-wrapper {
        position: relative;
        height: 220px;
        overflow: hidden;
    }
    .safari-card-image-wrapper .safari-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .safari-package-card:hover .safari-image {
        transform: scale(1.08);
    }
    .safari-card-image-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0.5) 100%);
        pointer-events: none;
    }

    /* Top Badges */
    .safari-card-badge-top {
        position: absolute;
        top: 12px;
        left: 12px;
        right: 12px;
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
        z-index: 2;
    }
    .safari-badge-duration {
        background: rgba(214, 156, 64, 0.95);
        color: #fff;
        font-size: 0.75rem;
        font-weight: 600;
        padding: 4px 12px;
        border-radius: 20px;
        letter-spacing: 0.3px;
        text-transform: uppercase;
        backdrop-filter: blur(4px);
    }
    .safari-badge-type {
        background: rgba(0, 0, 0, 0.55);
        color: #fff;
        font-size: 0.7rem;
        font-weight: 500;
        padding: 4px 10px;
        border-radius: 20px;
        backdrop-filter: blur(4px);
        border: 1px solid rgba(255,255,255,0.15);
    }

    /* Price Tag */
    .safari-card-price-tag {
        position: absolute;
        bottom: 12px;
        right: 12px;
        background: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(6px);
        border: 1px solid rgba(255,255,255,0.12);
        padding: 6px 14px;
        border-radius: 8px;
        text-align: right;
        z-index: 2;
        line-height: 1.2;
    }
    .safari-price-amount {
        display: block;
        color: #d69c40;
        font-size: 1.1rem;
        font-weight: 700;
    }
    .safari-price-label {
        display: block;
        color: rgba(255,255,255,0.7);
        font-size: 0.65rem;
        font-weight: 400;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Card Body */
    .safari-package-card .card-body {
        padding: 1rem 1.25rem 1.25rem;
    }

    /* Meta */
    .safari-meta-location {
        font-size: 0.8rem;
        color: #888;
    }
    .safari-meta-location i {
        color: var(--bs-primary);
        margin-right: 4px;
        font-size: 0.75rem;
    }

    /* Title */
    .safari-card-title {
        font-size: 1.05rem;
        font-weight: 700;
        line-height: 1.3;
    }
    .safari-card-title a {
        color: var(--bs-dark);
        text-decoration: none;
        transition: color 0.2s ease;
    }
    .safari-card-title a:hover {
        color: var(--bs-primary);
    }

    /* Description */
    .safari-card-description {
        font-size: 0.85rem;
        line-height: 1.5;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Highlight Chips */
    .safari-highlights-chips {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
    }
    .safari-chip {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        background: #f8f9fa;
        border: 1px solid #eee;
        border-radius: 6px;
        padding: 3px 10px;
        font-size: 0.75rem;
        color: #495057;
        line-height: 1.4;
    }
    .safari-chip i {
        color: #28a745;
        font-size: 0.7rem;
    }

    /* Card Footer */
    .safari-card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 8px;
    }
    .safari-card-footer .btn {
        flex: 1;
        font-size: 0.8rem;
        font-weight: 600;
        border-radius: 8px;
        padding: 8px 12px;
    }
    .safari-card-footer .btn-outline-primary {
        border-width: 2px;
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

    /* ============================================
       PREMIUM SEARCH & FILTER BAR
       ============================================ */
    .premium-filter-bar {
        position: relative;
        background: #fff;
        border-bottom: 1px solid rgba(212, 167, 98, 0.15);
        padding: 1.75rem 0;
    }
    .premium-filter-bar::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--bs-primary), transparent);
        border-radius: 2px;
    }

    .premium-filter-inner {
        background: linear-gradient(135deg, #fdfcfa 0%, #faf7f2 100%);
        border: 1px solid rgba(212, 167, 98, 0.2);
        border-radius: 16px;
        padding: 1.5rem 2rem;
        box-shadow: 0 4px 24px rgba(212, 167, 98, 0.08), 0 1px 4px rgba(0,0,0,0.02);
        transition: box-shadow 0.3s ease;
    }
    .premium-filter-inner:focus-within {
        box-shadow: 0 6px 32px rgba(212, 167, 98, 0.14), 0 1px 4px rgba(0,0,0,0.03);
    }

    /* Filter label */
    .premium-filter-label {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #b8944e;
        margin-bottom: 6px;
        padding-left: 2px;
    }
    .premium-filter-label i {
        font-size: 0.6rem;
        opacity: 0.7;
    }

    /* Search input */
    .premium-search-wrap {
        position: relative;
    }
    .premium-search-wrap .search-icon {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #c9a96c;
        pointer-events: none;
        transition: color 0.3s ease;
        z-index: 3;
        display: flex;
        align-items: center;
    }
    .premium-search-input {
        width: 100%;
        padding: 0.85rem 1rem 0.85rem 2.75rem;
        font-size: 0.92rem;
        font-weight: 400;
        color: #2d2a24;
        background: #fff;
        border: 1.5px solid #e8e0d4;
        border-radius: 12px;
        outline: none;
        transition: all 0.3s ease;
        font-family: inherit;
        letter-spacing: 0.01em;
    }
    .premium-search-input::placeholder {
        color: #b5aa99;
        font-weight: 300;
        font-size: 0.88rem;
    }
    .premium-search-input:hover {
        border-color: #d4c4b0;
    }
    .premium-search-input:focus {
        border-color: var(--bs-primary);
        box-shadow: 0 0 0 3px rgba(212, 167, 98, 0.12);
    }
    .premium-search-input:focus ~ .search-icon {
        color: var(--bs-primary);
    }

    /* Clear button */
    .premium-search-clear {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        width: 26px;
        height: 26px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        background: #f0ebe4;
        border-radius: 50%;
        color: #8a7e6e;
        font-size: 0.65rem;
        cursor: pointer;
        transition: all 0.25s ease;
        opacity: 0;
        visibility: hidden;
        z-index: 3;
        text-decoration: none;
        line-height: 1;
    }
    .premium-search-clear.visible {
        opacity: 1;
        visibility: visible;
    }
    .premium-search-clear:hover {
        background: #e0d5c8;
        color: #5a4e3e;
    }

    /* Duration select */
    .premium-select-wrap {
        position: relative;
    }
    .premium-select-wrap .select-arrow {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #c9a96c;
        pointer-events: none;
        z-index: 3;
        transition: transform 0.3s ease;
        display: flex;
        align-items: center;
    }
    .premium-select {
        width: 100%;
        padding: 0.85rem 2.5rem 0.85rem 1rem;
        font-size: 0.92rem;
        font-weight: 400;
        color: #2d2a24;
        background: #fff;
        border: 1.5px solid #e8e0d4;
        border-radius: 12px;
        outline: none;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: inherit;
        letter-spacing: 0.01em;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }
    .premium-select:hover {
        border-color: #d4c4b0;
    }
    .premium-select:focus {
        border-color: var(--bs-primary);
        box-shadow: 0 0 0 3px rgba(212, 167, 98, 0.12);
    }
    .premium-select:focus ~ .select-arrow {
        transform: translateY(-50%) rotate(180deg);
    }

    /* Results count bar */
    .premium-results-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.5rem 0 0;
        margin-top: 0.75rem;
        border-top: 1px solid rgba(212, 167, 98, 0.1);
    }
    .premium-results-count {
        font-size: 0.82rem;
        color: #8a7e6e;
        font-weight: 400;
        letter-spacing: 0.01em;
    }
    .premium-results-count strong {
        color: #2d2a24;
        font-weight: 600;
    }
    .premium-results-status {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 0.75rem;
        color: #b5aa99;
    }
    .premium-results-status .status-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #28a745;
        animation: pulse-dot 1.5s ease-in-out infinite;
    }
    .premium-results-status.loading .status-dot {
        background: var(--bs-primary);
        animation: pulse-dot 0.8s ease-in-out infinite;
    }
    @keyframes pulse-dot {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(0.8); }
    }

    /* Responsive tweaks */
    @media (max-width: 767.98px) {
        .premium-filter-inner {
            padding: 1.25rem 1.25rem;
            border-radius: 12px;
        }
        .premium-search-input,
        .premium-select {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            font-size: 0.88rem;
        }
        .premium-filter-label {
            font-size: 0.65rem;
        }
        .premium-results-bar {
            flex-direction: column;
            align-items: flex-start;
            gap: 4px;
        }
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
      "name": "Our Safaris",
      "item": "https://www.gmsafaris.co.tz/safaris"
    }
  ]
}
</script>
@endsection

@section('body_content')

<!-- Page Header Start -->
<div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Our Safari Packages</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Safaris</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Safaris Intro Start -->
<div class="container-fluid bg-light py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h2 class="mb-3">Discover Your Perfect Tanzanian Adventure</h2>
            <p class="lead text-muted mx-auto" style="max-width: 800px;">
                Golden Memories Safaris offers a diverse range of experiences tailored to different interests and travel styles. Whether you dream of witnessing the Great Migration, conquering Kilimanjaro, relaxing on Zanzibar's beaches, or enjoying a luxurious escape, we have a package for you. Explore our popular itineraries below or contact us to create a fully customized journey.
            </p>
        </div>
    </div>
</div>
<!-- Safaris Intro End -->

<!-- Search & Filter Bar Start -->
<div class="container-fluid premium-filter-bar">
    <div class="container">
        <div class="premium-filter-inner">
            <div class="row g-3 align-items-end">
                <!-- Search -->
                <div class="col-lg-8 col-md-7">
                    <div class="premium-filter-label">
                        <i class="fas fa-search"></i>
                        <span>Search</span>
                    </div>
                    <div class="premium-search-wrap">
                        <span class="search-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        </span>
                        <input type="text" id="searchInput" class="premium-search-input" placeholder="Search safaris by name, location, or type..." value="{{ request('search') }}" autocomplete="off">
                        <a href="{{ route('safaris') }}" class="premium-search-clear {{ request('search') || request('duration') ? 'visible' : '' }}" id="clearBtn"><i class="fas fa-times"></i></a>
                    </div>
                </div>
                <!-- Duration Filter -->
                <div class="col-lg-4 col-md-5">
                    <div class="premium-filter-label">
                        <i class="fas fa-clock"></i>
                        <span>Duration</span>
                    </div>
                    <div class="premium-select-wrap">
                        <select id="durationSelect" class="premium-select">
                            <option value="">All Durations</option>
                            @foreach($durations as $d)
                                <option value="{{ $d }}" {{ request('duration') == $d ? 'selected' : '' }}>{{ $d }}</option>
                            @endforeach
                        </select>
                        <span class="select-arrow">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
                        </span>
                    </div>
                </div>
            </div>
            <!-- Results status bar -->
            <div class="premium-results-bar">
                <div class="premium-results-count">
                    Showing <strong id="resultStart">{{ $safaris->firstItem() ?? 0 }}</strong> to <strong id="resultEnd">{{ $safaris->lastItem() ?? 0 }}</strong> of <strong id="resultTotal">{{ $safaris->total() ?? 0 }}</strong> safaris
                </div>
                <div class="premium-results-status" id="filterStatus">
                    <span class="status-dot"></span>
                    <span id="statusText">Ready</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Search & Filter Bar End -->

<!-- Safaris List Start -->
<div class="container-fluid py-6">
    <div class="container">
        <div id="safariResults">
            @include('partials.safari-cards')
        </div>

        <!-- Call to Action for Custom Safaris -->
        <div class="text-center pt-5 mt-4 wow fadeInUp" data-wow-delay="0.5s">
            <h3 class="mb-3">Don't See Exactly What You're Looking For?</h3>
            <p class="lead text-muted mb-4">We specialize in tailor-made adventures! Contact us to design your unique Tanzanian journey.</p>
            <a href="{{ url('/contact') }}" class="btn btn-primary rounded-pill px-5 py-3">Design My Custom Safari</a>
        </div>
    </div>
</div>
<!-- Safaris List End -->

@endsection

@section('extra_scripts')
<script>
(function() {
    var searchInput = document.getElementById('searchInput');
    var durationSelect = document.getElementById('durationSelect');
    var resultsContainer = document.getElementById('safariResults');
    var clearBtn = document.getElementById('clearBtn');
    var resultStart = document.getElementById('resultStart');
    var resultEnd = document.getElementById('resultEnd');
    var resultTotal = document.getElementById('resultTotal');
    var filterStatus = document.getElementById('filterStatus');
    var statusText = document.getElementById('statusText');
    var searchTimer;

    function updateClearButton() {
        if (!clearBtn) return;
        var hasValue = searchInput && searchInput.value.trim().length > 0;
        var hasDuration = durationSelect && durationSelect.value !== '';
        if (hasValue || hasDuration) {
            clearBtn.classList.add('visible');
        } else {
            clearBtn.classList.remove('visible');
        }
    }

    function setLoading(isLoading) {
        if (!filterStatus) return;
        if (isLoading) {
            filterStatus.classList.add('loading');
            if (statusText) statusText.textContent = 'Filtering...';
        } else {
            filterStatus.classList.remove('loading');
            if (statusText) statusText.textContent = 'Ready';
        }
    }

    function updateResultsCount(data) {
        // Try to extract pagination info from the returned HTML
        // The partial renders "Showing X to Y of Z safaris" in a .text-muted small
        if (!resultsContainer) return;
        var countEl = resultsContainer.querySelector('.text-muted');
        if (countEl) {
            var match = countEl.textContent.match(/Showing\s+(\d+)\s+to\s+(\d+)\s+of\s+(\d+)/);
            if (match && resultStart && resultEnd && resultTotal) {
                resultStart.textContent = match[1];
                resultEnd.textContent = match[2];
                resultTotal.textContent = match[3];
            }
        }
    }

    function fetchResults() {
        var params = new URLSearchParams();
        var searchVal = searchInput ? searchInput.value.trim() : '';
        var durationVal = durationSelect ? durationSelect.value : '';
        if (searchVal) params.set('search', searchVal);
        if (durationVal) params.set('duration', durationVal);

        var url = '{{ route("safaris.search") }}?' + params.toString();

        // Update clear button visibility
        updateClearButton();

        // Set loading state
        setLoading(true);

        if (resultsContainer) {
            resultsContainer.style.opacity = '0.4';
            resultsContainer.style.transition = 'opacity 0.2s';
        }

        fetch(url)
            .then(function(res) { return res.json(); })
            .then(function(data) {
                if (resultsContainer) {
                    resultsContainer.innerHTML = data.html;
                    resultsContainer.style.opacity = '1';
                }
                updateResultsCount(data);
                setLoading(false);
                var newUrl = window.location.pathname + '?' + params.toString();
                window.history.replaceState({}, '', params.toString() ? newUrl : window.location.pathname);
            })
            .catch(function() {
                if (resultsContainer) resultsContainer.style.opacity = '1';
                setLoading(false);
            });
    }

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimer);
            searchTimer = setTimeout(fetchResults, 300);
        });
        // Initial clear button state
        updateClearButton();
    }

    if (durationSelect) {
        durationSelect.addEventListener('change', fetchResults);
    }

    // Clear button click handler
    if (clearBtn) {
        clearBtn.addEventListener('click', function(e) {
            e.preventDefault();
            if (searchInput) searchInput.value = '';
            if (durationSelect) durationSelect.value = '';
            updateClearButton();
            fetchResults();
        });
    }

    // Handle pagination clicks via event delegation
    if (resultsContainer) {
        resultsContainer.addEventListener('click', function(e) {
            var link = e.target.closest('.pagination-link');
            if (link) {
                e.preventDefault();
                var page = link.getAttribute('data-page');
                if (page) {
                    var params = new URLSearchParams();
                    var searchVal = searchInput ? searchInput.value.trim() : '';
                    var durationVal = durationSelect ? durationSelect.value : '';
                    if (searchVal) params.set('search', searchVal);
                    if (durationVal) params.set('duration', durationVal);
                    params.set('page', page);

                    var url = '{{ route("safaris.search") }}?' + params.toString();

                    setLoading(true);

                    if (resultsContainer) {
                        resultsContainer.style.opacity = '0.4';
                        resultsContainer.style.transition = 'opacity 0.2s';
                    }

                    fetch(url)
                        .then(function(res) { return res.json(); })
                        .then(function(data) {
                            if (resultsContainer) {
                                resultsContainer.innerHTML = data.html;
                                resultsContainer.style.opacity = '1';
                            }
                            updateResultsCount(data);
                            setLoading(false);
                            window.history.replaceState({}, '', window.location.pathname + '?' + params.toString());
                            resultsContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        })
                        .catch(function() {
                            if (resultsContainer) resultsContainer.style.opacity = '1';
                            setLoading(false);
                        });
                }
            }
        });
    }
})();
</script>
@endsection
