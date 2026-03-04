@extends('layouts.app')

@section('title', 'All Users')

@section('content')
    <h1>All Users</h1>

    @forelse($users as $user)
        <div class="card">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h2 style="margin-bottom: 5px;">
                        <a href="{{ route('users.show', $user) }}" style="color: #333; text-decoration: none;">
                            {{ $user->name }}
                        </a>
                    </h2>
                    <p class="text-muted">{{ $user->email }}</p>
                </div>
                <a href="{{ route('users.show', $user) }}" class="btn btn-secondary">View Profile</a>
            </div>
            <p class="text-muted" style="margin-top: 10px; font-size: 12px;">
                Joined: {{ $user->created_at->format('M d, Y') }}
            </p>
        </div>
    @empty
        <div class="card">
            <p>No users found.</p>
        </div>
    @endforelse
@endsection