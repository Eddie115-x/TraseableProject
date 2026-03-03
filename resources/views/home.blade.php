@extends('layouts.app')

@section('title', 'Traseable')

@section('content')
    <div style="text-align: center; padding: 80px 20px;">
        <h1 style="font-size: 3rem; margin-bottom: 15px;">Traseable</h1>
        <p style="font-size: 1.1rem; color: #6b7280; margin-bottom: 30px;">
            Your simple content management system.
        </p>
        <a href="{{ route('posts.index') }}" class="btn btn-primary" style="padding: 12px 30px;">
            View Posts
        </a>
    </div>
@endsection
