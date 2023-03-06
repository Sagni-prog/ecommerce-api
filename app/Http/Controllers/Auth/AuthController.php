<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
<<<<<<< HEAD
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

=======
use App\Models\User;

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
>>>>>>> 177946548d6bd6b76e2e82604d79851ac88d77af
    }
}
