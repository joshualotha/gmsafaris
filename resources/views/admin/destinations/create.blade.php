@extends('admin.layouts.app')

@section('title', 'Create Destination')
@section('page_title', 'Create New Destination')

@section('content')
    <div class="form-card">
        <form action="{{ route('admin.destinations.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Basic Information --}}
            <div class="section-card mb-4">
                <h5 class="section-title"><i class="fas fa-info-circle me-2"></i>Basic Information</h5>
                <div class="row g-4">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label">Name *</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" name="location" class="form-control" value="{{ old('location') }}" placeholder="e.g. Arusha, Tanzania">
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Subtitle</label>
                            <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle') }}" placeholder="e.g. The Endless Plains & Great Migration">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Badge Text</label>
                            <input type="text" name="badge_text" class="form-control" value="{{ old('badge_text') }}" placeholder="e.g. Africa's Iconic Wilderness">
                            <small class="text-muted">The small badge label above the title on the destination page</small>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="category" class="form-select">
                                <option value="">Select Category</option>
                                <option value="National Park" @selected(old('category') == 'National Park')>National Park</option>
                                <option value="Mountain" @selected(old('category') == 'Mountain')>Mountain</option>
                                <option value="Lake" @selected(old('category') == 'Lake')>Lake</option>
                                <option value="Attraction" @selected(old('category') == 'Attraction')>Attraction</option>
                                <option value="Conservation Area" @selected(old('category') == 'Conservation Area')>Conservation Area</option>
                                <option value="Wildlife Experience" @selected(old('category') == 'Wildlife Experience')>Wildlife Experience</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Key Attractions</label>
                            <input type="text" name="key_attractions" class="form-control" value="{{ old('key_attractions') }}" placeholder="e.g. Great Migration, Big Five">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Content Section --}}
            <div class="section-card mb-4">
                <h5 class="section-title"><i class="fas fa-align-left me-2"></i>Content</h5>
                <div class="mb-3">
                    <label class="form-label">Short Description</label>
                    <textarea name="short_description" class="form-control" rows="3" placeholder="Brief summary for listing cards">{{ old('short_description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Full Description</label>
                    <textarea name="description" class="form-control" rows="8" placeholder="Main content - first paragraph">{{ old('description') }}</textarea>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">CTA Button Text</label>
                            <input type="text" name="cta_text" class="form-control" value="{{ old('cta_text') }}" placeholder="e.g. Plan Your Serengeti Adventure">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">CTA Anchor URL</label>
                            <input type="text" name="cta_url" class="form-control" value="{{ old('cta_url') }}" placeholder="e.g. #inquire-serengeti">
                            <small class="text-muted">The anchor link the CTA button points to</small>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Images --}}
            <div class="section-card mb-4">
                <h5 class="section-title"><i class="fas fa-images me-2"></i>Images</h5>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Hero Image (Page Header Background)</label>
                            <input type="file" name="hero_image" class="form-control" accept="image/*">
                            <small class="text-muted">Large header background image</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Thumbnail Image</label>
                            <input type="file" name="thumbnail_image" class="form-control" accept="image/*">
                            <small class="text-muted">Small card thumbnail for listing pages</small>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gallery Images</label>
                    <input type="file" name="gallery_images[]" class="form-control" accept="image/*" multiple>
                    <small class="text-muted">Additional destination photos</small>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Map Embed URL</label>
                            <input type="text" name="map_embed_url" class="form-control" value="{{ old('map_embed_url') }}" placeholder="Google Maps embed iframe src URL">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Video URL</label>
                            <input type="text" name="video_url" class="form-control" value="{{ old('video_url') }}" placeholder="YouTube or Vimeo URL">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Features / "Why Visit" Section --}}
            <div class="section-card mb-4">
                <h5 class="section-title"><i class="fas fa-star me-2"></i>Why Visit? (Feature Cards)</h5>
                <p class="text-muted small mb-3">Each feature card has an icon, title, and short description. These appear in the "Why Visit" section on the destination page.</p>
                <div id="features-container">
                    @if(old('features'))
                        @foreach(old('features') as $index => $feature)
                            <div class="feature-item-card border rounded p-3 mb-3 bg-light">
                                <div class="row g-3 align-items-end">
                                    <div class="col-md-2">
                                        <label class="form-label small">Icon Class</label>
                                        <input type="text" name="features[{{ $index }}][icon]" class="form-control form-control-sm" value="{{ $feature['icon'] ?? '' }}" placeholder="fas fa-paw">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label small">Title</label>
                                        <input type="text" name="features[{{ $index }}][title]" class="form-control form-control-sm" value="{{ $feature['title'] ?? '' }}" placeholder="The Great Migration">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label small">Description</label>
                                        <input type="text" name="features[{{ $index }}][description]" class="form-control form-control-sm" value="{{ $feature['description'] ?? '' }}" placeholder="Brief description...">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-outline-danger btn-sm w-100" onclick="this.closest('.feature-item-card').remove()">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="addFeature()">
                    <i class="fas fa-plus me-1"></i> Add Feature Card
                </button>
            </div>

            {{-- Highlights --}}
            <div class="section-card mb-4">
                <h5 class="section-title"><i class="fas fa-list-ul me-2"></i>Highlights</h5>
                <p class="text-muted small mb-3">Simple text highlights for the destination.</p>
                <div id="highlights-container">
                    @if(old('highlights'))
                        @foreach(old('highlights') as $h)
                            <div class="input-group mb-2">
                                <input type="text" name="highlights[]" class="form-control" value="{{ $h }}" placeholder="Enter highlight">
                                <button type="button" class="btn btn-outline-danger" onclick="this.closest('.input-group').remove()"><i class="fas fa-times"></i></button>
                            </div>
                        @endforeach
                    @endif
                </div>
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="addItem('highlights-container', 'highlights[]')">
                    <i class="fas fa-plus me-1"></i> Add Highlight
                </button>
            </div>

            {{-- Wildlife Highlights --}}
            <div class="section-card mb-4">
                <h5 class="section-title"><i class="fas fa-paw me-2"></i>Wildlife Highlights</h5>
                <p class="text-muted small mb-3">Detailed wildlife information with title and description. Used on pages like Manyara, Tarangire, Serval Wildlife.</p>
                <div id="wildlife-container">
                    @if(old('wildlife_highlights'))
                        @foreach(old('wildlife_highlights') as $index => $item)
                            <div class="wildlife-item-card border rounded p-3 mb-3 bg-light">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label small">Title</label>
                                        <input type="text" name="wildlife_highlights[{{ $index }}][title]" class="form-control form-control-sm" value="{{ $item['title'] ?? '' }}" placeholder="e.g. Tree-Climbing Lions">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small">Description</label>
                                        <textarea name="wildlife_highlights[{{ $index }}][description]" class="form-control form-control-sm" rows="2" placeholder="Detailed description...">{{ $item['description'] ?? '' }}</textarea>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-end">
                                        <button type="button" class="btn btn-outline-danger btn-sm w-100" onclick="this.closest('.wildlife-item-card').remove()">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="addWildlifeHighlight()">
                    <i class="fas fa-plus me-1"></i> Add Wildlife Highlight
                </button>
            </div>

            {{-- Activities --}}
            <div class="section-card mb-4">
                <h5 class="section-title"><i class="fas fa-hiking me-2"></i>Activities / Things To Do</h5>
                <p class="text-muted small mb-3">Activities available at this destination (e.g. game drives, walking safaris, bird watching).</p>
                <div id="activities-container">
                    @if(old('activities'))
                        @foreach(old('activities') as $index => $item)
                            <div class="activity-item-card border rounded p-3 mb-3 bg-light">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label small">Title</label>
                                        <input type="text" name="activities[{{ $index }}][title]" class="form-control form-control-sm" value="{{ $item['title'] ?? '' }}" placeholder="e.g. Game Drives">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small">Description</label>
                                        <textarea name="activities[{{ $index }}][description]" class="form-control form-control-sm" rows="2" placeholder="Activity description...">{{ $item['description'] ?? '' }}</textarea>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-end">
                                        <button type="button" class="btn btn-outline-danger btn-sm w-100" onclick="this.closest('.activity-item-card').remove()">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="addActivity()">
                    <i class="fas fa-plus me-1"></i> Add Activity
                </button>
            </div>

            {{-- Best Time to Visit --}}
            <div class="section-card mb-4">
                <h5 class="section-title"><i class="fas fa-calendar-alt me-2"></i>Best Time to Visit</h5>
                <p class="text-muted small mb-3">Structured dry season vs wet season comparison.</p>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="border rounded p-3 bg-light">
                            <h6 class="fw-bold mb-3"><i class="fas fa-sun text-primary me-2"></i>Dry Season</h6>
                            <div class="mb-3">
                                <label class="form-label small">Section Title</label>
                                <input type="text" name="best_time_to_visit[dry_season][title]" class="form-control form-control-sm" value="{{ old('best_time_to_visit.dry_season.title', 'Dry Season (June - October)') }}">
                            </div>
                            <label class="form-label small">Bullet Points</label>
                            <div id="dry-season-items">
                                @if(old('best_time_to_visit.dry_season.items'))
                                    @foreach(old('best_time_to_visit.dry_season.items') as $item)
                                        <div class="input-group mb-2">
                                            <input type="text" name="best_time_to_visit[dry_season][items][]" class="form-control form-control-sm" value="{{ $item }}" placeholder="Enter point">
                                            <button type="button" class="btn btn-outline-danger btn-sm" onclick="this.closest('.input-group').remove()"><i class="fas fa-times"></i></button>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary mt-1" onclick="addSeasonItem('dry-season-items', 'best_time_to_visit[dry_season][items][]')">
                                <i class="fas fa-plus me-1"></i> Add Point
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="border rounded p-3 bg-light">
                            <h6 class="fw-bold mb-3"><i class="fas fa-cloud-rain text-primary me-2"></i>Wet / Green Season</h6>
                            <div class="mb-3">
                                <label class="form-label small">Section Title</label>
                                <input type="text" name="best_time_to_visit[wet_season][title]" class="form-control form-control-sm" value="{{ old('best_time_to_visit.wet_season.title', 'Wet / Green Season (November - May)') }}">
                            </div>
                            <label class="form-label small">Bullet Points</label>
                            <div id="wet-season-items">
                                @if(old('best_time_to_visit.wet_season.items'))
                                    @foreach(old('best_time_to_visit.wet_season.items') as $item)
                                        <div class="input-group mb-2">
                                            <input type="text" name="best_time_to_visit[wet_season][items][]" class="form-control form-control-sm" value="{{ $item }}" placeholder="Enter point">
                                            <button type="button" class="btn btn-outline-danger btn-sm" onclick="this.closest('.input-group').remove()"><i class="fas fa-times"></i></button>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary mt-1" onclick="addSeasonItem('wet-season-items', 'best_time_to_visit[wet_season][items][]')">
                                <i class="fas fa-plus me-1"></i> Add Point
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Quick Facts --}}
            <div class="section-card mb-4">
                <h5 class="section-title"><i class="fas fa-bolt me-2"></i>Quick Facts</h5>
                <p class="text-muted small mb-3">Key facts about the destination (e.g. size, altitude, established year).</p>
                <div id="quick-facts-container">
                    @if(old('quick_facts'))
                        @foreach(old('quick_facts') as $qf)
                            <div class="input-group mb-2">
                                <input type="text" name="quick_facts[]" class="form-control" value="{{ $qf }}" placeholder="Enter quick fact">
                                <button type="button" class="btn btn-outline-danger" onclick="this.closest('.input-group').remove()"><i class="fas fa-times"></i></button>
                            </div>
                        @endforeach
                    @endif
                </div>
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="addItem('quick-facts-container', 'quick_facts[]')">
                    <i class="fas fa-plus me-1"></i> Add Quick Fact
                </button>
            </div>

            {{-- FAQ --}}
            <div class="section-card mb-4">
                <h5 class="section-title"><i class="fas fa-question-circle me-2"></i>FAQ</h5>
                <p class="text-muted small mb-3">Frequently asked questions about this destination.</p>
                <div id="faq-container">
                    @if(old('faq'))
                        @foreach(old('faq') as $index => $faq)
                            <div class="faq-item-card border rounded p-3 mb-3 bg-light">
                                <div class="row g-3">
                                    <div class="col-md-5">
                                        <label class="form-label small">Question</label>
                                        <input type="text" name="faq[{{ $index }}][question]" class="form-control form-control-sm" value="{{ $faq['question'] ?? '' }}" placeholder="Enter question">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label small">Answer</label>
                                        <textarea name="faq[{{ $index }}][answer]" class="form-control form-control-sm" rows="2" placeholder="Enter answer">{{ $faq['answer'] ?? '' }}</textarea>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-end">
                                        <button type="button" class="btn btn-outline-danger btn-sm w-100" onclick="this.closest('.faq-item-card').remove()">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="addFaq()">
                    <i class="fas fa-plus me-1"></i> Add FAQ
                </button>
            </div>

            {{-- Related Destinations --}}
            <div class="section-card mb-4">
                <h5 class="section-title"><i class="fas fa-link me-2"></i>Related Destinations</h5>
                <p class="text-muted small mb-3">Select related destinations to link to.</p>
                <div class="mb-3">
                    <select name="related_destinations[]" class="form-select" multiple>
                        @php
                            $allDestinations = \App\Models\Destination::active()->ordered()->get();
                            $selectedIds = old('related_destinations', []);
                        @endphp
                        @foreach($allDestinations as $dest)
                            <option value="{{ $dest->id }}" @selected(in_array($dest->id, $selectedIds))>{{ $dest->name }}</option>
                        @endforeach
                    </select>
                    <small class="text-muted">Hold Ctrl/Cmd to select multiple</small>
                </div>
            </div>

            {{-- SEO Settings --}}
            <div class="section-card mb-4">
                <h5 class="section-title"><i class="fas fa-search me-2"></i>SEO Settings</h5>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">SEO Title</label>
                            <input type="text" name="seo_title" class="form-control" value="{{ old('seo_title') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">SEO Description</label>
                            <textarea name="seo_description" class="form-control" rows="2">{{ old('seo_description') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">SEO Keywords</label>
                            <input type="text" name="seo_keywords" class="form-control" value="{{ old('seo_keywords') }}">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Status --}}
            <div class="section-card mb-4">
                <h5 class="section-title"><i class="fas fa-cog me-2"></i>Status & Ordering</h5>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="form-check mb-3">
                            <input type="checkbox" name="is_active" class="form-check-input" value="1" id="is_active" @checked(old('is_active', true))>
                            <label class="form-check-label" for="is_active">Active</label>
                        </div>
                        <div class="form-check mb-3">
                            <input type="hidden" name="is_featured" value="0">
                            <input type="checkbox" name="is_featured" class="form-check-input" value="1" id="is_featured" @checked(old('is_featured'))>
                            <label class="form-check-label" for="is_featured">Featured (shows on homepage)</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}" min="0">
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.destinations.index') }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left me-1"></i> Cancel</a>
                <button type="submit" class="btn btn-gold"><i class="fas fa-save me-1"></i> Create Destination</button>
            </div>
        </form>
    </div>
@endsection

@section('extra_scripts')
<script>
    // Generic add item for simple text arrays
    function addItem(containerId, name) {
        const container = document.getElementById(containerId);
        const div = document.createElement('div');
        div.className = 'input-group mb-2';
        div.innerHTML = `
            <input type="text" name="${name}" class="form-control" placeholder="Enter item">
            <button type="button" class="btn btn-outline-danger" onclick="this.closest('.input-group').remove()"><i class="fas fa-times"></i></button>
        `;
        container.appendChild(div);
    }

    // Add season item (for best time to visit)
    function addSeasonItem(containerId, name) {
        const container = document.getElementById(containerId);
        const div = document.createElement('div');
        div.className = 'input-group mb-2';
        div.innerHTML = `
            <input type="text" name="${name}" class="form-control form-control-sm" placeholder="Enter point">
            <button type="button" class="btn btn-outline-danger btn-sm" onclick="this.closest('.input-group').remove()"><i class="fas fa-times"></i></button>
        `;
        container.appendChild(div);
    }

    // Feature cards (icon, title, description)
    let featureIndex = {{ old('features') ? count(old('features')) : 0 }};
    function addFeature() {
        const container = document.getElementById('features-container');
        const div = document.createElement('div');
        div.className = 'feature-item-card border rounded p-3 mb-3 bg-light';
        div.innerHTML = `
            <div class="row g-3 align-items-end">
                <div class="col-md-2">
                    <label class="form-label small">Icon Class</label>
                    <input type="text" name="features[\${featureIndex}][icon]" class="form-control form-control-sm" placeholder="fas fa-paw">
                </div>
                <div class="col-md-3">
                    <label class="form-label small">Title</label>
                    <input type="text" name="features[\${featureIndex}][title]" class="form-control form-control-sm" placeholder="The Great Migration">
                </div>
                <div class="col-md-5">
                    <label class="form-label small">Description</label>
                    <input type="text" name="features[\${featureIndex}][description]" class="form-control form-control-sm" placeholder="Brief description...">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-outline-danger btn-sm w-100" onclick="this.closest('.feature-item-card').remove()">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        `;
        container.appendChild(div);
        featureIndex++;
    }

    // Wildlife highlights (title, description)
    let wildlifeIndex = {{ old('wildlife_highlights') ? count(old('wildlife_highlights')) : 0 }};
    function addWildlifeHighlight() {
        const container = document.getElementById('wildlife-container');
        const div = document.createElement('div');
        div.className = 'wildlife-item-card border rounded p-3 mb-3 bg-light';
        div.innerHTML = `
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label small">Title</label>
                    <input type="text" name="wildlife_highlights[\${wildlifeIndex}][title]" class="form-control form-control-sm" placeholder="e.g. Tree-Climbing Lions">
                </div>
                <div class="col-md-6">
                    <label class="form-label small">Description</label>
                    <textarea name="wildlife_highlights[\${wildlifeIndex}][description]" class="form-control form-control-sm" rows="2" placeholder="Detailed description..."></textarea>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-outline-danger btn-sm w-100" onclick="this.closest('.wildlife-item-card').remove()">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        `;
        container.appendChild(div);
        wildlifeIndex++;
    }

    // Activities (title, description)
    let activityIndex = {{ old('activities') ? count(old('activities')) : 0 }};
    function addActivity() {
        const container = document.getElementById('activities-container');
        const div = document.createElement('div');
        div.className = 'activity-item-card border rounded p-3 mb-3 bg-light';
        div.innerHTML = `
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label small">Title</label>
                    <input type="text" name="activities[\${activityIndex}][title]" class="form-control form-control-sm" placeholder="e.g. Game Drives">
                </div>
                <div class="col-md-6">
                    <label class="form-label small">Description</label>
                    <textarea name="activities[\${activityIndex}][description]" class="form-control form-control-sm" rows="2" placeholder="Activity description..."></textarea>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-outline-danger btn-sm w-100" onclick="this.closest('.activity-item-card').remove()">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        `;
        container.appendChild(div);
        activityIndex++;
    }

    // FAQ (question, answer)
    let faqIndex = {{ old('faq') ? count(old('faq')) : 0 }};
    function addFaq() {
        const container = document.getElementById('faq-container');
        const div = document.createElement('div');
        div.className = 'faq-item-card border rounded p-3 mb-3 bg-light';
        div.innerHTML = `
            <div class="row g-3">
                <div class="col-md-5">
                    <label class="form-label small">Question</label>
                    <input type="text" name="faq[\${faqIndex}][question]" class="form-control form-control-sm" placeholder="Enter question">
                </div>
                <div class="col-md-5">
                    <label class="form-label small">Answer</label>
                    <textarea name="faq[\${faqIndex}][answer]" class="form-control form-control-sm" rows="2" placeholder="Enter answer"></textarea>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-outline-danger btn-sm w-100" onclick="this.closest('.faq-item-card').remove()">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        `;
        container.appendChild(div);
        faqIndex++;
    }
</script>
@endsection
