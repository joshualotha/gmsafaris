@extends('admin.layouts.app')

@section('title', 'Bookings')
@section('page_title', 'Bookings')

@section('content')
    <div class="table-container">
        <div class="table-header">
            <h5><i class="fas fa-calendar-check me-2 text-primary"></i>All Bookings</h5>
            <div class="d-flex gap-2">
                <form method="GET" class="d-flex gap-2">
                    <select name="status" class="form-select form-select-sm" style="width:auto;" onchange="this.form.submit()">
                        <option value="">All Status</option>
                        <option value="pending" @selected(request('status') == 'pending')>Pending</option>
                        <option value="confirmed" @selected(request('status') == 'confirmed')>Confirmed</option>
                        <option value="cancelled" @selected(request('status') == 'cancelled')>Cancelled</option>
                        <option value="completed" @selected(request('status') == 'completed')>Completed</option>
                    </select>
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Search..." value="{{ request('search') }}" style="width:200px;">
                    <button type="submit" class="btn btn-sm btn-outline-primary"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Reference</th>
                        <th>Customer</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Safari</th>
                        <th>Travelers</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                        <tr>
                            <td><strong>{{ $booking->booking_reference }}</strong></td>
                            <td>{{ $booking->full_name ?: 'N/A' }}</td>
                            <td><small>{{ $booking->email }}</small></td>
                            <td>
                                @if($booking->booking_type === 'inquiry')
                                    <span class="badge bg-info text-white">Inquiry</span>
                                @else
                                    <span class="badge bg-primary text-white">Booking</span>
                                @endif
                            </td>
                            <td>
                                @if($booking->safari)
                                    <small>{{ $booking->safari->title }}</small>
                                @else
                                    <small class="text-muted">{{ $booking->safari_type ?: '—' }}</small>
                                @endif
                            </td>
                            <td>{{ $booking->number_of_travelers ?: '—' }}</td>
                            <td><span class="badge badge-{{ $booking->status }}">{{ ucfirst($booking->status) }}</span></td>
                            <td><small>{{ $booking->created_at->format('M d, Y') }}</small></td>
                            <td>
                                <a href="{{ route('admin.bookings.show', $booking) }}" class="btn btn-sm btn-info text-white">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-4 text-muted">
                                <i class="fas fa-calendar-check fa-2x mb-2 d-block"></i>
                                No bookings found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">{{ $bookings->links() }}</div>
    </div>
@endsection
