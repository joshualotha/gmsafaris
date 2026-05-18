@extends('admin.layouts.app')

@section('title', 'Create Blog Post')
@section('page_title', 'Create New Blog Post')

@section('extra_styles')
<style>
    .section-card {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 1.25rem;
        margin-bottom: 1.5rem;
    }
    .section-card .section-title {
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #6c757d;
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid var(--primary-color);
    }
    .form-check-input:checked { background-color: var(--primary-color); border-color: var(--primary-color); }

    /* Quill Editor Styles */
    #quill-editor {
        height: 450px;
        background: #fff;
    }
    .ql-editor {
        font-size: 16px;
        line-height: 1.7;
    }
    .ql-editor h2 { font-weight: 600; margin-top: 1.5rem; }
    .ql-editor h3 { font-weight: 600; margin-top: 1.25rem; }
    .ql-editor blockquote {
        border-left: 4px solid #d69c40;
        padding-left: 1rem;
        margin: 1rem 0;
        font-style: italic;
        color: #666;
    }
    .ql-editor img {
        max-width: 100%;
        height: auto;
        border-radius: 4px;
        margin: 1rem 0;
    }
</style>
@endsection

@section('content')
    <div class="form-card">
        <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data" id="blog-form">
            @csrf

            <!-- Hidden field to store Quill content -->
            <input type="hidden" name="content" id="content-hidden">

            <!-- Basic Info -->
            <div class="section-card">
                <div class="section-title"><i class="fas fa-info-circle me-2"></i>Basic Information</div>
                <div class="row g-4">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label">Title *</label>
                            <input type="text" name="title" id="post-title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="category" class="form-select">
                                <option value="">Select...</option>
                                <option value="Safari Tips" @selected(old('category') == 'Safari Tips')>Safari Tips</option>
                                <option value="Destinations" @selected(old('category') == 'Destinations')>Destinations</option>
                                <option value="Travel Guide" @selected(old('category') == 'Travel Guide')>Travel Guide</option>
                                <option value="News" @selected(old('category') == 'News')>News</option>
                                <option value="Wildlife" @selected(old('category') == 'Wildlife')>Wildlife</option>
                                <option value="Culture" @selected(old('category') == 'Culture')>Culture</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Author</label>
                            <input type="text" name="author" class="form-control" value="{{ old('author') }}" placeholder="e.g. Golden Memories Safaris">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Reading Time (minutes)</label>
                            <input type="number" name="reading_time" class="form-control" value="{{ old('reading_time') }}" placeholder="e.g. 5" min="1" max="999">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Tags (comma separated)</label>
                            <input type="text" name="tags" class="form-control" value="{{ old('tags') }}" placeholder="e.g. safari, wildlife, serengeti">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Excerpt -->
            <div class="section-card">
                <div class="section-title"><i class="fas fa-quote-left me-2"></i>Excerpt</div>
                <div class="mb-3">
                    <label class="form-label">Short Description (shown in blog listings)</label>
                    <textarea name="excerpt" class="form-control" rows="3" placeholder="A brief summary of the blog post...">{{ old('excerpt') }}</textarea>
                </div>
            </div>

            <!-- Content - Quill Rich Text Editor -->
            <div class="section-card">
                <div class="section-title"><i class="fas fa-edit me-2"></i>Content <span class="text-muted fw-normal text-lowercase" style="font-size:0.75rem;">(Rich text editor; free, no API key needed)</span></div>
                <div class="mb-3">
                    <!-- Quill editor container -->
                    <div id="quill-editor">{!! old('content') !!}</div>
                </div>
            </div>

            <!-- Featured Image -->
            <div class="section-card">
                <div class="section-title"><i class="fas fa-image me-2"></i>Featured Image</div>
                <div class="mb-3">
                    <label class="form-label">Featured Image</label>
                    <input type="file" name="featured_image" class="form-control" accept="image/*">
                    <small class="text-muted">Main image shown in blog listings and header (max 2MB)</small>
                </div>
            </div>

            <!-- Flags & Related Posts -->
            <div class="section-card">
                <div class="section-title"><i class="fas fa-flag me-2"></i>Post Settings</div>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="form-check mb-2">
                            <input type="hidden" name="is_published" value="0">
                            <input type="checkbox" name="is_published" class="form-check-input" value="1" id="is_published" @checked(old('is_published'))>
                            <label class="form-check-label fw-bold" for="is_published">Publish immediately</label>
                        </div>
                        <div class="form-check mb-2">
                            <input type="hidden" name="is_featured" value="0">
                            <input type="checkbox" name="is_featured" class="form-check-input" value="1" id="is_featured" @checked(old('is_featured'))>
                            <label class="form-check-label fw-bold" for="is_featured">Featured Post</label>
                            <br><small class="text-muted">Shown prominently on the blog page</small>
                        </div>
                        <div class="form-check mb-2">
                            <input type="hidden" name="is_trending" value="0">
                            <input type="checkbox" name="is_trending" class="form-check-input" value="1" id="is_trending" @checked(old('is_trending'))>
                            <label class="form-check-label fw-bold" for="is_trending">Trending</label>
                            <br><small class="text-muted">Mark as trending/popular</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Publish Date</label>
                            <input type="datetime-local" name="published_at" class="form-control" value="{{ old('published_at') }}">
                            <small class="text-muted">Leave empty to use current time when publishing</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Related Posts</label>
                            <select name="related_post_ids[]" class="form-select" multiple size="5">
                                @foreach($posts as $post)
                                    <option value="{{ $post->id }}" @selected(in_array($post->id, old('related_post_ids', [])))>{{ $post->title }}</option>
                                @endforeach
                            </select>
                            <small class="text-muted">Hold Ctrl/Cmd to select multiple related posts</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SEO Settings -->
            <div class="section-card">
                <div class="section-title"><i class="fas fa-search me-2"></i>SEO Settings</div>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">SEO Title</label>
                            <input type="text" name="seo_title" class="form-control" value="{{ old('seo_title') }}" placeholder="Custom title for search results">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">SEO Description</label>
                            <textarea name="seo_description" class="form-control" rows="2" placeholder="Meta description for search engines">{{ old('seo_description') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">SEO Keywords</label>
                            <input type="text" name="seo_keywords" class="form-control" value="{{ old('seo_keywords') }}" placeholder="e.g. tanzania safari, travel tips">
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left me-1"></i> Cancel</a>
                <button type="submit" class="btn btn-gold"><i class="fas fa-save me-1"></i> Create Post</button>
            </div>
        </form>
    </div>
@endsection

@section('extra_scripts')
<script>
    var compressedFiles = {};

    document.querySelectorAll('#blog-form input[type="file"]').forEach(function(input) {
        input.addEventListener('change', function(e) {
            var file = e.target.files[0];
            if (!file) return;
            var helpText = this.closest('.mb-3')?.querySelector('small');
            if (helpText) helpText.textContent = 'Compressing...';
            new Compressor(file, {
                quality: 0.75, mimeType: 'image/webp', convertSize: 0,
                success(result) {
                    compressedFiles[input.name] = result;
                    if (helpText) {
                        var saved = ((1 - result.size / file.size) * 100).toFixed(0);
                        helpText.textContent = 'WebP (' + saved + '% smaller)';
                    }
                },
                error() {
                    compressedFiles[input.name] = file;
                    if (helpText) helpText.textContent = 'Compression unavailable, using original.';
                }
            });
        });
    });

    // Override submit to send compressed files
    document.getElementById('blog-form').addEventListener('submit', function(e) {
        e.preventDefault();
        var content = document.querySelector('#quill-editor .ql-editor').innerHTML;
        document.getElementById('content-hidden').value = content;
        var formData = new FormData(this);
        Object.keys(compressedFiles).forEach(function(key) {
            formData.delete(key);
            formData.append(key, compressedFiles[key]);
        });
        var btn = this.querySelector('button[type="submit"]');
        btn.disabled = true; btn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Saving...';
        fetch(this.action, { method: this.method, headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }, body: formData })
            .then(function(r) { if (r.redirected) window.location.href = r.url; else window.location.reload(); })
            .catch(function() { btn.disabled = false; btn.innerHTML = '<i class="fas fa-save me-1"></i> Create Post'; });
    });

    // Initialize Quill editor
    var quill = new Quill('#quill-editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'align': [] }],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }],
                    ['blockquote', 'code-block'],
                    ['link', 'image'],
                    ['clean']
                ]
            },
            placeholder: 'Start writing your blog post...'
        });

        // Custom image upload handler
        quill.getModule('toolbar').addHandler('image', function() {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.click();

            input.onchange = function() {
                var file = input.files[0];
                if (!file) return;

                var formData = new FormData();
                formData.append('file', file);

                // Show loading state
                var range = quill.getSelection(true);
                quill.insertText(range.index, 'Uploading image...\n', 'bold', true);

                fetch('{{ route("admin.blog.upload-image") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(function(response) { return response.json(); })
                .then(function(result) {
                    // Remove "Uploading..." text
                    quill.deleteText(range.index, 'Uploading image...\n'.length);

                    if (result.location) {
                        // Insert the image at the current cursor position
                        quill.insertEmbed(range.index, 'image', result.location);
                        quill.setSelection(range.index + 1);
                    } else {
                        quill.insertText(range.index, '[Image upload failed]\n', 'bold', true);
                    }
                })
                .catch(function() {
                    quill.deleteText(range.index, 'Uploading image...\n'.length);
                    quill.insertText(range.index, '[Image upload failed]\n', 'bold', true);
                });
            };
        });

        // Copy Quill content to hidden field before submit
        document.getElementById('blog-form').addEventListener('submit', function(e) {
            try {
                var title = document.querySelector('input[name="title"]').value;
                var content = document.querySelector('#quill-editor .ql-editor').innerHTML;
                document.getElementById('content-hidden').value = content;
                
                // Let form submit
                console.log('Form submitting:', title);
            } catch(e) {
                console.error('Error:', e);
                e.preventDefault();
            }
        });
    });
</script>
@endsection
