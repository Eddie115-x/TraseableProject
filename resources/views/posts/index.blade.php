@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1>All Posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">+ New Post</a>
    </div>

    @forelse($posts as $post)
        <div class="card">
            <h2 style="margin-bottom: 10px;">
                <a href="{{ route('posts.show', $post) }}" style="color: #333; text-decoration: none;">
                    {{ $post->title }}
                </a>
            </h2>
            <p class="text-muted">{{ Str::limit($post->content, 150) }}</p>
            <p class="text-muted" style="margin-top: 10px;">
                Created: {{ $post->created_at->format('M d, Y H:i') }}
            </p>
            <div class="actions">
                <a href="{{ route('posts.show', $post) }}" class="btn btn-secondary">View</a>
                <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this post?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @empty
        <div class="card">
            <p>No posts found. <a href="{{ route('posts.create') }}">Create your first post</a>.</p>
        </div>
    @endforelse
@endsection
