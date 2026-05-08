@extends('admin.layouts.app')

@section('title', 'Gallery Management')
@section('page_title', 'Gallery Management')

@section('extra_styles')
<style>
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 1rem;
    }
    .gallery-card {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0,0,0,0.06);
        transition: transform 0.2s, box-shadow 0.2s;
        position: relative;
    }
    .gallery-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .gallery-card .thumb-wrap {
        width: 100%;
        height: 160px;
        overflow: hidden;
        background: #f0f0f0;
        position: relative;
    }
    .gallery-card .thumb-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .gallery-card .card-body {
        padding: 0.75rem;
    }
    .gallery-card .card-body .caption {
        font-size: 0.85rem;
        font-weight: 500;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 0.25rem;
    }
    .gallery-card .card-body .meta {
        font-size: 0.7rem;
        color: #888;
    }
    .gallery-card .card-actions {
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
        display: flex;
        gap: 0.25rem;
        opacity: 0;
        transition: opacity 0.2s;
    }
    .gallery-card:hover .card-actions {
        opacity: 1;
    }
    .gallery-card .card-actions .btn {
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
    .gallery-card .status-badge {
        position: absolute;
        top: 0.5rem;
        left: 0.5rem;
        font-size: 0.65rem;
        padding: 0.2rem 0.5rem;
        border-radius: 4px;
    }
    .gallery-card .checkbox-wrap {
        position: absolute;
        top: 0.5rem;
        left: 0.5rem;
        z-index: 2;
    }
    .gallery-card .checkbox-wrap .form-check-input {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }
    .gallery-card .category-tag {
        display: inline-block;
        font-size: 0.65rem;
        padding: 0.15rem 0.5rem;
        border-radius: 4px;
        background: #e9ecef;
        color: #555;
        margin-top: 0.25rem;
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
    .sortable-ghost {
        opacity: 0.4;
    }
    .sortable-drag {
        opacity: 0.8;
    }
</style>
@endsection

@section('content')
    <!-- Stats Row -->
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="stat-card-sm">
                <p class="number">{{ $stats['total'] }}</p>
                <p class="label">Total Images</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card-sm">
                <p class="number text-success">{{ $stats['active'] }}</p>
                <p class="label">Active</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card-sm">
                <p class="number text-muted">{{ $stats['inactive'] }}</p>
                <p class="label">Inactive</p>
            </div>
        </div>
    </div>

    <!-- Filters & Actions -->
    <div class="table-container mb-4">
        <div class="table-header">
            <h5><i class="fas fa-images me-2"></i>All Images</h5>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-gold btn-sm">
                    <i class="fas fa-upload me-1"></i> Upload Images
                </a>
                <form action="{{ route('admin.gallery.sync') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-secondary btn-sm" onclick="return confirm('Sync all files from the gallery directory into the database?')">
                        <i class="fas fa-sync me-1"></i> Sync from Filesystem
                    </button>
                </form>
                <button id="bulk-delete-btn" class="btn btn-outline-danger btn-sm d-none" onclick="bulkDelete()">
                    <i class="fas fa-trash me-1"></i> Delete Selected
                </button>
            </div>
        </div>

        <!-- Filter Form -->
        <form method="GET" class="row g-2 mb-3">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Search by caption, alt text..." value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <select name="category" class="form-select form-select-sm">
                    <option value="">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" @selected(request('category') == $cat)>{{ ucfirst($cat) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select name="status" class="form-select form-select-sm">
                    <option value="">All Status</option>
                    <option value="active" @selected(request('status') == 'active')>Active</option>
                    <option value="inactive" @selected(request('status') == 'inactive')>Inactive</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-outline-primary btn-sm w-100"><i class="fas fa-filter me-1"></i> Filter</button>
            </div>
            <div class="col-md-2">
                <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary btn-sm w-100"><i class="fas fa-times me-1"></i> Reset</a>
            </div>
        </form>

        <!-- Gallery Grid -->
        @if($images->count() > 0)
            <form id="bulk-form" action="{{ route('admin.gallery.bulk-delete') }}" method="POST" style="display:none;">
                @csrf
            </form>
            <div class="gallery-grid" id="gallery-grid">
                @foreach($images as $image)
                    <div class="gallery-card" data-id="{{ $image->id }}">
                        <div class="checkbox-wrap">
                            <input type="checkbox" name="ids[]" value="{{ $image->id }}" class="form-check-input select-checkbox" onchange="toggleBulkDelete()" form="bulk-form">
                        </div>
                        <div class="thumb-wrap">
                            <img src="{{ $image->thumb_url }}" alt="{{ $image->alt_text ?: $image->caption ?: 'Gallery image' }}" loading="lazy">
                            @if(!$image->is_active)
                                <span class="status-badge bg-secondary text-white">Inactive</span>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="caption" title="{{ $image->caption ?: $image->original_name }}">
                                {{ $image->caption ?: $image->original_name }}
                            </div>
                            <div class="meta">
                                #{{ $image->id }} · {{ $image->sort_order }}
                            </div>
                            @if($image->category)
                                <span class="category-tag">{{ ucfirst($image->category) }}</span>
                            @endif
                        </div>
                        <div class="card-actions">
                            <button type="button" class="btn btn-light btn-sm" title="Edit" onclick="editImage({{ $image->id }}, '{{ addslashes($image->caption) }}', '{{ addslashes($image->alt_text) }}', '{{ $image->category }}')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form action="{{ route('admin.gallery.toggle-active', $image) }}" method="POST" class="d-inline">
                                @csrf @method('PATCH')
                                <button type="submit" class="btn btn-{{ $image->is_active ? 'warning' : 'success' }} btn-sm" title="{{ $image->is_active ? 'Deactivate' : 'Activate' }}">
                                    <i class="fas fa-{{ $image->is_active ? 'eye-slash' : 'eye' }}"></i>
                                </button>
                            </form>
                            <form action="{{ route('admin.gallery.destroy', $image) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this image permanently?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
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
                <i class="fas fa-images fa-3x text-muted mb-3"></i>
                <p class="text-muted">No gallery images found.</p>
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-gold"><i class="fas fa-upload me-1"></i> Upload Images</a>
            </div>
        @endif
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="edit-form">
                    @csrf @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="fas fa-edit me-2"></i>Edit Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Caption</label>
                            <input type="text" name="caption" id="edit-caption" class="form-control" maxlength="255">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alt Text (for SEO/accessibility)</label>
                            <input type="text" name="alt_text" id="edit-alt-text" class="form-control" maxlength="255">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="category" id="edit-category" class="form-select">
                                <option value="general">General</option>
                                <option value="wildlife">Wildlife</option>
                                <option value="landscapes">Landscapes</option>
                                <option value="cultural">Cultural</option>
                                <option value="lodges">Lodges</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-gold"><i class="fas fa-save me-1"></i> Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('extra_scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
    // Bulk delete toggle
    function toggleBulkDelete() {
        var checked = document.querySelectorAll('.select-checkbox:checked').length;
        var btn = document.getElementById('bulk-delete-btn');
        if (checked > 0) {
            btn.classList.remove('d-none');
            btn.textContent = ' Delete Selected (' + checked + ')';
        } else {
            btn.classList.add('d-none');
        }
    }

    function bulkDelete() {
        if (!confirm('Delete selected images permanently?')) return;
        document.getElementById('bulk-form').submit();
    }

    // Edit modal
    function editImage(id, caption, altText, category) {
        document.getElementById('edit-form').action = '{{ url("admin/gallery") }}/' + id;
        document.getElementById('edit-caption').value = caption;
        document.getElementById('edit-alt-text').value = altText;
        document.getElementById('edit-category').value = category || 'general';
        new bootstrap.Modal(document.getElementById('editModal')).show();
    }

    // Drag & drop reorder
    document.addEventListener('DOMContentLoaded', function() {
        var grid = document.getElementById('gallery-grid');
        if (grid) {
            new Sortable(grid, {
                animation: 150,
                ghostClass: 'sortable-ghost',
                dragClass: 'sortable-drag',
                onEnd: function() {
                    var ids = [];
                    grid.querySelectorAll('.gallery-card').forEach(function(card) {
                        ids.push(card.dataset.id);
                    });
                    fetch('{{ route("admin.gallery.reorder") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ ids: ids })
                    });
                }
            });
        }
    });
</script>
@endsection
