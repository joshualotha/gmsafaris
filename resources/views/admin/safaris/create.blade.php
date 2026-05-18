@extends('admin.layouts.app')

@section('title', 'Create Safari')
@section('page_title', 'Create New Safari')

@section('content')
    <div class="form-card">
        <form action="{{ route('admin.safaris.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Basic Info -->
            <div class="row g-4">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label">Title *</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title') }}" required>
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Duration</label>
                        <input type="text" name="duration" class="form-control" value="{{ old('duration') }}" placeholder="e.g. 6 Days / 5 Nights">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Subtitle</label>
                <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle') }}" placeholder="Brief tagline for the safari">
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" class="form-control" value="{{ old('location') }}" placeholder="e.g. Multi-Park">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Safari Type <span class="text-danger">*</span></label>
                        <select name="type" class="form-select @error('type') is-invalid @enderror" required>
                            <option value="">Select type...</option>
                            <option value="Wildlife Safari" @selected(old('type') == 'Wildlife Safari')>Wildlife Safari</option>
                            <option value="Luxury Safari" @selected(old('type') == 'Luxury Safari')>Luxury Safari</option>
                            <option value="Mid-Range Safari" @selected(old('type') == 'Mid-Range Safari')>Mid-Range Safari</option>
                            <option value="Mountain Trekking" @selected(old('type') == 'Mountain Trekking')>Mountain Trekking</option>
                            <option value="Beach Holiday" @selected(old('type') == 'Beach Holiday')>Beach Holiday</option>
                            <option value="Group Joining" @selected(old('type') == 'Group Joining')>Group Joining</option>
                        </select>
                        @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Price Tier</label>
                        <select name="price_tier" class="form-select">
                            <option value="">Select...</option>
                            <option value="Budget" @selected(old('price_tier') == 'Budget')>Budget</option>
                            <option value="Mid Range" @selected(old('price_tier') == 'Mid Range')>Mid Range</option>
                            <option value="Luxury" @selected(old('price_tier') == 'Luxury')>Luxury</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Badge Text</label>
                <input type="text" name="badge_text" class="form-control" value="{{ old('badge_text') }}" placeholder="e.g. Premium Safari, Wildlife & Culture Safari, Semi-Luxury Safari">
                <small class="text-muted">This appears as a badge on the hero section</small>
            </div>

            <!-- Pricing -->
            <hr>
            <h6 class="fw-bold mb-3">Pricing</h6>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Base Price From ($)</label>
                        <input type="number" step="0.01" name="price_from" class="form-control" value="{{ old('price_from') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Price Label</label>
                        <input type="text" name="price_label" class="form-control" value="{{ old('price_label') }}" placeholder="e.g. From $2,500">
                    </div>
                </div>
            </div>

            <!-- Pricing Tiers -->
            <div class="mb-3">
                <label class="form-label fw-bold">Pricing Tiers (per person by group size)</label>
                <div id="pricing-tiers-container">
                    @if(old('pricing_tiers'))
                        @foreach(old('pricing_tiers') as $tier)
                            <div class="pricing-tier-row row g-2 mb-2 border rounded p-2 bg-light">
                                <div class="col-md-4">
                                    <input type="text" name="pricing_tiers[{{ $loop->index }}][label]" class="form-control form-control-sm" value="{{ $tier['label'] ?? '' }}" placeholder="Label (e.g. 2 travelers)">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="pricing_tiers[{{ $loop->index }}][amount]" class="form-control form-control-sm" value="{{ $tier['amount'] ?? '' }}" placeholder="Amount (e.g. $2,869.50)">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="pricing_tiers[{{ $loop->index }}][note]" class="form-control form-control-sm" value="{{ $tier['note'] ?? '' }}" placeholder="Note (e.g. per person)">
                                </div>
                                <div class="col-md-1 d-flex align-items-center">
                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="this.closest('.pricing-tier-row').remove()">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="addPricingTier()">
                    <i class="fas fa-plus me-1"></i> Add Pricing Tier
                </button>
            </div>

            <!-- Descriptions -->
            <hr>
            <h6 class="fw-bold mb-3">Content</h6>
            <div class="mb-3">
                <label class="form-label">Short Description</label>
                <textarea name="short_description" class="form-control" rows="3">{{ old('short_description') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Full Description (Safari Overview)</label>
                <textarea name="description" class="form-control" rows="8">{{ old('description') }}</textarea>
            </div>

            <!-- Images -->
            <hr>
            <h6 class="fw-bold mb-3">Images</h6>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Hero Image</label>
                        <input type="file" name="hero_image" class="form-control" accept="image/*">
                        <small class="text-muted">Recommended: 1920x1080px, max 2MB</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Thumbnail Image</label>
                        <input type="file" name="thumbnail_image" class="form-control" accept="image/*">
                        <small class="text-muted">Recommended: 600x400px, max 2MB</small>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Gallery Images</label>
                <input type="file" name="gallery_images[]" class="form-control" accept="image/*" multiple>
                <small class="text-muted">You can select multiple images</small>
            </div>

            <!-- Highlights -->
            <hr>
            <h6 class="fw-bold mb-3">Safari Highlights</h6>
            <div class="mb-3">
                <div id="highlights-container">
                    @if(old('highlights'))
                        @foreach(old('highlights') as $highlight)
                            <div class="input-group mb-2">
                                <input type="text" name="highlights[]" class="form-control" value="{{ $highlight }}" placeholder="Enter highlight">
                                <button type="button" class="btn btn-outline-danger" onclick="this.closest('.input-group').remove()">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endforeach
                    @endif
                </div>
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="addHighlight()">
                    <i class="fas fa-plus me-1"></i> Add Highlight
                </button>
            </div>

            <!-- Itinerary -->
            <hr>
            <h6 class="fw-bold mb-3">Detailed Itinerary (Day-by-Day)</h6>
            <p class="text-muted small">Add each day of the safari itinerary with title, location, description, meals, and accommodation.</p>
            <div id="itinerary-container">
                @if(old('itinerary'))
                    @foreach(old('itinerary') as $index => $day)
                        <div class="itinerary-day-card card mb-3">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span class="fw-bold">Day {{ $day['day'] ?? $loop->iteration }}</span>
                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="this.closest('.itinerary-day-card').remove()">
                                    <i class="fas fa-trash"></i> Remove Day
                                </button>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="itinerary[{{ $index }}][day]" value="{{ $day['day'] ?? $loop->iteration }}">
                                <div class="row g-3">
                                    <div class="col-md-8">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="itinerary[{{ $index }}][title]" class="form-control" value="{{ $day['title'] ?? '' }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Location</label>
                                        <input type="text" name="itinerary[{{ $index }}][location]" class="form-control" value="{{ $day['location'] ?? '' }}">
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <label class="form-label">Description</label>
                                    <textarea name="itinerary[{{ $index }}][description]" class="form-control" rows="3">{{ $day['description'] ?? '' }}</textarea>
                                </div>
                                <div class="row g-3 mt-1">
                                    <div class="col-md-6">
                                        <label class="form-label">Meals</label>
                                        <input type="text" name="itinerary[{{ $index }}][meals]" class="form-control" value="{{ $day['meals'] ?? '' }}" placeholder="e.g. Breakfast, Lunch, Dinner">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Accommodation</label>
                                        <input type="text" name="itinerary[{{ $index }}][accommodation]" class="form-control" value="{{ $day['accommodation'] ?? '' }}" placeholder="e.g. Moyo Tented Camp">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <button type="button" class="btn btn-sm btn-outline-primary mb-3" onclick="addItineraryDay()">
                <i class="fas fa-plus me-1"></i> Add Day
            </button>

            <!-- Inclusions -->
            <hr>
            <h6 class="fw-bold mb-3">What's Included</h6>
            <div class="mb-3">
                <div id="inclusions-container">
                    @if(old('inclusions'))
                        @foreach(old('inclusions') as $inclusion)
                            <div class="input-group mb-2">
                                <span class="input-group-text bg-success text-white"><i class="fas fa-check"></i></span>
                                <input type="text" name="inclusions[]" class="form-control" value="{{ $inclusion }}" placeholder="Enter included item">
                                <button type="button" class="btn btn-outline-danger" onclick="this.closest('.input-group').remove()">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endforeach
                    @endif
                </div>
                <button type="button" class="btn btn-sm btn-outline-success" onclick="addInclusion()">
                    <i class="fas fa-plus me-1"></i> Add Included Item
                </button>
            </div>

            <!-- Exclusions -->
            <hr>
            <h6 class="fw-bold mb-3">What's Excluded</h6>
            <div class="mb-3">
                <div id="exclusions-container">
                    @if(old('exclusions'))
                        @foreach(old('exclusions') as $exclusion)
                            <div class="input-group mb-2">
                                <span class="input-group-text bg-danger text-white"><i class="fas fa-times"></i></span>
                                <input type="text" name="exclusions[]" class="form-control" value="{{ $exclusion }}" placeholder="Enter excluded item">
                                <button type="button" class="btn btn-outline-danger" onclick="this.closest('.input-group').remove()">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endforeach
                    @endif
                </div>
                <button type="button" class="btn btn-sm btn-outline-danger" onclick="addExclusion()">
                    <i class="fas fa-plus me-1"></i> Add Excluded Item
                </button>
            </div>

            <!-- Important Notes -->
            <hr>
            <h6 class="fw-bold mb-3">Important Notes</h6>
            <div class="mb-3">
                <div id="important-notes-container">
                    @if(old('important_notes'))
                        @foreach(old('important_notes') as $note)
                            <div class="input-group mb-2">
                                <span class="input-group-text"><i class="fas fa-info-circle text-primary"></i></span>
                                <input type="text" name="important_notes[]" class="form-control" value="{{ $note }}" placeholder="Enter important note">
                                <button type="button" class="btn btn-outline-danger" onclick="this.closest('.input-group').remove()">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endforeach
                    @endif
                </div>
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="addImportantNote()">
                    <i class="fas fa-plus me-1"></i> Add Important Note
                </button>
            </div>

            <!-- FAQ -->
            <hr>
            <h6 class="fw-bold mb-3">Frequently Asked Questions</h6>
            <div id="faq-container">
                @if(old('faq'))
                    @foreach(old('faq') as $index => $faq)
                        <div class="faq-card card mb-2">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="fw-bold">Question {{ $loop->iteration }}</span>
                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="this.closest('.faq-card').remove()">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <div class="mb-2">
                                    <input type="text" name="faq[{{ $index }}][question]" class="form-control" value="{{ $faq['question'] ?? '' }}" placeholder="Question">
                                </div>
                                <div>
                                    <textarea name="faq[{{ $index }}][answer]" class="form-control" rows="2" placeholder="Answer">{{ $faq['answer'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <button type="button" class="btn btn-sm btn-outline-primary mb-3" onclick="addFaq()">
                <i class="fas fa-plus me-1"></i> Add FAQ
            </button>

            <!-- SEO -->
            <hr>
            <h6 class="fw-bold mb-3">SEO Settings</h6>
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

            <!-- Status -->
            <hr>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="form-check mb-3">
                        <input type="hidden" name="is_featured" value="0">
                        <input type="checkbox" name="is_featured" class="form-check-input" value="1" id="is_featured" @checked(old('is_featured'))>
                        <label class="form-check-label" for="is_featured">Featured Safari</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check mb-3">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" class="form-check-input" value="1" id="is_active" @checked(old('is_active', true))>
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check mb-3">
                        <input type="hidden" name="is_published" value="0">
                        <input type="checkbox" name="is_published" class="form-check-input" value="1" id="is_published" @checked(old('is_published'))>
                        <label class="form-check-label fw-bold" for="is_published">Publish immediately</label>
                        <br><small class="text-muted">Uncheck to save as draft</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label">Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}" min="0">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.safaris.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Cancel
                </a>
                <button type="submit" class="btn btn-gold">
                    <i class="fas fa-save me-1"></i> Create Safari
                </button>
            </div>
        </form>
    </div>
@endsection

@section('extra_scripts')
<script>
    var compressedFiles = {};

    document.querySelectorAll('input[type="file"]').forEach(function(input) {
        input.addEventListener('change', function(e) {
            if (this.name === 'gallery_images[]') {
                compressedFiles.gallery = [];
                for (var i = 0; i < this.files.length; i++) {
                    (function(file, idx) {
                        new Compressor(file, {
                            quality: 0.75, mimeType: 'image/webp', convertSize: 0,
                            success(result) { compressedFiles.gallery[idx] = result; },
                            error() { compressedFiles.gallery[idx] = file; }
                        });
                    })(this.files[i], i);
                }
                return;
            }
            var file = e.target.files[0];
            if (!file) return;
            var help = this.closest('.mb-3')?.querySelector('small');
            if (help) help.textContent = 'Compressing...';
            new Compressor(file, {
                quality: 0.75, mimeType: 'image/webp', convertSize: 0,
                success(result) {
                    compressedFiles[this.name] = result;
                    if (help) {
                        var saved = ((1 - result.size / file.size) * 100).toFixed(0);
                        help.textContent = 'WebP (' + saved + '% smaller) - ' + this.name;
                    }
                }.bind(this),
                error() {
                    compressedFiles[input.name] = file;
                    if (help) help.textContent = 'Compression unavailable, using original.';
                }
            });
        });
    });

    document.querySelector('form')?.addEventListener('submit', function(e) {
        var hasFiles = Object.keys(compressedFiles).length > 0 || (compressedFiles.gallery && compressedFiles.gallery.length > 0);
        if (!hasFiles) return;
        e.preventDefault();
        var formData = new FormData(this);
        Object.keys(compressedFiles).forEach(function(key) {
            if (key === 'gallery') return;
            formData.delete(key);
            formData.append(key, compressedFiles[key]);
        });
        if (compressedFiles.gallery) {
            formData.delete('gallery_images[]');
            compressedFiles.gallery.forEach(function(f) { if (f) formData.append('gallery_images[]', f); });
        }
        var btn = this.querySelector('button[type="submit"]');
        btn.disabled = true; btn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Saving...';
        fetch(this.action, { method: this.method, headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }, body: formData })
            .then(function(r) { if (r.redirected) window.location.href = r.url; else window.location.reload(); })
            .catch(function() { btn.disabled = false; btn.innerHTML = '<i class="fas fa-save me-1"></i> Create Safari'; });
    });

    let itineraryDayIndex = {{ old('itinerary') ? count(old('itinerary')) : 0 }};
    let faqIndex = {{ old('faq') ? count(old('faq')) : 0 }};
    let pricingTierIndex = {{ old('pricing_tiers') ? count(old('pricing_tiers')) : 0 }};

    function addHighlight() {
        const container = document.getElementById('highlights-container');
        const div = document.createElement('div');
        div.className = 'input-group mb-2';
        div.innerHTML = `
            <input type="text" name="highlights[]" class="form-control" placeholder="Enter highlight">
            <button type="button" class="btn btn-outline-danger" onclick="this.closest('.input-group').remove()">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(div);
    }

    function addInclusion() {
        const container = document.getElementById('inclusions-container');
        const div = document.createElement('div');
        div.className = 'input-group mb-2';
        div.innerHTML = `
            <span class="input-group-text bg-success text-white"><i class="fas fa-check"></i></span>
            <input type="text" name="inclusions[]" class="form-control" placeholder="Enter included item">
            <button type="button" class="btn btn-outline-danger" onclick="this.closest('.input-group').remove()">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(div);
    }

    function addExclusion() {
        const container = document.getElementById('exclusions-container');
        const div = document.createElement('div');
        div.className = 'input-group mb-2';
        div.innerHTML = `
            <span class="input-group-text bg-danger text-white"><i class="fas fa-times"></i></span>
            <input type="text" name="exclusions[]" class="form-control" placeholder="Enter excluded item">
            <button type="button" class="btn btn-outline-danger" onclick="this.closest('.input-group').remove()">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(div);
    }

    function addImportantNote() {
        const container = document.getElementById('important-notes-container');
        const div = document.createElement('div');
        div.className = 'input-group mb-2';
        div.innerHTML = `
            <span class="input-group-text"><i class="fas fa-info-circle text-primary"></i></span>
            <input type="text" name="important_notes[]" class="form-control" placeholder="Enter important note">
            <button type="button" class="btn btn-outline-danger" onclick="this.closest('.input-group').remove()">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(div);
    }

    function addItineraryDay() {
        const container = document.getElementById('itinerary-container');
        const idx = itineraryDayIndex++;
        const dayNum = idx + 1;
        const div = document.createElement('div');
        div.className = 'itinerary-day-card card mb-3';
        div.innerHTML = `
            <div class="card-header d-flex justify-content-between align-items-center">
                <span class="fw-bold">Day ${dayNum}</span>
                <button type="button" class="btn btn-outline-danger btn-sm" onclick="this.closest('.itinerary-day-card').remove()">
                    <i class="fas fa-trash"></i> Remove Day
                </button>
            </div>
            <div class="card-body">
                <input type="hidden" name="itinerary[${idx}][day]" value="${dayNum}">
                <div class="row g-3">
                    <div class="col-md-8">
                        <label class="form-label">Title</label>
                        <input type="text" name="itinerary[${idx}][title]" class="form-control" placeholder="e.g. Arrive in Arusha & Transfer">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Location</label>
                        <input type="text" name="itinerary[${idx}][location]" class="form-control" placeholder="e.g. Arusha">
                    </div>
                </div>
                <div class="mt-2">
                    <label class="form-label">Description</label>
                    <textarea name="itinerary[${idx}][description]" class="form-control" rows="3" placeholder="Describe the day's activities..."></textarea>
                </div>
                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <label class="form-label">Meals</label>
                        <input type="text" name="itinerary[${idx}][meals]" class="form-control" placeholder="e.g. Breakfast, Lunch, Dinner">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Accommodation</label>
                        <input type="text" name="itinerary[${idx}][accommodation]" class="form-control" placeholder="e.g. Moyo Tented Camp">
                    </div>
                </div>
            </div>
        `;
        container.appendChild(div);
    }

    function addFaq() {
        const container = document.getElementById('faq-container');
        const idx = faqIndex++;
        const div = document.createElement('div');
        div.className = 'faq-card card mb-2';
        div.innerHTML = `
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="fw-bold">Question ${idx + 1}</span>
                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="this.closest('.faq-card').remove()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="mb-2">
                    <input type="text" name="faq[${idx}][question]" class="form-control" placeholder="Question">
                </div>
                <div>
                    <textarea name="faq[${idx}][answer]" class="form-control" rows="2" placeholder="Answer"></textarea>
                </div>
            </div>
        `;
        container.appendChild(div);
    }

    function addPricingTier() {
        const container = document.getElementById('pricing-tiers-container');
        const idx = pricingTierIndex++;
        const div = document.createElement('div');
        div.className = 'pricing-tier-row row g-2 mb-2 border rounded p-2 bg-light';
        div.innerHTML = `
            <div class="col-md-4">
                <input type="text" name="pricing_tiers[${idx}][label]" class="form-control form-control-sm" placeholder="Label (e.g. 2 travelers)">
            </div>
            <div class="col-md-3">
                <input type="text" name="pricing_tiers[${idx}][amount]" class="form-control form-control-sm" placeholder="Amount (e.g. \$2,869.50)">
            </div>
            <div class="col-md-4">
                <input type="text" name="pricing_tiers[${idx}][note]" class="form-control form-control-sm" placeholder="Note (e.g. per person)">
            </div>
            <div class="col-md-1 d-flex align-items-center">
                <button type="button" class="btn btn-outline-danger btn-sm" onclick="this.closest('.pricing-tier-row').remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
        container.appendChild(div);
    }
</script>
@endsection
