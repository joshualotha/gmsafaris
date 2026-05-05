@extends('admin.layouts.app')

@section('title', 'Inquiry from ' . $inquiry->name)
@section('page_title', 'Inquiry: ' . $inquiry->name)

@section('content')
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="form-card">
                <div class="d-flex justify-content-between align-items-start mb-4">
                    <div>
                        <h5 class="fw-bold mb-1">Inquiry Details</h5>
                        <small class="text-muted">Received {{ $inquiry->created_at->format('F d, Y \a\t H:i') }}</small>
                    </div>
                    <span class="badge {{ $inquiry->is_read ? 'bg-success' : 'bg-warning text-dark' }} fs-6 px-3 py-2">
                        {{ $inquiry->is_read ? 'Read' : 'Unread' }}
                    </span>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Name:</strong></p>
                        <p class="text-muted">{{ $inquiry->name }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Email:</strong></p>
                        <p class="text-muted">
                            <a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Phone:</strong></p>
                        <p class="text-muted">
                            @if($inquiry->phone)
                                <a href="tel:{{ $inquiry->phone }}">{{ $inquiry->phone }}</a>
                            @else
                                N/A
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Country:</strong></p>
                        <p class="text-muted">{{ $inquiry->country ?: 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Subject:</strong></p>
                        <p class="text-muted">{{ $inquiry->subject ?: 'General Inquiry' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Safari Package:</strong></p>
                        <p class="text-muted">
                            @if($inquiry->safari)
                                <a href="{{ route('admin.safaris.edit', $inquiry->safari) }}" target="_blank">
                                    {{ $inquiry->safari->title }}
                                </a>
                            @else
                                General Inquiry
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Read At:</strong></p>
                        <p class="text-muted">{{ $inquiry->read_at ? $inquiry->read_at->format('M d, Y H:i') : 'Not yet' }}</p>
                    </div>
                </div>

                <hr>
                <h6 class="fw-bold mb-2">Message</h6>
                <div class="p-3 bg-light rounded">
                    <p class="mb-0" style="white-space: pre-wrap;">{{ $inquiry->message }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Admin Notes -->
            <div class="form-card mb-4">
                <h6 class="fw-bold mb-3"><i class="fas fa-sticky-note me-2 text-primary"></i>Admin Notes</h6>
                <form action="{{ route('admin.inquiries.update-notes', $inquiry) }}" method="POST">
                    @csrf @method('PATCH')
                    <div class="mb-3">
                        <textarea name="admin_notes" class="form-control" rows="5">{{ old('admin_notes', $inquiry->admin_notes) }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-gold w-100"><i class="fas fa-save me-1"></i> Save Notes</button>
                </form>
            </div>

            <!-- Quick Actions -->
            <div class="form-card">
                <h6 class="fw-bold mb-3"><i class="fas fa-bolt me-2 text-primary"></i>Quick Actions</h6>
                <div class="d-grid gap-2">
                    <a href="mailto:{{ $inquiry->email }}" class="btn btn-outline-primary">
                        <i class="fas fa-reply me-1"></i> Reply via Email
                    </a>
                    <a href="tel:{{ $inquiry->phone }}" class="btn btn-outline-success">
                        <i class="fas fa-phone me-1"></i> Call {{ $inquiry->name }}
                    </a>
                    <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST"
                          onsubmit="return confirm('Delete this inquiry permanently?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-100 mt-2">
                            <i class="fas fa-trash me-1"></i> Delete Inquiry
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
