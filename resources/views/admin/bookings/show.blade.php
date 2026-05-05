@extends('admin.layouts.app')

@section('title', 'Booking ' . $booking->booking_reference)
@section('page_title', 'Booking: ' . $booking->booking_reference)

@section('content')
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="form-card">
                <div class="d-flex justify-content-between align-items-start mb-4">
                    <div>
                        <h5 class="fw-bold mb-1">
                            @if($booking->booking_type === 'inquiry')
                                <span class="badge bg-info text-white me-2">Inquiry</span>
                            @else
                                <span class="badge bg-primary text-white me-2">Booking</span>
                            @endif
                            Booking Details
                        </h5>
                        <small class="text-muted">Created {{ $booking->created_at->format('F d, Y \a\t H:i') }}</small>
                    </div>
                    <span class="badge badge-{{ $booking->status }} fs-6 px-3 py-2">{{ ucfirst($booking->status) }}</span>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <p class="mb-1"><strong>First Name:</strong></p>
                        <p class="text-muted">{{ $booking->first_name ?: 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Last Name:</strong></p>
                        <p class="text-muted">{{ $booking->last_name ?: 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Email:</strong></p>
                        <p class="text-muted">{{ $booking->email }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Phone:</strong></p>
                        <p class="text-muted">{{ $booking->phone ?: 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Country:</strong></p>
                        <p class="text-muted">{{ $booking->country ?: 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Booking Type:</strong></p>
                        <p class="text-muted">{{ ucfirst($booking->booking_type ?: 'booking') }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Safari Package:</strong></p>
                        <p class="text-muted">
                            @if($booking->safari)
                                <a href="{{ route('admin.safaris.edit', $booking->safari) }}" target="_blank">
                                    {{ $booking->safari->title }}
                                </a>
                            @else
                                {{ $booking->safari_type ?: 'N/A' }}
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Duration:</strong></p>
                        <p class="text-muted">{{ $booking->duration ?: 'N/A' }}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="mb-1"><strong>Travel Month:</strong></p>
                        <p class="text-muted">{{ $booking->travel_month ?: 'N/A' }}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="mb-1"><strong>Adults:</strong></p>
                        <p class="text-muted">{{ $booking->number_of_adults ?: 'N/A' }}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="mb-1"><strong>Children:</strong></p>
                        <p class="text-muted">{{ $booking->number_of_children ?: '0' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Accommodation:</strong></p>
                        <p class="text-muted">{{ $booking->accommodation_style ?: $booking->accommodation_level ?: 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Preferred Destinations:</strong></p>
                        <p class="text-muted">{{ $booking->preferred_destinations ?: 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Hear About Us:</strong></p>
                        <p class="text-muted">{{ $booking->hear_about_us ?: 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Confirmed At:</strong></p>
                        <p class="text-muted">{{ $booking->confirmed_at ? $booking->confirmed_at->format('M d, Y H:i') : 'Not yet' }}</p>
                    </div>
                </div>

                @if($booking->message)
                    <hr>
                    <h6 class="fw-bold mb-2">Customer Message</h6>
                    <p class="text-muted">{{ $booking->message }}</p>
                @endif

                @if($booking->special_requests)
                    <hr>
                    <h6 class="fw-bold mb-2">Special Requests</h6>
                    <p class="text-muted">{{ $booking->special_requests }}</p>
                @endif
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Update Status -->
            <div class="form-card mb-4">
                <h6 class="fw-bold mb-3"><i class="fas fa-edit me-2 text-primary"></i>Update Status</h6>
                <form action="{{ route('admin.bookings.update-status', $booking) }}" method="POST">
                    @csrf @method('PATCH')
                    <div class="mb-3">
                        <select name="status" class="form-select">
                            <option value="pending" @selected($booking->status == 'pending')>Pending</option>
                            <option value="confirmed" @selected($booking->status == 'confirmed')>Confirmed</option>
                            <option value="cancelled" @selected($booking->status == 'cancelled')>Cancelled</option>
                            <option value="completed" @selected($booking->status == 'completed')>Completed</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small">Admin Notes</label>
                        <textarea name="admin_notes" class="form-control" rows="3">{{ old('admin_notes', $booking->admin_notes) }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-gold w-100"><i class="fas fa-save me-1"></i> Update</button>
                </form>
            </div>

            <!-- Delete -->
            <div class="form-card">
                <h6 class="fw-bold mb-3 text-danger"><i class="fas fa-trash me-2"></i>Danger Zone</h6>
                <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST"
                      onsubmit="return confirm('Delete this booking permanently?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger w-100"><i class="fas fa-trash me-1"></i> Delete Booking</button>
                </form>
            </div>
        </div>
    </div>
@endsection
