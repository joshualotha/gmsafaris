@extends('admin.layouts.app')

@section('title', $joinSafari->title)
@section('page_title', $joinSafari->title)

@section('content')
    <!-- Status & Quick Actions -->
    <div class="row g-4 mb-4">
        <div class="col-md-8">
            <div class="table-container">
                <h5 class="mb-3"><i class="fas fa-info-circle me-2 text-primary"></i>Safari Details</h5>
                <table class="table table-borderless mb-0">
                    <tr>
                        <th style="width: 200px;">Title</th>
                        <td>{{ $joinSafari->title }}</td>
                    </tr>
                    @if($joinSafari->safari)
                    <tr>
                        <th>Linked Safari</th>
                        <td>
                            <a href="{{ route('admin.safaris.edit', $joinSafari->safari) }}" target="_blank">
                                {{ $joinSafari->safari->title }}
                            </a>
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <th>Duration</th>
                        <td>{{ $joinSafari->duration ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Location</th>
                        <td>{{ $joinSafari->location ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Start Date</th>
                        <td>{{ $joinSafari->start_date->format('F d, Y') }}</td>
                    </tr>
                    @if($joinSafari->end_date)
                    <tr>
                        <th>End Date</th>
                        <td>{{ $joinSafari->end_date->format('F d, Y') }}</td>
                    </tr>
                    @endif
                    <tr>
                        <th>Price</th>
                        <td>
                            @if($joinSafari->price_per_person)
                                ${{ number_format($joinSafari->price_per_person, 2) }} per person
                                @if($joinSafari->price_label)
                                    <br><small class="text-muted">{{ $joinSafari->price_label }}</small>
                                @endif
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{!! $joinSafari->description ?: 'No description' !!}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="table-container">
                <h5 class="mb-3"><i class="fas fa-cog me-2 text-primary"></i>Status</h5>

                <!-- Current Status Badge -->
                <div class="text-center mb-3">
                    @php
                        $statusClasses = [
                            'open' => 'badge bg-primary fs-6',
                            'confirmed' => 'badge bg-success fs-6',
                            'cancelled' => 'badge bg-danger fs-6',
                            'completed' => 'badge bg-secondary fs-6',
                        ];
                        $statusLabels = [
                            'open' => 'Open for Joining',
                            'confirmed' => 'Confirmed',
                            'cancelled' => 'Cancelled',
                            'completed' => 'Completed',
                        ];
                    @endphp
                    <span class="{{ $statusClasses[$joinSafari->status] ?? 'badge bg-secondary fs-6' }}">
                        {{ $statusLabels[$joinSafari->status] ?? ucfirst($joinSafari->status) }}
                    </span>
                </div>

                <!-- Progress Bar -->
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <small class="text-muted">Spots Filled</small>
                        <small class="text-muted">{{ $joinSafari->spots_filled }} / {{ $joinSafari->max_participants }}</small>
                    </div>
                    <div class="progress" style="height: 20px;">
                        @php
                            $percent = $joinSafari->max_participants > 0
                                ? round(($joinSafari->spots_filled / $joinSafari->max_participants) * 100)
                                : 0;
                            $progressClass = $percent >= 100 ? 'bg-success' : ($percent >= 50 ? 'bg-info' : 'bg-warning');
                        @endphp
                        <div class="progress-bar {{ $progressClass }}" role="progressbar"
                             style="width: {{ min($percent, 100) }}%;"
                             aria-valuenow="{{ $joinSafari->spots_filled }}" aria-valuemin="0"
                             aria-valuemax="{{ $joinSafari->max_participants }}">
                            {{ $percent }}%
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mb-3">
                    <div class="text-center">
                        <strong class="d-block fs-4">{{ $joinSafari->spots_filled }}</strong>
                        <small class="text-muted">Joined</small>
                    </div>
                    <div class="text-center">
                        <strong class="d-block fs-4">{{ $joinSafari->spots_remaining }}</strong>
                        <small class="text-muted">Remaining</small>
                    </div>
                    <div class="text-center">
                        <strong class="d-block fs-4">{{ $joinSafari->min_participants }}</strong>
                        <small class="text-muted">Minimum</small>
                    </div>
                </div>

                <!-- Quick Status Update -->
                <hr>
                <h6 class="fw-bold mb-2">Update Status</h6>
                <form action="{{ route('admin.join-safaris.update-status', $joinSafari) }}" method="POST">
                    @csrf @method('PATCH')
                    <div class="d-flex gap-2">
                        <select name="status" class="form-select form-select-sm">
                            <option value="open" @selected($joinSafari->status == 'open')>Open</option>
                            <option value="confirmed" @selected($joinSafari->status == 'confirmed')>Confirmed</option>
                            <option value="cancelled" @selected($joinSafari->status == 'cancelled')>Cancelled</option>
                            <option value="completed" @selected($joinSafari->status == 'completed')>Completed</option>
                        </select>
                        <button type="submit" class="btn btn-sm btn-gold">Update</button>
                    </div>
                </form>

                <!-- Toggle Buttons -->
                <div class="d-flex gap-2 mt-2">
                    <form action="{{ route('admin.join-safaris.toggle-featured', $joinSafari) }}" method="POST">
                        @csrf @method('PATCH')
                        <button type="submit" class="btn btn-sm {{ $joinSafari->is_featured ? 'btn-warning' : 'btn-outline-warning' }}">
                            <i class="fas {{ $joinSafari->is_featured ? 'fa-star' : 'fa-star' }}"></i>
                            {{ $joinSafari->is_featured ? 'Featured' : 'Make Featured' }}
                        </button>
                    </form>
                    <form action="{{ route('admin.join-safaris.toggle-active', $joinSafari) }}" method="POST">
                        @csrf @method('PATCH')
                        <button type="submit" class="btn btn-sm {{ $joinSafari->is_active ? 'btn-success' : 'btn-outline-secondary' }}">
                            <i class="fas {{ $joinSafari->is_active ? 'fa-check' : 'fa-times' }}"></i>
                            {{ $joinSafari->is_active ? 'Active' : 'Inactive' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Participants List -->
    <div class="table-container">
        <div class="table-header">
            <h5><i class="fas fa-users me-2 text-primary"></i>Participants ({{ $participants->total() }})</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>People</th>
                        <th>Confirmed</th>
                        <th>Joined</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($participants as $participant)
                        <tr>
                            <td>{{ $participant->id }}</td>
                            <td><strong>{{ $participant->name }}</strong></td>
                            <td>{{ $participant->email }}</td>
                            <td>{{ $participant->phone ?: 'N/A' }}</td>
                            <td>{{ $participant->country ?: 'N/A' }}</td>
                            <td><span class="badge bg-info">{{ $participant->number_of_people }}</span></td>
                            <td>
                                @if($participant->is_confirmed)
                                    <span class="badge bg-success">Confirmed</span>
                                @else
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @endif
                            </td>
                            <td>{{ $participant->created_at->format('M d, Y') }}</td>
                            <td>
                                <div class="action-group">
                                    @if(!$participant->is_confirmed)
                                        <form action="{{ route('admin.join-safari-participants.confirm', $participant) }}" method="POST"
                                              class="d-inline">
                                            @csrf @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-success" title="Confirm">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                    @endif
                                    <form action="{{ route('admin.join-safari-participants.destroy', $participant) }}" method="POST"
                                          onsubmit="return confirm('Remove this participant?')" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Remove">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @if($participant->special_requests)
                            <tr class="table-light">
                                <td colspan="9" class="py-2">
                                    <small><strong>Special Requests:</strong> {{ $participant->special_requests }}</small>
                                </td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-4 text-muted">
                                <i class="fas fa-users fa-2x mb-2 d-block"></i>
                                No participants yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $participants->links() }}
        </div>
    </div>

    <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('admin.join-safaris.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to List
        </a>
        <a href="{{ route('admin.join-safaris.edit', $joinSafari) }}" class="btn btn-gold">
            <i class="fas fa-edit me-1"></i> Edit Safari
        </a>
    </div>
@endsection
