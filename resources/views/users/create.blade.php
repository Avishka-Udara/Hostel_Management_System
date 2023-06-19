@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('ROOMS MANAGEMENT') }}</div>

                        <div class="container col-md-10 p-2">
                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="name" class="mx-2">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="mx-2">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="mx-2">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="role" class="mx-2">Role</label>
                                    <select name="is_permission" id="is_permission" class="form-control" required>
                                        <option value="2">Admin</option>
                                        <option value="1">Sub-warden</option>
                                        <option value="0">User</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-outline-primary col-md-12 my-3">Create User</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection