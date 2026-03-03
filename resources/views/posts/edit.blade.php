@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <h1>Edit Post</h1>

    <div class="card">
        <form action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" required>{{ old('content', $post->content) }}</textarea>
            </div>

            <div class="actions">
                <button type="submit" class="btn btn-primary">Update Post</button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
