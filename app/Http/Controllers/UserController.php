<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index()
    {
        // Check if the current user is authorized as an admin
        if (Gate::allows('isAdmin')) {
            // Retrieve all users from the database
            $users = User::all();
            // Pass the users data to the index view 
            return view('users.index', compact('users'));

        } else {
            // Redirect to a page or show an error message for unauthorized access
            return redirect()->back()->withErrors('You are not authorized to view user data.');
        }
    }
    //create
    public function create()
    {
        // Check if the current user is authorized as an admin
        if (Gate::allows('isAdmin')) {
            // Retrieve all users from the database
            $users = User::all();
            
            // Pass the users data to the index view
            return view('users.create', compact('users'));
        } else {
            // Redirect to a page or show an error message for unauthorized access
            return redirect()->back()->withErrors('You are not authorized to view user data.');
        }
    }

    //store
    public function store(Request $request)
    {
        // Check if the current user is authorized as an admin
        if (Gate::allows('isAdmin')) {
            // Validate the user data
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'is_permission' => 'required'
            ]);
            
            // Create a new user instance
            $user = new User();
            
            // Assign user data to the new instance
            $user->name = $request->name;
            $user->email = $request->email;
            $user->is_permission = $request->is_permission;
            
            // Hash the password and assign it to the new instance
            $user->password = bcrypt($request->password);
            
            // Save the user
            $user->save();
            
            // Redirect to the index page with a success message
            return redirect()->route('users.index')->with('success', 'User created successfully.');
        } else {
            // Redirect to a page or show an error message for unauthorized access
            return redirect()->back()->withErrors('You are not authorized to create a new user.');
        }
    }

    public function edit($id)
    {
        // Check if the current user is authorized as an admin
        if (Gate::allows('isAdmin')) {
            // Retrieve the user by ID
            $user = User::findOrFail($id);
            
            // Pass the user data to the edit view
            return view('users.edit', compact('user'));
        } else {
            // Redirect to a page or show an error message for unauthorized access
            return redirect()->back()->withErrors('You are not authorized to edit user data.');
        }
    }

    public function update(Request $request, $id)
    {
        // Check if the current user is authorized as an admin
        if (Gate::allows('isAdmin')) {
            // Retrieve the user by ID
            $user = User::findOrFail($id);
            
            // Validate the incoming request data
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'is_permission' => 'required'
            ]);
            
            // Update the user record
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->is_permission = $request->is_permission;
            $user->save();
            
            // Redirect back to the index page with a success message
            return redirect()->route('users.index')->with('success', 'User updated successfully.');
        } else {
            // Redirect to a page or show an error message for unauthorized access
            return redirect()->back()->withErrors('You are not authorized to update user data.');
        }
    }
    //show
    public function show($id)
    {
        // Check if the current user is authorized as an admin
        if (Gate::allows('isAdmin')) {
            // Retrieve the user by ID
            $user = User::findOrFail($id);
            
            // Pass the user data to the edit view
            return view('users.show', compact('user'));
        } else {
            // Redirect to a page or show an error message for unauthorized access
            return redirect()->back()->withErrors('You are not authorized to view user data.');
        }
    }
    //delete
    public function destroy($id)
    {
        // Check if the current user is authorized as an admin
        if (Gate::allows('isAdmin')) {
            // Retrieve the user by ID
            $user = User::findOrFail($id);
            
            // Delete the user
            $user->delete();
            
            // Redirect to the index page with a success message
            return redirect()->route('users.index')->with('success', 'User deleted successfully.');
        } else {
            // Redirect to a page or show an error message for unauthorized access
            return redirect()->back()->withErrors('You are not authorized to delete user data.');
        }
    }
}
