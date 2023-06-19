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
            $rooms = Room::orderBy('Room_No', 'desc')->get();
            $userCount = User::whereNotNull('room_id')->count();
            $regque = User::whereNull('room_id')->whereNotNull('hostel_registration_year')->where('is_permission', '0')->count();
            $filledRoomsCount = Room::whereRaw('no_of_bed = (SELECT COUNT(*) FROM users WHERE room_id = rooms.id)')->count();
            
            // Retrieve users who have registered for the any year and do not have a room assigned
            $users = User::whereNotNull('hostel_registration_year')//, date('Y') for currunt year
                        ->whereNull('room_id')
                        ->orderBy('name')
                        ->get();
            


            return view('admin.home', compact('rooms', 'users','userCount', 'regque','filledRoomsCount' ));
    
        } 
        elseif (Gate::allows('isManager')){
            // Retrieve rooms and users data
            $rooms = Room::orderBy('Room_No', 'desc')->get();
            $userCount = User::whereNotNull('room_id')->count();
            $regque = User::whereNull('room_id')->whereNotNull('hostel_registration_year')->where('is_permission', '0')->count();
            $filledRoomsCount = Room::whereRaw('no_of_bed = (SELECT COUNT(*) FROM users WHERE room_id = rooms.id)')->count();
            
            // Retrieve users who have registered for the any year and do not have a room assigned
            $users = User::whereNotNull('hostel_registration_year')//, date('Y') for currunt year
                        ->whereNull('room_id')
                        ->orderBy('name')
                        ->get();
            

            return view('subwarden.home', compact('rooms', 'users','userCount', 'regque','filledRoomsCount' ));
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
            // Retrieve users who have registered for the any year and do not have a room assigned
            $users = User::whereNotNull('hostel_registration_year')//, date('Y') for currunt year
                        ->whereNull('room_id')
                        ->orderBy('name')
                        ->get();

            return view('subwarden.registeredstudents', compact('users'));
        } elseif (Gate::allows('isUser')) {
            // Handle user logic here
        }
    }

}
