@extends('admin.layouts.app')

@section('title', 'Blog Posts')
@section('page_title', 'Blog Posts')

@section('content')
    <div class="table-container">
        <div class="table-header">
            <h5><i class="fas fa-blog me-2 text-primary"></i>All Posts</h5>
            <a href="{{ route('admin.blog.create') }}" class="btn btn-gold btn-sm">
                <i class="fas fa-plus me-1"></i> New Post
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Flags</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>
                                <strong>{{ $post->title }}</strong>
                                @if($post->featured_image)
                                    <br><small class="text-muted"><i class="fas fa-image me-1"></i>Has image</small>
                                @endif
                                @if($post->reading_time)
                                    <br><small class="text-muted"><i class="fas fa-clock me-1"></i>{{ $post->reading_time }} min read</small>
                                @endif
                            </td>
                            <td>{{ $post->author ?: 'N/A' }}</td>
                            <td><span class="badge bg-light text-dark">{{ $post->category ?: 'Uncategorized' }}</span></td>
                            <td>
                                <form action="{{ route('admin.blog.toggle-publish', $post) }}" method="POST" class="d-inline">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="btn btn-sm {{ $post->is_published ? 'btn-success' : 'btn-secondary' }}">
                                        <i class="fas {{ $post->is_published ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                                        {{ $post->is_published ? 'Published' : 'Draft' }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                @if($post->is_featured)
                                    <span class="badge bg-warning text-dark me-1" title="Featured Post"><i class="fas fa-star"></i> Featured</span>
                                @endif
                                @if($post->is_trending)
                                    <span class="badge bg-info text-dark" title="Trending"><i class="fas fa-fire"></i> Trending</span>
                                @endif
                                @if(!$post->is_featured && !$post->is_trending)
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                            <td><small>{{ $post->published_at ? $post->published_at->format('M d, Y') : '—' }}</small></td>
                            <td>
                                <div class="action-group">
                                    <a href="{{ route('admin.blog.edit', $post) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.blog.destroy', $post) }}" method="POST"
                                          onsubmit="return confirm('Delete this post?')">
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
                                <i class="fas fa-blog fa-2x mb-2 d-block"></i>
                                No blog posts yet. <a href="{{ route('admin.blog.create') }}">Write your first post</a>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">{{ $posts->links() }}</div>
    </div>
@endsection
