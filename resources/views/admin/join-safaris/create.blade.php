@extends('admin.layouts.app')

@section('title', 'Create Join Safari')
@section('page_title', 'Create New Join Safari')

@section('content')
    <div class="form-card">
        <form action="{{ route('admin.join-safaris.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-4">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label">Title *</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
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

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" class="form-control" value="{{ old('location') }}" placeholder="e.g. Multi-Park">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Start Date *</label>
                        <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}" required>
                        @error('start_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">End Date</label>
                        <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Max People *</label>
                        <input type="number" name="max_participants" class="form-control @error('max_participants') is-invalid @enderror" value="{{ old('max_participants', 10) }}" min="1" required>
                        <small class="text-muted">Total spots available</small>
                        @error('max_participants') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Min People *</label>
                        <input type="number" name="min_participants" class="form-control @error('min_participants') is-invalid @enderror" value="{{ old('min_participants', 4) }}" min="1" required>
                        <small class="text-muted">Minimum to run the safari</small>
                        @error('min_participants') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Price Per Person ($)</label>
                        <input type="number" step="0.01" name="price_per_person" class="form-control" value="{{ old('price_per_person') }}">
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Price Label</label>
                        <input type="text" name="price_label" class="form-control" value="{{ old('price_label', 'per person') }}" placeholder="e.g. per person">
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Important Note (visible to customers)</label>
                <textarea name="important_notes" class="form-control" rows="3" placeholder="Any important notes for customers...">{{ old('important_notes') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="form-label">Hero Image (optional)</label>
                <input type="file" name="hero_image" class="form-control" accept="image/*">
            </div>

            <!-- Highlights -->
            <hr>
            <h6 class="fw-bold mb-3">Highlights</h6>
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
            <h6 class="fw-bold mb-3">Day-by-Day Itinerary</h6>
            <div class="mb-3">
                <div id="itinerary-container">
                    @if(old('itinerary'))
                        @foreach(old('itinerary') as $index => $day)
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div class="row g-2">
                                        <div class="col-md-2">
                                            <input type="text" name="itinerary[{{ $index }}][day]" class="form-control" value="{{ $day['day'] ?? '' }}" placeholder="Day #">
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="itinerary[{{ $index }}][description]" class="form-control" rows="2" placeholder="Description">{{ $day['description'] ?? '' }}</textarea>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="button" class="btn btn-outline-danger w-100" onclick="this.closest('.card').remove()">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="addItinerary()">
                    <i class="fas fa-plus me-1"></i> Add Day
                </button>
            </div>

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

            <hr>
            <h6 class="fw-bold mb-3">Status & Settings</h6>
            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="checkbox" name="is_featured" class="form-check-input" value="1" id="is_featured" @checked(old('is_featured'))>
                        <label class="form-check-label" for="is_featured">Featured</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" value="1" id="is_active" @checked(old('is_active', true))>
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}" min="0">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.join-safaris.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Cancel
                </a>
                <button type="submit" class="btn btn-gold">
                    <i class="fas fa-save me-1"></i> Create Join Safari
                </button>
            </div>
        </form>
    </div>
@endsection

@section('extra_scripts')
<script>
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

    function addItinerary() {
        const container = document.getElementById('itinerary-container');
        const count = container.children.length;
        const div = document.createElement('div');
        div.className = 'card mb-2';
        div.innerHTML = `
            <div class="card-body">
                <div class="row g-2">
                    <div class="col-md-2">
                        <input type="text" name="itinerary[${count}][day]" class="form-control" placeholder="Day #">
                    </div>
                    <div class="col-md-9">
                        <textarea name="itinerary[${count}][description]" class="form-control" rows="2" placeholder="Description"></textarea>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-outline-danger w-100" onclick="this.closest('.card').remove()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
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
</script>
@endsection