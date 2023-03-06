<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function login(Request $request){

        $request->validate([
              'email' => 'required',
              'password' => 'required'
        ]);

           if(!Auth::attempt($request->only('email','password'))){
              return response()->json([
                "message" => "anAuthorized"
              ],401);
           }

           $user = User::with('photos')->where('email',$request->email)->firstOrFail();

           $token = $user->createToken('auth_token')->plainTextToken;

           return response()->json([
                  "user" => $user,
                  "token" => $token
           ]);
    }
}
