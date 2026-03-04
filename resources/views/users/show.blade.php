@extends('layouts.app')

@section('title', $user->name)

@section('content')
    <div class="card">
        <h1>{{ $user->name }}</h1>
        <p class="text-muted" style="margin-bottom: 20px;">{{ $user->email }}</p>
        
        <div style="background: #f9fafb; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
            <p><strong>Member since:</strong> {{ $user->created_at->format('F d, Y') }}</p>
            <p><strong>Last updated:</strong> {{ $user->updated_at->format('F d, Y H:i') }}</p>
            @if($user->email_verified_at)
                <p><strong>Email verified:</strong> {{ $user->email_verified_at->format('F d, Y') }}</p>
            @else
                <p><strong>Email verified:</strong> Not verified</p>
            @endif
        </div>

        <div class="actions">
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to Users</a>
        </div>
    </div>
@endsection