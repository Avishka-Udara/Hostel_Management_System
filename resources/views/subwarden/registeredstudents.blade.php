@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Registered Students') }}</div>
                    <div class="card-body">
                    <div class="px-5 mx-3 text-center">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Reg Year</th>
                                    <th>Registration Receipt</th>
                                    <th>Delete Record</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->hostel_registration_year }}</td>
                                        <td>
                                            @if ($user->payment_receipt_path)
                                                <!--<a href="{{ asset($user->payment_receipt_path) }}" target="_blank" class="btn btn-primary">View</a>-->
                                                <a href="{{ asset('storage/' . $user->payment_receipt_path) }}" target="_blank" class="btn btn-outline-primary">View File</a>
                                            @else
                                                No receipt available
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('hostel-registration.destroy', $user->id) }}" method="POST" class="col-md-5">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
