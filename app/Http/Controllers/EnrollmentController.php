<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function enrollUser(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Retrieve the room
        $room = Room::findOrFail($request->input('room_id'));

        // Retrieve the user
        $user = User::findOrFail($request->input('user_id'));

        // Assign the room to the user
        $user->room_id = $room->id;
        $user->save();

        // Redirect or display a success message
        return redirect()->back()->with('success', 'User enrolled in the room successfully.');
    }
}
