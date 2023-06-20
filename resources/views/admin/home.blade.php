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
       
                </div>
            </div>
        </div>
    </div>
@endsection
