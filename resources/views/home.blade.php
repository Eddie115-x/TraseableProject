@extends('layouts.app')

@section('title', 'Traseable - Home')

@section('content')
    <div style="text-align: center; padding: 60px 20px;">
        <h1 style="font-size: 3rem; margin-bottom: 10px;">Traseable</h1>
        <p style="font-size: 1.2rem; color: #6b7280; margin-bottom: 40px;">
            Track, manage, and share your content with ease.
        </p>

        <div style="display: flex; justify-content: center; gap: 15px; flex-wrap: wrap;">
            <a href="{{ route('posts.index') }}" class="btn btn-primary" style="padding: 15px 30px; font-size: 1rem;">
                View All Posts
            </a>
            <a href="{{ route('posts.create') }}" class="btn btn-secondary" style="padding: 15px 30px; font-size: 1rem;">
                Create New Post
            </a>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-top: 40px;">
        <div class="card" style="text-align: center;">
            <h3 style="margin-bottom: 10px;">{{ \App\Models\Post::count() }}</h3>
            <p class="text-muted">Total Posts</p>
        </div>
        <div class="card" style="text-align: center;">
            <h3 style="margin-bottom: 10px;">{{ \App\Models\Post::whereDate('created_at', today())->count() }}</h3>
            <p class="text-muted">Posts Today</p>
        </div>
        <div class="card" style="text-align: center;">
            <h3 style="margin-bottom: 10px;">{{ \App\Models\Post::latest()->first()?->created_at?->diffForHumans() ?? 'N/A' }}</h3>
            <p class="text-muted">Last Post</p>
        </div>
    </div>

    @if($latestPosts->count() > 0)
        <h2 style="margin-top: 50px; margin-bottom: 20px;">Recent Posts</h2>
        @foreach($latestPosts as $post)
            <div class="card">
                <h3 style="margin-bottom: 10px;">
                    <a href="{{ route('posts.show', $post) }}" style="color: #333; text-decoration: none;">
                        {{ $post->title }}
                    </a>
                </h3>
                <p class="text-muted">{{ Str::limit($post->content, 100) }}</p>
                <p class="text-muted" style="margin-top: 10px; font-size: 12px;">
                    {{ $post->created_at->format('M d, Y') }}
                </p>
            </div>
        @endforeach
    @endif
@endsection
