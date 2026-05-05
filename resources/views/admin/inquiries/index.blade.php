@extends('admin.layouts.app')

@section('title', 'Inquiries')
@section('page_title', 'Inquiries')

@section('content')
    <div class="table-container">
        <div class="table-header">
            <h5><i class="fas fa-question-circle me-2 text-primary"></i>All Inquiries</h5>
            <div class="d-flex gap-2">
                <form method="GET" class="d-flex gap-2">
                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('admin.inquiries.index') }}" class="btn btn-outline-secondary {{ !request('filter') ? 'active' : '' }}">All</a>
                        <a href="{{ route('admin.inquiries.index', ['filter' => 'unread']) }}" class="btn btn-outline-warning {{ request('filter') == 'unread' ? 'active' : '' }}">Unread</a>
                        <a href="{{ route('admin.inquiries.index', ['filter' => 'read']) }}" class="btn btn-outline-success {{ request('filter') == 'read' ? 'active' : '' }}">Read</a>
                    </div>
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Search..." value="{{ request('search') }}" style="width:200px;">
                    <button type="submit" class="btn btn-sm btn-outline-primary"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Safari Package</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($inquiries as $inquiry)
                        <tr class="{{ !$inquiry->is_read ? 'table-warning' : '' }}">
                            <td><strong>{{ $inquiry->name }}</strong></td>
                            <td><small>{{ $inquiry->email }}</small></td>
                            <td>{{ Str::limit($inquiry->subject ?: 'General Inquiry', 30) }}</td>
                            <td>
                                @if($inquiry->safari)
                                    <small>{{ $inquiry->safari->title }}</small>
                                @else
                                    <small class="text-muted">—</small>
                                @endif
                            </td>
                            <td>
                                @if(!$inquiry->is_read)
                                    <span class="badge bg-warning text-dark">Unread</span>
                                @else
                                    <span class="badge bg-success">Read</span>
                                @endif
                            </td>
                            <td><small>{{ $inquiry->created_at->format('M d, Y H:i') }}</small></td>
                            <td>
                                <div class="action-group">
                                    <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="btn btn-sm btn-info text-white">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST"
                                          onsubmit="return confirm('Delete this inquiry permanently?')">
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
                            <td colspan="7" class="text-center py-4 text-muted">
                                <i class="fas fa-question-circle fa-2x mb-2 d-block"></i>
                                No inquiries found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">{{ $inquiries->links() }}</div>
    </div>
@endsection
