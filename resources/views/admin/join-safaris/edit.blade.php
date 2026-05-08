@extends('admin.layouts.app')

@section('title', 'Edit Join Safari')
@section('page_title', 'Edit Join Safari')

@section('content')
    <div class="form-card">
        <form action="{{ route('admin.join-safaris.update', $joinSafari) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Basic Info -->
            <div class="row g-4">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label">Title *</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title', $joinSafari->title) }}" required>
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Duration</label>
                        <input type="text" name="duration" class="form-control" value="{{ old('duration', $joinSafari->duration) }}" placeholder="e.g. 6 Days / 5 Nights">
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" class="form-control" value="{{ old('location', $joinSafari->location) }}" placeholder="e.g. Multi-Park">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description', $joinSafari->description) }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Dates -->
            <hr>
            <h6 class="fw-bold mb-3">Trip Dates</h6>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Start Date *</label>
                        <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror"
                               value="{{ old('start_date', $joinSafari->start_date->format('Y-m-d')) }}" required>
                        @error('start_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">End Date</label>
                        <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $joinSafari->end_date?->format('Y-m-d')) }}">
                    </div>
                </div>
            </div>

            <!-- Participants -->
            <hr>
            <h6 class="fw-bold mb-3">Participant Limits</h6>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Maximum Participants *</label>
                        <input type="number" name="max_participants" class="form-control @error('max_participants') is-invalid @enderror"
                               value="{{ old('max_participants', $joinSafari->max_participants) }}" min="1" required>
                        <small class="text-muted">Total number of spots available</small>
                        @error('max_participants') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Minimum Participants Required *</label>
                        <input type="number" name="min_participants" class="form-control @error('min_participants') is-invalid @enderror"
                               value="{{ old('min_participants', $joinSafari->min_participants) }}" min="1" required>
                        <small class="text-muted">If this minimum is not met, the safari will be unsuccessful/cancelled</small>
                        @error('min_participants') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            <!-- Pricing -->
            <hr>
            <h6 class="fw-bold mb-3">Pricing</h6>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Price Per Person ($)</label>
                        <input type="number" step="0.01" min="0" name="price_per_person" class="form-control" value="{{ old('price_per_person', $joinSafari->price_per_person) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Price Label</label>
                        <input type="text" name="price_label" class="form-control" value="{{ old('price_label', $joinSafari->price_label) }}" placeholder="e.g. From $2,500 per person">
                    </div>
                </div>
            </div>

            <!-- Hero Image -->
            <hr>
            <h6 class="fw-bold mb-3">Hero Image</h6>
            @if($joinSafari->hero_image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $joinSafari->hero_image) }}" class="img-preview" alt="{{ $joinSafari->title }} hero image" loading="lazy">
                    <br><small class="text-muted">Current image. Upload a new one to replace it.</small>
                </div>
            @endif
            <div class="mb-3">
                <input type="file" name="hero_image" class="form-control" accept="image/*">
                <small class="text-muted">Recommended: 1920x1080px, max 2MB</small>
            </div>

            <!-- Highlights -->
            <hr>
            <h6 class="fw-bold mb-3">Highlights</h6>
            <div class="mb-3">
                <div id="highlights-container">
                    @if(old('highlights', $joinSafari->highlights))
                        @foreach(old('highlights', $joinSafari->highlights ?? []) as $highlight)
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

            <!-- Inclusions -->
            <hr>
            <h6 class="fw-bold mb-3">What's Included</h6>
            <div class="mb-3">
                <div id="inclusions-container">
                    @if(old('inclusions', $joinSafari->inclusions))
                        @foreach(old('inclusions', $joinSafari->inclusions ?? []) as $inclusion)
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
                    @if(old('exclusions', $joinSafari->exclusions))
                        @foreach(old('exclusions', $joinSafari->exclusions ?? []) as $exclusion)
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
                <textarea name="important_notes" class="form-control" rows="4" placeholder="Any important notes about this join safari...">{{ old('important_notes', $joinSafari->important_notes) }}</textarea>
            </div>

            <!-- Status -->
            <hr>
            <h6 class="fw-bold mb-3">Status & Settings</h6>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="open" @selected(old('status', $joinSafari->status) == 'open')>Open for Joining</option>
                            <option value="confirmed" @selected(old('status', $joinSafari->status) == 'confirmed')>Confirmed (Minimum Met)</option>
                            <option value="cancelled" @selected(old('status', $joinSafari->status) == 'cancelled')>Cancelled (Minimum Not Met)</option>
                            <option value="completed" @selected(old('status', $joinSafari->status) == 'completed')>Completed</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check mb-3">
                        <input type="checkbox" name="is_featured" class="form-check-input" value="1" id="is_featured" @checked(old('is_featured', $joinSafari->is_featured))>
                        <label class="form-check-label" for="is_featured">Featured</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check mb-3">
                        <input type="checkbox" name="is_active" class="form-check-input" value="1" id="is_active" @checked(old('is_active', $joinSafari->is_active))>
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $joinSafari->sort_order) }}" min="0">
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.join-safaris.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Cancel
                </a>
                <button type="submit" class="btn btn-gold">
                    <i class="fas fa-save me-1"></i> Update Join Safari
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
