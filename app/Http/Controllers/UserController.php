<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view("welcome", compact('user'));
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out
        return redirect('/'); // Redirect to the desired route
    }
    public function user_profile(Request $request)
    {
        $user = Auth::user();
        
        $orders = Order::where('user_id', $user->id)->orderby('id', 'desc')->paginate(10);
        return view('user.profile', compact('user','orders'));
    }

    public function getCartCount()
    {
        $cartCount = session()->has('cart') ? count(session('cart')) : 0;
        return response()->json(['count' => $cartCount]);
    }    

    public function user_addresses(Request $request)
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->orderby('id', 'desc')->paginate(10);
        return view('user.address', compact('user','orders'));
    }
    public function update_user(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'mobile'            => [
                'required',
                'string',
                'regex:/^01\d{9}$/',  // Regex to ensure the number starts with '01' and has exactly 11 digits
                'max:11',              // Enforces that the number should be at most 11 characters
            ],
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'address_line' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'required|integer', // Assuming country is stored as an ID
            'postal_code' => 'nullable|string|max:20',
        ]);
    
        // Get the authenticated user
        $users = Auth::user();
        $user = User::where('id', $users->id)->first();
    
        // Check if user is valid
        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'User not found']);
        }
    
        // Format the data to be updated
        $updatedData = [
            'mobile' => $request->input('mobile'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'address' => $request->input('address'),
            'address_line' => $request->input('address_line'),
            'city' => $request->input('city'),
            'country' => $request->input('country'),
            'postal_code' => $request->input('postal_code'),
        ];
    
        // Update the user's data
        $user->update($updatedData);  

        return redirect()->back()->with('message', 'Profile updated successfully');
    }
    
}
