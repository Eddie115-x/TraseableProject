@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="card">
        <h1>{{ $post->title }}</h1>
        <p class="text-muted" style="margin-bottom: 20px;">
            Created: {{ $post->created_at->format('M d, Y H:i') }} |
            Updated: {{ $post->updated_at->format('M d, Y H:i') }}
        </p>
        <div style="white-space: pre-wrap; line-height: 1.8;">{{ $post->content }}</div>
        <div class="actions">
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this post?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
