@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Hostel Registration') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('hostel-registration.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="year">{{ __('Year') }}</label>
                                <input id="year" type="number" class="form-control @error('year') is-invalid @enderror" name="year" required autofocus>
                                @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="payment_receipt">{{ __('Payment Receipt') }}</label>
                                <input id="payment_receipt" type="file" class="form-control @error('payment_receipt') is-invalid @enderror" name="payment_receipt" required>
                                @error('payment_receipt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
