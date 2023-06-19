@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $user->name }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                <p class="card-text"><strong>Role:</strong> 
                        @if($user->is_permission == 0)
                            User
                        @elseif($user->is_permission == 1)
                            Subwarden
                        @elseif($user->is_permission == 2)
                            Admin
                        @endif
                </p>
                <p class="card-text"><strong>Created At:</strong> {{ $user->created_at }}</p>
                <p class="card-text"><strong>Updated At:</strong> {{ $user->updated_at }}</p>
            </div>
        </div>

        <a href="{{ route('users.index') }}" class="btn btn-primary mt-3">Back</a>
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary mt-3">Edit</a>
    </div>
@endsection
