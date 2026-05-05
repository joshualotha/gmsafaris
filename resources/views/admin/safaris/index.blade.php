@extends('admin.layouts.app')

@section('title', 'Safaris')
@section('page_title', 'Safari Packages')

@section('content')
    <div class="table-container">
        <div class="table-header">
            <h5><i class="fas fa-paw me-2 text-primary"></i>All Safaris</h5>
            <a href="{{ route('admin.safaris.create') }}" class="btn btn-gold btn-sm">
                <i class="fas fa-plus me-1"></i> Add New Safari
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Duration</th>
                        <th>Location</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($safaris as $safari)
                        <tr>
                            <td>{{ $safari->id }}</td>
                            <td>
                                <strong>{{ $safari->title }}</strong>
                                @if($safari->subtitle)
                                    <br><small class="text-muted">{{ $safari->subtitle }}</small>
                                @endif
                            </td>
                            <td><span class="badge bg-light text-dark">{{ $safari->duration ?: 'N/A' }}</span></td>
                            <td>{{ $safari->location ?: 'N/A' }}</td>
                            <td>
                                <form action="{{ route('admin.safaris.toggle-featured', $safari) }}" method="POST" class="d-inline">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="btn btn-sm {{ $safari->is_featured ? 'btn-warning' : 'btn-light' }}">
                                        <i class="fas {{ $safari->is_featured ? 'fa-star' : 'fa-star text-muted' }}"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('admin.safaris.toggle-active', $safari) }}" method="POST" class="d-inline">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="btn btn-sm {{ $safari->is_active ? 'btn-success' : 'btn-secondary' }}">
                                        <i class="fas {{ $safari->is_active ? 'fa-check' : 'fa-times' }}"></i>
                                    </button>
                                </form>
                            </td>
                            <td>{{ $safari->sort_order }}</td>
                            <td>
                                <div class="action-group">
                                    <a href="{{ route('admin.safaris.edit', $safari) }}" class="btn btn-sm btn-primary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.safaris.destroy', $safari) }}" method="POST"
                                          onsubmit="return confirm('Delete this safari? This cannot be undone.')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">
                                <i class="fas fa-paw fa-2x mb-2 d-block"></i>
                                No safaris found. <a href="{{ route('admin.safaris.create') }}">Create your first safari</a>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $safaris->links() }}
        </div>
    </div>
@endsection
