@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('ROOMS MANAGEMENT') }}</div>

                        <div class="container mt-2">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <!--<h2>ROOMS</h2>-->
                                    </div>
                                    <div class="pull-right mb-2">
                                        <a class="btn btn-outline-primary m-4 col-sm-11" href="{{ route('users.create') }}"> ADD NEW USER </a>
                                    </div>
                                </div>
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <div class="col-md-11 px-5 mx-3 text-center">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Room No</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>
                                                    @if($user->is_permission == 0)
                                                        {{ $user->room->Room_No ?? '' }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if($user->is_permission == 0)
                                                        User
                                                    @elseif($user->is_permission == 1)
                                                        Subwarden
                                                    @elseif($user->is_permission == 2)
                                                        Admin
                                                    @endif
                                                </td>

                                                <td>
                                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                                </td>
                                                <!--show button-->
                                                <td>
                                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">Show</a>
                                                </td>
                                                <!--delete button-->
                                                <td>
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger">Delete</button>
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
        </div>
    </div>
@endsection