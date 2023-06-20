<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Room;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function user()
    {
        $userCount = User::whereNotNull('room_id')->count();
        $regque = User::whereNull('room_id')->whereNotNull('hostel_registration_year')->where('is_permission', '0')->count();
        $users = User::where('is_permission', 0)->count();
        $Room_count = Room::count();
        $filledRoomsCount = Room::whereRaw('no_of_bed = (SELECT COUNT(*) FROM users WHERE room_id = rooms.id)')->count();


        return view('welcome', compact('userCount', 'users', 'regque', 'Room_count', 'filledRoomsCount'));
    }
}
