<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'Hello, World!']);
    }
    public function login(){
        return view('Auth.login');
    }
    public function registerTest(){
        return view('Auth.registerAPI');
    }
    public function register(){
        return view('Auth.register');
    }
    public function forgetPass(){
        return view('Auth.forget-pass');
    }

    public function store_user(Request $request)
    {
        // dd($request->all());
        // return false;
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Create the user with validated data
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);
    
        // return redirect()->back('')->with('success', 'Successfully created a new user');
        return redirect(url('/login'))->with('success', 'Successfully created a new user');
    
    }
    public function user_login(Request $request)
    {        

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
