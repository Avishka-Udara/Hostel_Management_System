@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                    <div class="card-body">
                        <div class="btn btn-success btn-lg">

                            Welcome SubWarden!!!

                            <!-- Display the form to enroll a user in a room -->
                            <form action="{{ route('enroll.user') }}" method="POST">
                                @csrf

                                <label for="room_id">Select Room:</label>
                                <select name="room_id" id="room_id">
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->Room_No }}</option>
                                    @endforeach
                                </select>

                                <label for="user_id">Select User:</label>
                                <select name="user_id" id="user_id">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>

                                <button type="submit">Enroll User</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
