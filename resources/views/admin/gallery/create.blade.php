@extends('admin.layouts.app')

@section('title', 'Upload Gallery Images')
@section('page_title', 'Upload Gallery Images')

@section('extra_styles')
<style>
    .upload-zone {
        border: 2px dashed #ccc;
        border-radius: 12px;
        padding: 3rem 2rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
        background: #fafafa;
    }
    .upload-zone:hover,
    .upload-zone.dragover {
        border-color: var(--primary-color);
        background: #fef9f0;
    }
    .upload-zone i {
        font-size: 3rem;
        color: #ccc;
        margin-bottom: 1rem;
    }
    .upload-zone.dragover i {
        color: var(--primary-color);
    }
    .upload-zone p {
        color: #888;
        margin-bottom: 0.5rem;
    }
    .file-list {
        margin-top: 1rem;
    }
    .file-list .file-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.5rem 0.75rem;
        background: #f8f9fa;
        border-radius: 6px;
        margin-bottom: 0.5rem;
        border: 1px solid #e9ecef;
    }
    .file-list .file-item i {
        color: var(--primary-color);
    }
    .file-list .file-item .file-name {
        flex: 1;
        font-size: 0.9rem;
    }
    .file-list .file-item .file-size {
        color: #888;
        font-size: 0.8rem;
    }
    .preview-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
        gap: 0.5rem;
        margin-top: 1rem;
    }
    .preview-grid .preview-item {
        width: 100%;
        height: 80px;
        object-fit: cover;
        border-radius: 4px;
        border: 1px solid #dee2e6;
    }
</style>
@endsection

@section('content')
    <div class="form-card">
        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" id="upload-form">
            @csrf

            <!-- Upload Zone -->
            <div class="section-card">
                <div class="section-title"><i class="fas fa-cloud-upload-alt me-2"></i>Select Images</div>
                <div class="upload-zone" id="upload-zone" onclick="document.getElementById('file-input').click()">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p><strong>Click to select images</strong> or drag & drop them here</p>
                    <p class="text-muted small">Supports JPG, PNG, GIF, WebP. Max 10MB per image</p>
                    <input type="file" name="images[]" id="file-input" accept="image/*" multiple class="d-none" onchange="handleFiles(this.files)">
                </div>
                <div class="file-list" id="file-list"></div>
                <div class="preview-grid" id="preview-grid"></div>
                @error('images') <div class="text-danger small mt-2">{{ $message }}</div> @enderror
                @error('images.*') <div class="text-danger small mt-2">{{ $message }}</div> @enderror
            </div>

            <!-- Image Details -->
            <div class="section-card">
                <div class="section-title"><i class="fas fa-tag me-2"></i>Image Details (applied to all)</div>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Default Caption</label>
                            <input type="text" name="caption" class="form-control" value="{{ old('caption') }}" placeholder="Optional caption for all uploaded images">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="category" class="form-select">
                                <option value="general" @selected(old('category') == 'general')>General</option>
                                <option value="wildlife" @selected(old('category') == 'wildlife')>Wildlife</option>
                                <option value="landscapes" @selected(old('category') == 'landscapes')>Landscapes</option>
                                <option value="cultural" @selected(old('category') == 'cultural')>Cultural</option>
                                <option value="lodges" @selected(old('category') == 'lodges')>Lodges</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left me-1"></i> Back to Gallery</a>
                <button type="submit" class="btn btn-gold" id="submit-btn" disabled><i class="fas fa-upload me-1"></i> Upload Images</button>
            </div>
        </form>
    </div>
@endsection

@section('extra_scripts')
<script>
    var selectedFiles = [];

    // Drag & drop support
    var zone = document.getElementById('upload-zone');
    zone.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.classList.add('dragover');
    });
    zone.addEventListener('dragleave', function(e) {
        e.preventDefault();
        this.classList.remove('dragover');
    });
    zone.addEventListener('drop', function(e) {
        e.preventDefault();
        this.classList.remove('dragover');
        handleFiles(e.dataTransfer.files);
    });

    function handleFiles(files) {
        for (var i = 0; i < files.length; i++) {
            if (files[i].type.startsWith('image/')) {
                selectedFiles.push(files[i]);
            }
        }
        updateFileList();
        updatePreviews();
        document.getElementById('submit-btn').disabled = selectedFiles.length === 0;
    }

    function updateFileList() {
        var list = document.getElementById('file-list');
        list.innerHTML = '';
        if (selectedFiles.length === 0) {
            list.innerHTML = '';
            return;
        }
        var html = '<div class="fw-bold small mb-2">' + selectedFiles.length + ' file(s) selected</div>';
        selectedFiles.forEach(function(file, index) {
            var size = (file.size / 1024 / 1024).toFixed(2) + ' MB';
            html += '<div class="file-item">' +
                '<i class="fas fa-image"></i>' +
                '<span class="file-name">' + file.name + '</span>' +
                '<span class="file-size">' + size + '</span>' +
                '<button type="button" class="btn btn-sm btn-outline-danger" onclick="removeFile(' + index + ')"><i class="fas fa-times"></i></button>' +
                '</div>';
        });
        list.innerHTML = html;
    }

    function updatePreviews() {
        var grid = document.getElementById('preview-grid');
        grid.innerHTML = '';
        var maxPreview = Math.min(selectedFiles.length, 12);
        for (var i = 0; i < maxPreview; i++) {
            var reader = new FileReader();
            reader.onload = (function(idx) {
                return function(e) {
                    var img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'preview-item';
                    img.title = selectedFiles[idx].name;
                    grid.appendChild(img);
                };
            })(i);
            reader.readAsDataURL(selectedFiles[i]);
        }
        if (selectedFiles.length > 12) {
            var more = document.createElement('div');
            more.className = 'preview-item d-flex align-items-center justify-content-center bg-light';
            more.style.cssText = 'height:80px;border-radius:4px;border:1px solid #dee2e6;font-size:0.8rem;color:#888;';
            more.textContent = '+' + (selectedFiles.length - 12) + ' more';
            grid.appendChild(more);
        }
    }

    function removeFile(index) {
        selectedFiles.splice(index, 1);
        updateFileList();
        updatePreviews();
        document.getElementById('submit-btn').disabled = selectedFiles.length === 0;
    }

    // On form submit, append all files to the input
    document.getElementById('upload-form').addEventListener('submit', function(e) {
        var input = document.getElementById('file-input');
        var dt = new DataTransfer();
        selectedFiles.forEach(function(file) {
            dt.items.add(file);
        });
        input.files = dt.files;
    });
</script>
@endsection
