<?php

namespace App\Http\Controllers\Mobile;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class authController extends Controller
{
    public function register(request $request)
    {

        
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        return response()->json([
            'status' => 201,
            'message' => 'User registered successfully'
        ]);
    }

    public function user_login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        // dd($user);
        if( $user != [] && Hash::check($request->password, $user->password)){
            $token = $user->createToken('')->plainTextToken;
            return response()->json([
                'status' => 200,
                'token' => $token,
                'user' => $user,
                'message' => "Login successfully",
            ]);
            // dd($token);
        }else{
            return response()->json([
                'status' => 402,
                'error' => "Creadentials dosen't match",
            ]);
        }
    }
}
