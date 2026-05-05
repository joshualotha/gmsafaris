@extends('admin.layouts.app')

@section('title', 'Message from ' . $contactMessage->name)
@section('page_title', 'Message from ' . $contactMessage->name)

@section('content')
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="form-card">
                <div class="d-flex justify-content-between align-items-start mb-4">
                    <div>
                        <h5 class="fw-bold mb-1">Message Details</h5>
                        <small class="text-muted">Received {{ $contactMessage->created_at->format('F d, Y \a\t H:i') }}</small>
                    </div>
                    <span class="badge {{ $contactMessage->is_read ? 'bg-success' : 'bg-warning text-dark' }} fs-6 px-3 py-2">
                        {{ $contactMessage->is_read ? 'Read' : 'New' }}
                    </span>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Name:</strong></p>
                        <p class="text-muted">{{ $contactMessage->name }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Email:</strong></p>
                        <p class="text-muted">{{ $contactMessage->email }}</p>
                    </div>
                    @if($contactMessage->phone)
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Phone:</strong></p>
                        <p class="text-muted">{{ $contactMessage->phone }}</p>
                    </div>
                    @endif
                    @if($contactMessage->subject)
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Subject:</strong></p>
                        <p class="text-muted">{{ $contactMessage->subject }}</p>
                    </div>
                    @endif
                </div>

                <hr>
                <h6 class="fw-bold mb-2">Message</h6>
                <div class="p-3 bg-light rounded">
                    <p class="mb-0" style="white-space: pre-wrap;">{{ $contactMessage->message }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Admin Notes -->
            <div class="form-card mb-4">
                <h6 class="fw-bold mb-3"><i class="fas fa-sticky-note me-2 text-primary"></i>Admin Notes</h6>
                <form action="{{ route('admin.messages.update-notes', $contactMessage) }}" method="POST">
                    @csrf @method('PATCH')
                    <div class="mb-3">
                        <textarea name="admin_notes" class="form-control" rows="5">{{ old('admin_notes', $contactMessage->admin_notes) }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-gold w-100"><i class="fas fa-save me-1"></i> Save Notes</button>
                </form>
            </div>

            <!-- Quick Actions -->
            <div class="form-card">
                <h6 class="fw-bold mb-3"><i class="fas fa-bolt me-2 text-primary"></i>Quick Actions</h6>
                <a href="mailto:{{ $contactMessage->email }}" class="btn btn-outline-primary w-100 mb-2" target="_blank">
                    <i class="fas fa-reply me-1"></i> Reply via Email
                </a>
                <form action="{{ route('admin.messages.destroy', $contactMessage) }}" method="POST"
                      onsubmit="return confirm('Delete this message?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger w-100">
                        <i class="fas fa-trash me-1"></i> Delete Message
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
