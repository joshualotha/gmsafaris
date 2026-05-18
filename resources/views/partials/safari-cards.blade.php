@if($safaris->count() > 0)
<div class="mb-3">
    <small class="text-muted">Showing {{ $safaris->firstItem() }} to {{ $safaris->lastItem() }} of {{ $safaris->total() }} safaris</small>
</div>
<div class="row g-4 justify-content-center">
    @foreach($safaris as $index => $safari)
    @php
        $delay = (($index % 4) * 0.1) + 0.1;
        $thumbImage = $safari->hero_image ?: $safari->thumbnail_image;
        $highlights = $safari->highlights ?? [];
        $firstThreeHighlights = array_slice($highlights, 0, 3);
    @endphp
    <div class="col-lg-3 col-md-6">
        <div class="safari-package-card card h-100 border-0 shadow-sm">
            <!-- Image Section -->
            <div class="safari-card-image-wrapper position-relative overflow-hidden">
                <img src="{{ $thumbImage ? \App\Models\Safari::resolveImageUrl($thumbImage) : site_image('hero_fallback_1') }}" class="card-img-top safari-image" alt="{{ $safari->title }}" loading="lazy">
                <div class="safari-card-image-overlay"></div>
                <div class="safari-card-badge-top">
                    <span class="safari-badge-duration">{{ $safari->duration }}</span>
                    @if($safari->badge_text)
                    <span class="safari-badge-type">{{ $safari->badge_text }}</span>
                    @endif
                </div>
                @if($safari->price_from)
                <div class="safari-card-price-tag">
                    <span class="safari-price-amount">${{ number_format($safari->price_from, 0) }}</span>
                    <span class="safari-price-label">per person</span>
                </div>
                @endif
            </div>

            <!-- Content Section -->
            <div class="card-body d-flex flex-column p-3">
                <div class="safari-meta mb-2">
                    @if($safari->location)
                    <span class="safari-meta-location"><i class="fas fa-map-marker-alt"></i> {{ $safari->location }}</span>
                    @endif
                </div>

                <h4 class="safari-card-title mb-2">
                    <a href="{{ route('safari.show', $safari->slug) }}">{{ $safari->title }}</a>
                </h4>

                <p class="safari-card-description text-muted mb-3">
                    {{ $safari->short_description ?: Str::limit(strip_tags($safari->description), 120) }}
                </p>

                @if(count($firstThreeHighlights) > 0)
                <div class="safari-highlights-chips mb-3">
                    @foreach($firstThreeHighlights as $highlight)
                    <span class="safari-chip">
                        <i class="fas fa-check-circle"></i>
                        {{ is_array($highlight) ? $highlight['title'] ?? $highlight['description'] ?? '' : $highlight }}
                    </span>
                    @endforeach
                </div>
                @endif

                <div class="safari-card-footer mt-auto pt-3 border-top">
                    <a href="{{ route('safari.show', $safari->slug) }}" class="btn btn-outline-primary btn-sm px-3">View Details</a>
                    <a href="{{ route('inquiry.create', $safari->slug) }}" class="btn btn-primary btn-sm px-3">Inquire Now</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div> <!-- End row -->

@if($safaris->hasPages())
<div class="d-flex justify-content-center mt-5">
    <nav aria-label="Safari packages pagination">
        <ul class="pagination pagination-lg mb-0">
            @if($safaris->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link rounded-pill me-2 px-3 border-0 bg-light text-muted"><i class="fas fa-chevron-left me-1"></i> Prev</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link rounded-pill me-2 px-3 border-0 bg-light text-dark pagination-link" href="{{ $safaris->previousPageUrl() }}" data-page="{{ $safaris->currentPage() - 1 }}"><i class="fas fa-chevron-left me-1"></i> Prev</a>
                </li>
            @endif

            @foreach($safaris->getUrlRange(1, $safaris->lastPage()) as $page => $url)
                @if($page == $safaris->currentPage())
                    <li class="page-item active">
                        <span class="page-link rounded-pill mx-1 px-3 border-0" style="background: var(--bs-primary);">{{ $page }}</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link rounded-pill mx-1 px-3 border-0 bg-light text-dark pagination-link" href="{{ $url }}" data-page="{{ $page }}">{{ $page }}</a>
                    </li>
                @endif
            @endforeach

            @if($safaris->hasMorePages())
                <li class="page-item">
                    <a class="page-link rounded-pill ms-2 px-3 border-0 bg-light text-dark pagination-link" href="{{ $safaris->nextPageUrl() }}" data-page="{{ $safaris->currentPage() + 1 }}">Next <i class="fas fa-chevron-right ms-1"></i></a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link rounded-pill ms-2 px-3 border-0 bg-light text-muted">Next <i class="fas fa-chevron-right ms-1"></i></span>
                </li>
            @endif
        </ul>
    </nav>
</div>
@endif
@else
<div class="text-center py-5">
    <h3 class="mb-3">No Safari Packages Available</h3>
    <p class="text-muted">We're currently updating our safari packages. Please check back soon or contact us for more information.</p>
    <a href="{{ url('/contact') }}" class="btn btn-primary rounded-pill px-4 py-2 mt-3">Contact Us</a>
</div>
@endif
