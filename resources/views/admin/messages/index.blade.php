@extends('admin.layouts.app')

@section('title', 'Messages')
@section('page_title', 'Contact Messages')

@section('content')
    <div class="table-container">
        <div class="table-header">
            <h5><i class="fas fa-envelope me-2 text-primary"></i>All Messages</h5>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-outline-secondary {{ !request('filter') ? 'active' : '' }}">All</a>
                <a href="{{ route('admin.messages.index', ['filter' => 'unread']) }}" class="btn btn-sm btn-outline-warning {{ request('filter') == 'unread' ? 'active' : '' }}">Unread</a>
                <a href="{{ route('admin.messages.index', ['filter' => 'read']) }}" class="btn btn-sm btn-outline-success {{ request('filter') == 'read' ? 'active' : '' }}">Read</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $msg)
                        <tr class="{{ !$msg->is_read ? 'table-warning' : '' }}">
                            <td>{{ $msg->id }}</td>
                            <td><strong>{{ $msg->name }}</strong></td>
                            <td><small>{{ $msg->email }}</small></td>
                            <td>{{ Str::limit($msg->subject ?: 'No subject', 40) }}</td>
                            <td>
                                @if($msg->is_read)
                                    <span class="badge bg-success">Read</span>
                                @else
                                    <span class="badge bg-warning text-dark">New</span>
                                @endif
                            </td>
                            <td><small>{{ $msg->created_at->diffForHumans() }}</small></td>
                            <td>
                                <div class="action-group">
                                    <a href="{{ route('admin.messages.show', $msg) }}" class="btn btn-sm btn-info text-white">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ route('admin.messages.destroy', $msg) }}" method="POST"
                                          onsubmit="return confirm('Delete this message?')">
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
                                <i class="fas fa-envelope fa-2x mb-2 d-block"></i>
                                No messages found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">{{ $messages->links() }}</div>
    </div>
@endsection
