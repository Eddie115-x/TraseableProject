@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <h1>Create New Post</h1>

    <div class="card">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" required>{{ old('content') }}</textarea>
            </div>

            <div class="actions">
                <button type="submit" class="btn btn-primary">Create Post</button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
