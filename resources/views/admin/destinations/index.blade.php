@extends('admin.layouts.app')

@section('title', 'Destinations')
@section('page_title', 'Destinations')

@section('content')
    <div class="table-container">
        <div class="table-header">
            <h5><i class="fas fa-map-marker-alt me-2 text-primary"></i>All Destinations</h5>
            <a href="{{ route('admin.destinations.create') }}" class="btn btn-gold btn-sm">
                <i class="fas fa-plus me-1"></i> Add New Destination
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Subtitle</th>
                        <th>Location</th>
                        <th>Active</th>
                        <th>Featured</th>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($destinations as $dest)
                        <tr>
                            <td>{{ $dest->id }}</td>
                            <td><strong>{{ $dest->name }}</strong></td>
                            <td><small class="text-muted">{{ Str::limit($dest->subtitle, 40) }}</small></td>
                            <td>{{ $dest->location ?: 'N/A' }}</td>
                            <td>
                                <span class="badge {{ $dest->is_active ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $dest->is_active ? 'Yes' : 'No' }}
                                </span>
                            </td>
                            <td>
                                @if($dest->is_featured)
                                    <span class="badge bg-warning text-dark"><i class="fas fa-star me-1"></i>Featured</span>
                                @else
                                    <span class="text-muted">&mdash;</span>
                                @endif
                            </td>
                            <td>{{ $dest->sort_order }}</td>
                            <td>
                                <div class="action-group">
                                    <a href="{{ route('admin.destinations.edit', $dest) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.destinations.destroy', $dest) }}" method="POST"
                                          onsubmit="return confirm('Delete this destination?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">
                                <i class="fas fa-map-marker-alt fa-2x mb-2 d-block"></i>
                                No destinations found. <a href="{{ route('admin.destinations.create') }}">Create one</a>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">{{ $destinations->links() }}</div>
    </div>
@endsection
