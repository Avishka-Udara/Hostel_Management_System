<?php

namespace App\Http\Controllers;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    
        public function index()
        {
            $rooms = Room::orderBy('Room_No','desc')->paginate(5);
            return view('rooms.index', compact('rooms'));
        }
    
        
        public function create()
        {
            return view('rooms.create');
        }
    
        
        public function store(Request $request)
        {
            $request->validate([
                'Room_No' => 'required',
                'no_of_bed' => 'required',
            ]);
            
            Room::create($request->post());
    
            return redirect()->route('rooms.index')->with('success','Room has been created successfully.');
        }
   
        
        public function show(Room $room)
        {
            return view('rooms.show',compact('room'));
        }
    
        
        public function edit($id)
        {
            $room = Room::findOrFail($id);
            return view('rooms.edit',compact('room'));
        }
    
        
        public function update(Request $request, Room $room)
        {
            $request->validate([
                'Room_No' => 'required',
                'no_of_bed' => 'required',
            ]);
            
            $room->fill($request->post())->save();
    
            return redirect()->route('rooms.index')->with('success','Room Has Been updated successfully');
        }
    
        
        public function destroy(Room $room)
        {
            $room->delete();
            return redirect()->route('rooms.index')->with('success','Room has been deleted successfully');
        }
    }