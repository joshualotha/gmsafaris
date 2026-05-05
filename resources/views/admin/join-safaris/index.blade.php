@extends('admin.layouts.app')

@section('title', 'Join Safaris')
@section('page_title', 'Join Safaris')

@section('content')
    <div class="table-container">
        <div class="table-header">
            <h5><i class="fas fa-users me-2 text-primary"></i>All Join Safaris</h5>
            <a href="{{ route('admin.join-safaris.create') }}" class="btn btn-gold btn-sm">
                <i class="fas fa-plus me-1"></i> Add New Join Safari
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Dates</th>
                        <th>Participants</th>
                        <th>Min / Max</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($joinSafaris as $joinSafari)
                        <tr>
                            <td>{{ $joinSafari->id }}</td>
                            <td>
                                <strong>{{ $joinSafari->title }}</strong>
                                @if($joinSafari->safari)
                                    <br><small class="text-muted">Based on: {{ $joinSafari->safari->title }}</small>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-light text-dark">
                                    <i class="far fa-calendar-alt me-1"></i>
                                    {{ $joinSafari->start_date->format('M d, Y') }}
                                </span>
                                @if($joinSafari->end_date)
                                    <br><small class="text-muted">to {{ $joinSafari->end_date->format('M d, Y') }}</small>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-info">{{ $joinSafari->participants_count ?? $joinSafari->participants->count() }}</span>
                                <small class="text-muted">joined</small>
                            </td>
                            <td>
                                <span class="badge bg-warning text-dark">{{ $joinSafari->min_participants }}</span>
                                <i class="fas fa-arrow-right mx-1 text-muted"></i>
                                <span class="badge bg-success">{{ $joinSafari->max_participants }}</span>
                            </td>
                            <td>
                                @if($joinSafari->price_per_person)
                                    ${{ number_format($joinSafari->price_per_person, 2) }}
                                    <small class="text-muted">/pp</small>
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>
                            <td>
                                @php
                                    $statusClasses = [
                                        'open' => 'badge bg-primary',
                                        'confirmed' => 'badge bg-success',
                                        'cancelled' => 'badge bg-danger',
                                        'completed' => 'badge bg-secondary',
                                    ];
                                    $statusLabels = [
                                        'open' => 'Open',
                                        'confirmed' => 'Confirmed',
                                        'cancelled' => 'Cancelled',
                                        'completed' => 'Completed',
                                    ];
                                @endphp
                                <span class="{{ $statusClasses[$joinSafari->status] ?? 'badge bg-secondary' }}">
                                    {{ $statusLabels[$joinSafari->status] ?? ucfirst($joinSafari->status) }}
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('admin.join-safaris.toggle-featured', $joinSafari) }}" method="POST" class="d-inline">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="btn btn-sm {{ $joinSafari->is_featured ? 'btn-warning' : 'btn-light' }}">
                                        <i class="fas {{ $joinSafari->is_featured ? 'fa-star' : 'fa-star text-muted' }}"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('admin.join-safaris.toggle-active', $joinSafari) }}" method="POST" class="d-inline">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="btn btn-sm {{ $joinSafari->is_active ? 'btn-success' : 'btn-secondary' }}">
                                        <i class="fas {{ $joinSafari->is_active ? 'fa-check' : 'fa-times' }}"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <div class="action-group">
                                    <a href="{{ route('admin.join-safaris.show', $joinSafari) }}" class="btn btn-sm btn-info" title="View Participants">
                                        <i class="fas fa-users"></i>
                                    </a>
                                    <a href="{{ route('admin.join-safaris.edit', $joinSafari) }}" class="btn btn-sm btn-primary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.join-safaris.destroy', $joinSafari) }}" method="POST"
                                          onsubmit="return confirm('Delete this join safari? All participant data will also be deleted.')">
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
                            <td colspan="10" class="text-center py-4 text-muted">
                                <i class="fas fa-users fa-2x mb-2 d-block"></i>
                                No join safaris found. <a href="{{ route('admin.join-safaris.create') }}">Create your first join safari</a>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $joinSafaris->links() }}
        </div>
    </div>
@endsection
