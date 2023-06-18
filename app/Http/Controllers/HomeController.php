<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user = Auth::user();
        
        if (Gate::allows('isAdmin')) {

            return view('admin.home');
    
        } 
        elseif (Gate::allows('isManager')){
            // Retrieve rooms and users data
            $rooms = Room::orderBy('Room_No', 'desc')->get();
            
            // Retrieve users who have registered for the current year and do not have a room assigned
            $users = User::where('hostel_registration_year', date('Y'))
                        ->whereNull('room_id')
                        ->orderBy('name')
                        ->get();

            return view('subwarden.home', compact('rooms', 'users'));
        }
        elseif (Gate::allows('isUser')){
    
            return view('home', compact('user'));
    
        }
        
    }

    //public function markNotificationAsRead($id)
    //{
    //    $notification = Auth::user()->notifications()->findOrFail($id);
    //    $notification->markAsRead();
    //
    //    return redirect()->back();
    //}

    public function show()
    {
        if (Gate::allows('isAdmin')) {
        } elseif (Gate::allows('isManager')) {
            $users = User::where('hostel_registration_year', date('Y'))
                ->whereNull('room_id')
                ->orderBy('name')
                ->get();

            return view('subwarden.registeredstudents', compact('users'));
        } elseif (Gate::allows('isUser')) {
            // Handle user logic here
        }
    }

}
