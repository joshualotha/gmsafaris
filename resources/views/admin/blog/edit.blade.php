@extends('admin.layouts.app')

@section('title', 'Edit Blog Post')
@section('page_title', 'Edit Post: ' . $blogPost->title)

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
    .gallery-preview {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
        margin-top: 0.5rem;
    }
    .gallery-preview .thumb {
        width: 80px;
        height: 60px;
        object-fit: cover;
        border-radius: 4px;
        border: 1px solid #dee2e6;
    }

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
        <form action="{{ route('admin.blog.update', $blogPost) }}" method="POST" enctype="multipart/form-data" id="blog-form">
            @csrf @method('PUT')

            <!-- Hidden field to store Quill content -->
            <input type="hidden" name="content" id="content-hidden">

            <!-- Basic Info -->
            <div class="section-card">
                <div class="section-title"><i class="fas fa-info-circle me-2"></i>Basic Information</div>
                <div class="row g-4">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label">Title *</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title', $blogPost->title) }}" required>
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="category" class="form-select">
                                <option value="">Select...</option>
                                <option value="Safari Tips" @selected(old('category', $blogPost->category) == 'Safari Tips')>Safari Tips</option>
                                <option value="Destinations" @selected(old('category', $blogPost->category) == 'Destinations')>Destinations</option>
                                <option value="Travel Guide" @selected(old('category', $blogPost->category) == 'Travel Guide')>Travel Guide</option>
                                <option value="News" @selected(old('category', $blogPost->category) == 'News')>News</option>
                                <option value="Wildlife" @selected(old('category', $blogPost->category) == 'Wildlife')>Wildlife</option>
                                <option value="Culture" @selected(old('category', $blogPost->category) == 'Culture')>Culture</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Author</label>
                            <input type="text" name="author" class="form-control" value="{{ old('author', $blogPost->author) }}" placeholder="e.g. Golden Memories Safaris">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Reading Time (minutes)</label>
                            <input type="number" name="reading_time" class="form-control" value="{{ old('reading_time', $blogPost->reading_time) }}" placeholder="e.g. 5" min="1" max="999">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Tags (comma separated)</label>
                            <input type="text" name="tags" class="form-control" value="{{ old('tags', is_array($blogPost->tags) ? implode(', ', $blogPost->tags) : $blogPost->tags) }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Excerpt -->
            <div class="section-card">
                <div class="section-title"><i class="fas fa-quote-left me-2"></i>Excerpt</div>
                <div class="mb-3">
                    <label class="form-label">Short Description (shown in blog listings)</label>
                    <textarea name="excerpt" class="form-control" rows="3" placeholder="A brief summary of the blog post...">{{ old('excerpt', $blogPost->excerpt) }}</textarea>
                </div>
            </div>

            <!-- Content - Quill Rich Text Editor -->
            <div class="section-card">
                <div class="section-title"><i class="fas fa-edit me-2"></i>Content <span class="text-muted fw-normal text-lowercase" style="font-size:0.75rem;">(Rich text editor; free, no API key needed)</span></div>
                <div class="mb-3">
                    <!-- Quill editor container - will be populated by JS -->
                    <div id="quill-editor">{!! old('content', $blogPost->content) !!}</div>
                </div>
            </div>

            <!-- Featured Image -->
            <div class="section-card">
                <div class="section-title"><i class="fas fa-image me-2"></i>Featured Image</div>
                <div class="mb-3">
                    <label class="form-label">Featured Image</label>
                    @if($blogPost->featured_image)
                        <div class="mb-2">
                            <img src="{{ Storage::url($blogPost->featured_image) }}" class="img-preview" alt="{{ $blogPost->title }} featured image" loading="lazy">
                        </div>
                    @endif
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
                            <input type="checkbox" name="is_published" class="form-check-input" value="1" id="is_published" @checked(old('is_published', $blogPost->is_published))>
                            <label class="form-check-label fw-bold" for="is_published">Published</label>
                        </div>
                        <div class="form-check mb-2">
                            <input type="hidden" name="is_featured" value="0">
                            <input type="checkbox" name="is_featured" class="form-check-input" value="1" id="is_featured" @checked(old('is_featured', $blogPost->is_featured))>
                            <label class="form-check-label fw-bold" for="is_featured">Featured Post</label>
                            <br><small class="text-muted">Shown prominently on the blog page</small>
                        </div>
                        <div class="form-check mb-2">
                            <input type="hidden" name="is_trending" value="0">
                            <input type="checkbox" name="is_trending" class="form-check-input" value="1" id="is_trending" @checked(old('is_trending', $blogPost->is_trending))>
                            <label class="form-check-label fw-bold" for="is_trending">Trending</label>
                            <br><small class="text-muted">Mark as trending/popular</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Publish Date</label>
                            <input type="datetime-local" name="published_at" class="form-control"
                                   value="{{ old('published_at', $blogPost->published_at ? $blogPost->published_at->format('Y-m-d\TH:i') : '') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Related Posts</label>
                            <select name="related_post_ids[]" class="form-select" multiple size="5">
                                @foreach($posts as $post)
                                    <option value="{{ $post->id }}" @selected(in_array($post->id, old('related_post_ids', $blogPost->related_post_ids ?? [])))>{{ $post->title }}</option>
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
                            <input type="text" name="seo_title" class="form-control" value="{{ old('seo_title', $blogPost->seo_title) }}" placeholder="Custom title for search results">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">SEO Description</label>
                            <textarea name="seo_description" class="form-control" rows="2" placeholder="Meta description for search engines">{{ old('seo_description', $blogPost->seo_description) }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">SEO Keywords</label>
                            <input type="text" name="seo_keywords" class="form-control" value="{{ old('seo_keywords', $blogPost->seo_keywords) }}" placeholder="e.g. tanzania safari, travel tips">
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left me-1"></i> Cancel</a>
                <button type="submit" class="btn btn-gold"><i class="fas fa-save me-1"></i> Update Post</button>
            </div>
        </form>
    </div>
@endsection

@section('extra_scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
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

        // Before form submit, copy Quill content to hidden textarea
        document.getElementById('blog-form').addEventListener('submit', function(e) {
            try {
                var content = document.querySelector('#quill-editor .ql-editor').innerHTML;
                document.getElementById('content-hidden').value = content;
                console.log('Content copied, length:', content.length);
            } catch(e) {
                console.error('Error:', e);
                e.preventDefault();
            }
        });
    });
</script>
@endsection
