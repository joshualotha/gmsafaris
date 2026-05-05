@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="stat-card d-flex align-items-center gap-3">
                <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                    <i class="fas fa-paw"></i>
                </div>
                <div>
                    <p class="stat-number">{{ $stats['active_safaris'] }}/{{ $stats['total_safaris'] }}</p>
                    <p class="stat-label">Active Safaris</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card d-flex align-items-center gap-3">
                <div class="stat-icon bg-info bg-opacity-10 text-info">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div>
                    <p class="stat-number">{{ $stats['total_destinations'] }}</p>
                    <p class="stat-label">Destinations</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card d-flex align-items-center gap-3">
                <div class="stat-icon bg-success bg-opacity-10 text-success">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div>
                    <p class="stat-number">{{ $stats['pending_bookings'] }}</p>
                    <p class="stat-label">Pending Bookings</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card d-flex align-items-center gap-3">
                <div class="stat-icon bg-info bg-opacity-10 text-info">
                    <i class="fas fa-question-circle"></i>
                </div>
                <div>
                    <p class="stat-number">{{ $stats['unread_inquiries'] }}</p>
                    <p class="stat-label">Unread Inquiries</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card d-flex align-items-center gap-3">
                <div class="stat-icon bg-danger bg-opacity-10 text-danger">
                    <i class="fas fa-envelope"></i>
                </div>
                <div>
                    <p class="stat-number">{{ $stats['unread_messages'] }}</p>
                    <p class="stat-label">Unread Messages</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Recent Bookings -->
        <div class="col-lg-6">
            <div class="table-container">
                <div class="table-header">
                    <h5><i class="fas fa-clock me-2 text-primary"></i>Recent Bookings</h5>
                    <a href="{{ route('admin.bookings.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                @if($recent_bookings->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Reference</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recent_bookings as $booking)
                                    <tr>
                                        <td><a href="{{ route('admin.bookings.show', $booking) }}" class="text-decoration-none">{{ $booking->booking_reference }}</a></td>
                                        <td>{{ $booking->full_name ?: $booking->email }}</td>
                                        <td><span class="badge badge-{{ $booking->status }}">{{ ucfirst($booking->status) }}</span></td>
                                        <td><small>{{ $booking->created_at->format('M d, Y') }}</small></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted text-center py-3 mb-0">No bookings yet.</p>
                @endif
            </div>
        </div>

        <!-- Recent Inquiries -->
        <div class="col-lg-6">
            <div class="table-container">
                <div class="table-header">
                    <h5><i class="fas fa-question-circle me-2 text-primary"></i>Unread Inquiries</h5>
                    <a href="{{ route('admin.inquiries.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                @if(isset($recent_inquiries) && $recent_inquiries->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recent_inquiries as $inquiry)
                                    <tr>
                                        <td>{{ $inquiry->name }}<br><small class="text-muted">{{ $inquiry->email }}</small></td>
                                        <td>{{ Str::limit($inquiry->subject ?: 'General Inquiry', 30) }}</td>
                                        <td><small>{{ $inquiry->created_at->diffForHumans() }}</small></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted text-center py-3 mb-0">No unread inquiries.</p>
                @endif
            </div>
        </div>

        <!-- Recent Messages -->
        <div class="col-lg-6">
            <div class="table-container">
                <div class="table-header">
                    <h5><i class="fas fa-envelope me-2 text-primary"></i>Unread Messages</h5>
                    <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                @if($recent_messages->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>From</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recent_messages as $msg)
                                    <tr>
                                        <td>{{ $msg->name }}<br><small class="text-muted">{{ $msg->email }}</small></td>
                                        <td>{{ Str::limit($msg->subject ?: 'No subject', 30) }}</td>
                                        <td><small>{{ $msg->created_at->diffForHumans() }}</small></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted text-center py-3 mb-0">No unread messages.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Quick Stats Row -->
    <div class="row g-4 mt-2">
        <div class="col-lg-3 col-md-6">
            <div class="stat-card text-center">
                <p class="stat-number">{{ $stats['total_blog_posts'] }}</p>
                <p class="stat-label">Blog Posts ({{ $stats['published_posts'] }} published)</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="stat-card text-center">
                <p class="stat-number">{{ $stats['total_bookings'] }}</p>
                <p class="stat-label">Total Bookings</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="stat-card text-center">
                <p class="stat-number">{{ $stats['total_inquiries'] }}</p>
                <p class="stat-label">Total Inquiries</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="stat-card text-center">
                <p class="stat-number">{{ $stats['total_messages'] }}</p>
                <p class="stat-label">Total Messages</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="stat-card text-center">
                <p class="stat-number">{{ $stats['total_safaris'] }}</p>
                <p class="stat-label">Total Safari Packages</p>
            </div>
        </div>
    </div>
@endsection
