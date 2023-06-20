@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
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

                    <div class="row">
                        <div class="col-sm-4 p-5">
                          <div class="card text-center">
                            <div class="card-body">
                                <p class="btn btn-primary">{{ $userCount }}</p>
                                <h5 class="card-title">STUDENTS THAT ENROLED</h5>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-4 p-5">
                          <div class="card text-center">
                            <div class="card-body">
                                <p class="btn btn-primary">{{ $filledRoomsCount }}</p>
                                <h5 class="card-title">ROOMS THAT FILLED</h5>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-4 p-5">
                            <div class="card text-center">
                              <div class="card-body">
                                <p class="btn btn-primary">{{ $regque }}</p>
                                <h5 class="card-title">REGISTRATION REQUEST</h5>
                              </div>
                            </div>
                          </div>
                    </div>

                    <div class="card-body text-center">
                        <div class="p-5">
                            <div class="card ">
                              <div class="card-body px-5">
                                <p class="fs-2"> ENROLL NEW STUDENT TO ROOM </p>
                                

                                <!-- Display the form to enroll a user in a room -->
                                <form action="{{ route('enroll.user') }}" method="POST" class="mx-5 px-5">
                                    @csrf

                                    <label for="room_id" class="m-3">Select Room:</label>
                                    <select name="room_id" id="room_id" class="form-select ">
                                        @foreach ($rooms as $room)
                                            @php
                                                $availableBeds = $room->no_of_bed - $room->users->count();
                                            @endphp
                                            @if ($availableBeds > 0)
                                                <option value="{{ $room->id }}">{{ $room->Room_No }}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    <label for="user_id" class="m-3">Select User:</label>
                                    <select name="user_id" id="user_id" class="form-select">
                                        @foreach ($users as $user)
                                            @if ($user->room_id === null)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    <button type="submit" class="btn btn-outline-primary m-3 col-sm-10">Enroll User</button>
                                </form>
                              </div>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
        </div>
    </div>
@endsection
