@extends('admin.layouts.app')

@section('title', 'Edit Site Image: ' . $siteImage->key)
@section('page_title', 'Edit Site Image')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="table-container">
                <div class="table-header">
                    <h5><i class="fas fa-edit me-2"></i>Editing: <code>{{ $siteImage->key }}</code></h5>
                    <a href="{{ route('admin.site-images.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-arrow-left me-1"></i> Back to All Images
                    </a>
                </div>

                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Current Image Preview -->
                    <div class="text-center mb-4">
                        <label class="form-label fw-bold">Current Image</label>
                        <div class="border rounded p-2 bg-light">
                            <img src="{{ $siteImage->url }}" alt="{{ $siteImage->alt_text }}" class="img-fluid" style="max-height: 300px; object-fit: contain;">
                        </div>
                        <p class="text-muted small mt-2">
                            <i class="fas fa-file me-1"></i> {{ $siteImage->filepath }}
                            @if($siteImage->category)
                                <span class="badge bg-secondary ms-2">{{ $siteImage->category }}</span>
                            @endif
                        </p>
                    </div>

                    <!-- Upload New Image -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Replace Image <span class="text-muted">(optional)</span></label>
                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror"
                               accept="image/jpeg,image/png,image/gif,image/webp,image/avif">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Upload a new image to replace the current one. Max 10MB. Supported: JPEG, PNG, GIF, WebP, AVIF.</div>
                    </div>

                    <!-- Image Key (Read-only) -->
                    <div class="mb-3">
                        <label class="form-label">Image Key</label>
                        <input type="text" class="form-control" value="{{ $siteImage->key }}" readonly disabled>
                        <div class="form-text">This key is used in the template code to reference this image.</div>
                    </div>

                    <!-- Alt Text -->
                    <div class="mb-3">
                        <label for="alt_text" class="form-label">Alt Text <span class="text-muted">(for SEO/accessibility)</span></label>
                        <input type="text" name="alt_text" id="alt_text" class="form-control @error('alt_text') is-invalid @enderror"
                               value="{{ old('alt_text', $siteImage->alt_text) }}" maxlength="255">
                        @error('alt_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Descriptive text for screen readers and SEO. Keep it concise but descriptive.</div>
                    </div>

                    <!-- Filepath (Read-only) -->
                    <div class="mb-3">
                        <label class="form-label">Current Filepath</label>
                        <input type="text" class="form-control" value="{{ $siteImage->filepath }}" readonly disabled>
                    </div>

                    <!-- Category (Read-only) -->
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" class="form-control" value="{{ ucfirst($siteImage->category ?? 'uncategorized') }}" readonly disabled>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-gold">
                            <i class="fas fa-save me-1"></i> Save Changes
                        </button>
                        <a href="{{ route('admin.site-images.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('extra_scripts')
<script>
    // Show image preview on file selection
    document.getElementById('image')?.addEventListener('change', function(e) {
        var file = e.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var preview = document.querySelector('.border.rounded img');
                if (preview) {
                    preview.src = e.target.result;
                }
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
