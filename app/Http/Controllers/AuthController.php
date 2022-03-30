<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Auth;

class AuthController extends Controller
{
    public function login(Request $request){
       
        $request->validate([
            'phone_number' => ['required'],
            'password' => ['required'],
        ]);
        
        $user = User::where('phone_number',$request->phone_number)->first();

        if (!$user || !Hash::check($request->password,$user->password)) {
            return response([
                'error' => 'The provided credentials do not match our records.',
            ]);
        }

        $token = $user->createToken('token')->plainTextToken;
        return response(['token'=>$token]);        

    }

    public function logout(Request $request){
        Auth::user()->tokens()->delete();
        return [
            'message' => 'Logged out',
        ];
    }
}
