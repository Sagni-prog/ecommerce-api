<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{
    use HasApiTokens, HasFactory,Notifiable;

    public function register(Request $request){
        try{
            $uservalidator=Validator::make($request->all(),[
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required'],
            ]);
            if($uservalidator->fails()){
                return response()->json([
                    "status"=>false,
                    "message"=>"valitor error",
                    "error"=>$uservalidator->errors()
                ],401);
            }
            $user=User::create(
                [
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password)
                ]
                );
            return response()->json([
                "status"=>true,
                "message"=>"user created succesfully",
                "token"=>$user->createtoken("user_token")->plainTextToken
            ] ,200);
        }
        catch(\Throwable $th){
            return response()->json([
                "status"=>true,
                "message"=>$th->getMessage()
            ],500);

        }
    }

    protected function login(Request $request){

    }
}
