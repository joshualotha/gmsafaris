@extends('admin.layouts.app')

@section('title', 'Site Images Management')
@section('page_title', 'Site Images')

@section('extra_styles')
<style>
    .site-image-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 1rem;
    }
    .site-image-card {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0,0,0,0.06);
        transition: transform 0.2s, box-shadow 0.2s;
        position: relative;
    }
    .site-image-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .site-image-card .thumb-wrap {
        width: 100%;
        height: 160px;
        overflow: hidden;
        background: #f0f0f0;
        position: relative;
    }
    .site-image-card .thumb-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .site-image-card .card-body {
        padding: 0.75rem;
    }
    .site-image-card .card-body .key-label {
        font-size: 0.8rem;
        font-weight: 600;
        color: #D4A762;
        font-family: monospace;
        margin-bottom: 0.25rem;
        word-break: break-all;
    }
    .site-image-card .card-body .alt-text {
        font-size: 0.8rem;
        color: #555;
        margin-bottom: 0.25rem;
    }
    .site-image-card .card-body .filepath {
        font-size: 0.7rem;
        color: #999;
        font-family: monospace;
    }
    .site-image-card .card-body .category-tag {
        display: inline-block;
        font-size: 0.65rem;
        padding: 0.15rem 0.5rem;
        border-radius: 4px;
        background: #e9ecef;
        color: #555;
        margin-top: 0.25rem;
    }
    .site-image-card .card-actions {
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
        opacity: 0;
        transition: opacity 0.2s;
    }
    .site-image-card:hover .card-actions {
        opacity: 1;
    }
    .site-image-card .card-actions .btn {
        width: 32px;
        height: 32px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 0.75rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    .stat-card-sm {
        background: #fff;
        border-radius: 8px;
        padding: 1rem 1.25rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.04);
        text-align: center;
    }
    .stat-card-sm .number { font-size: 1.5rem; font-weight: 700; margin: 0; }
    .stat-card-sm .label { font-size: 0.75rem; color: #888; margin: 0; text-transform: uppercase; letter-spacing: 0.5px; }
</style>
@endsection

@section('content')
    <!-- Stats Row -->
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="stat-card-sm">
                <p class="number">{{ $images->total() }}</p>
                <p class="label">Total Site Images</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card-sm">
                <p class="number text-primary">{{ \App\Models\SiteImage::count() }}</p>
                <p class="label">Total Images</p>
            </div>
            <div class="col-md-4">
                <div class="stat-card-sm">
                    <p class="number text-info">{{ \App\Models\SiteImage::select('category')->distinct()->count() }}</p>
                    <p class="label">Pages</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card-sm">
                <p class="number text-info">{{ \App\Models\SiteImage::select('category')->distinct()->count() }}</p>
                <p class="label">Categories</p>
            </div>
        </div>
    </div>

    <!-- Filters & Actions -->
    <div class="table-container mb-4">
        <div class="table-header">
            <h5><i class="fas fa-paint-brush me-2"></i>All Site Images</h5>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.site-images.flush-cache') }}" class="btn btn-outline-secondary btn-sm" onclick="return confirm('Clear the image cache? New images will be loaded on next page request.')">
                    <i class="fas fa-sync me-1"></i> Clear Cache
                </a>
            </div>
        </div>

        <!-- Filter Form -->
        <form method="GET" class="row g-2 mb-3">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Search by key, alt text, filepath..." value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                        <select name="category" class="form-select form-select-sm">
                    <option value="">All Pages</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" @selected(request('category') == $cat)>{{ ucfirst(str_replace('_', ' ', $cat ?? 'uncategorized')) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-outline-primary btn-sm w-100"><i class="fas fa-filter me-1"></i> Filter</button>
            </div>
            <div class="col-md-2">
                <a href="{{ route('admin.site-images.index') }}" class="btn btn-outline-secondary btn-sm w-100"><i class="fas fa-times me-1"></i> Reset</a>
            </div>
        </form>

        <!-- Image Grid -->
        @if($images->count() > 0)
            <div class="site-image-grid">
                @foreach($images as $image)
                    <div class="site-image-card">
                        <div class="thumb-wrap">
                            <img src="{{ $image->url }}" alt="{{ $image->alt_text ?: $image->key }}" loading="lazy">
                            <span class="category-tag" style="position:absolute;top:0.5rem;left:0.5rem;background:rgba(0,0,0,0.6);color:#fff;text-transform:capitalize;">
                                {{ str_replace('_', ' ', $image->category ?? 'uncategorized') }}
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="key-label" title="{{ $image->key }}">{{ $image->key }}</div>
                            @if($image->alt_text)
                                <div class="alt-text" title="{{ $image->alt_text }}">
                                    <i class="fas fa-quote-left fa-xs text-muted me-1"></i>{{ Str::limit($image->alt_text, 60) }}
                                </div>
                            @endif
                            <div class="filepath">{{ $image->filepath }}</div>
                        </div>
                        <div class="card-actions">
                            <a href="{{ route('admin.site-images.edit', $image) }}" class="btn btn-light btn-sm" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $images->appends(request()->query())->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-paint-brush fa-3x text-muted mb-3"></i>
                <p class="text-muted">No site images found matching your criteria.</p>
            </div>
        @endif
    </div>
@endsection
