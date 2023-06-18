<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
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
        if (Gate::allows('isAdmin')) {

            return view('admin.home');
    
        } 
        elseif (Gate::allows('isManager')){
            // Fetch rooms and users data
            $rooms = Room::orderBy('Room_No', 'desc')->get();
            $users = User::orderBy('name')->get();

            return view('subwarden.home', compact('rooms', 'users'));
            //return view('subwarden.home');
    
        }
        elseif (Gate::allows('isUser')){
    
            return view('home');
    
        }
        
    }
}
