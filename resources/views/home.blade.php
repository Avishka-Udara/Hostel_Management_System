@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
<!--notification icon---
<ul>
    //@foreach(auth()->user()->unreadNotifications as $notification)
        <li>
            <a href="{{ route('notifications.markAsRead', ['id' => $notification->id]) }}">
                Room ID: {{ $notification->data['room_id'] }} - Notification content
            </a>
        </li>
    //@endforeach
</ul>
--notification icon--->

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                    <div class="card-body">
                       Welcome User!!

                        @if($user->room_id)
                            <!--from the room_id retrieve Room_no-->
                            <p>You are enrolled in room {{ $user->room->Room_No }}.</p>
                        @else
                            <p>You are not enrolled in any room.</p>
                        @endif
                        
                    </div>

                    @if ($user->hostel_registration_year)
                    <p>You are already registered for the hostel for the year {{ $user->hostel_registration_year }}.</p>
                    @else
                        <p>You haven't registered for the hostel yet.</p>
                        <p><a href="{{ route('hostel-registration.create') }}">Register for Hostel</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
