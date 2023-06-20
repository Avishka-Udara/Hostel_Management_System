@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 p-5">
                <div class="container align-items-center" >
                    <h2>Welcome to</h2>
                    <H2 class="display-5 d-flex justify-content-center">
                        HOSTEL MANAGEMENT SYSTEM
                    </H2>
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

                        {{ __('You are logged in to the system!') }}
                    </div>
                    <div class="card-body">
                       

                        
                    </div>

                    @if ($user->hostel_registration_year)
                        @if ($user->room_id)
                            <div class="card p-2 mt-5">
                                <div class="card-body ">
                                    <h5 class="card-title">You are already registered for the hostel for the year {{ $user->hostel_registration_year }}.</h5>
                                    <h5 class="card-title">You are Assign to the room No : {{ $user->room->Room_No }}.</h5>
                                </div>
                            </div>
                        @else
                            <div class="card p-2 mt-5">
                                <div class="card-body ">
                                    <h5 class="card-title">You are already registered for the hostel for the year {{ $user->hostel_registration_year }}.</h5>
                                    <h5 class="card-title">Enrollment for the room is proccesign. soon you will Assign to the room.</h5>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="card p-2 mt-5">
                            <div class="card-body ">
                                <h5 class="card-title">You haven't registered for the hostel yet</h5>
                                <a href="{{ route('hostel-registration.create') }}" class="btn btn-outline-primary col-md-12 mt-2">Register for Hostel</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
