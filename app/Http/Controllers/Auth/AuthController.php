<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
// use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{
    // use HasApiTokens, HasFactory,Notifiable;

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

    public function login(Request $request){

        $request->validate([
              'email' => 'required',
              'password' => 'required'
        ]);




        $user = User::where('email',$request->email)->with('photos')->first();

        if(!Hash::check($request->password, $user->password)){
            return response()->json([
                "message" => "Wrong credentials"
            ]);
         }


         $token = $user->createToken('user_token')->plainTextToken;
         return response()->json([
             "token" => $token,
             "user" => $user
         ]);

    }

    public function updateProfile(Request $request){

        $user = Auth::user()->first();

          $isUpdated =  Auth::user()->update([
                "name" => $request->name,
                "email" => $request->email
            ]);

            if($request->hasFile('photo')){

                $ext = $request->file('photo')->extension();

                $image_name = 'image';


                $filename = 'image-' . time() . '.' . $ext;

             $path = $request->file('photo')->storeAs('profile-photo', $filename);
             $image_url = Storage::url($path);

             $data = $this->getDimension($path);
             $width = $data['width'];
             $height = $data['height'];


          $user->photo()->update([
                "photo_name" => $filename,
                "photo_path" => $path,
                "photo_url" => $image_url,
                "photo_width" => $width,
                "photo_height" => $height
            ]);

       }

            return $user->with('photos')->first();
     }


     public function getAll(){
        $users = User::all();

        return response()->json([
            "user" => $users
        ]);
    }

    public function sendMail(){

        $data = [
            "pin" => 123
        ];
        Mail::to("natnaeln4d@gmail.com")->send(new ResetPassword($data));
    }
}





