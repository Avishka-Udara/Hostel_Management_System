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
                                        <a class="btn btn-outline-primary m-4 col-sm-11" href="{{ route('rooms.create') }}"> ADD NEW ROOM </a>
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
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Room No</th>
                                            <th>no of bed </th>
                                            <th width="280px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rooms as $room)
                                            <tr>
                                                <td>{{ $room->Room_No }}</td>
                                                <td>{{ $room->no_of_bed }}</td>
                                                <td>
                                                    <form action="{{ route('rooms.destroy',$room->id) }}" method="Post">
                                                        <a class="btn btn-outline-primary col-md-5" href="{{ route('rooms.edit',$room->id) }}">Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger col-md-5">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                                {!! $rooms->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection