<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class HostelRegistrationController extends Controller
{
    public function create()
    {
        return view('hostel-registration.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'payment_receipt' => 'required|image',
            'year' => 'required|numeric',
        ]);

        // Retrieve the authenticated user
        $user = auth()->user();

        // Handle the uploaded payment receipt
        $paymentReceiptPath = $request->file('payment_receipt')->store('receipts', 'public');

        // Update the user's hostel registration details
        $user->hostel_registration_year = $request->input('year');
        $user->payment_receipt_path = $paymentReceiptPath;
        $user->save();

        //return to home with successfull notification
        return redirect()->route('home')->with('status', 'Hostel registration completed successfully! You will receive your room shortly.!');
        
    }
    //delete
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->hostel_registration_year = null;
        $user->payment_receipt_path = null;
        $user->save();
        return redirect()->route('home')->with('status', 'Hostel registration deleted successfully!');
    }
}
