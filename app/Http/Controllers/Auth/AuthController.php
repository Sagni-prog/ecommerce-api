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
// use Illuminate\Support\Carbon;
use Illuminate\Support\Carbon;
use App\Mail\VerificationMail;
use Session;
use Crypt;
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

            $verification_token = random_int(0000,9999);
            if($uservalidator->fails()){
                return response()->json([
                    "status"=>false,
                    "message"=>"valitor error",
                    "error"=>$uservalidator->errors()
                ],404);
            }
            $user=User::create(
                [
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password),
                    'verification_token' => $verification_token,
                    'token_created_at' =>  Carbon::now()
            
                ]
                );

                if($user){


                    $data = [
                        'verification_token' => $verification_token
                    ];
                   if(!Mail::to($request->email)->send(new VerificationMail($data))){
                    
                              
                            return response()->json([
                                'message' =>'not sent'
                            ]);


                          }else{
                           
                            $minutes = 60;

                         $enc_value = Crypt::encrypt($user->email);


                           return response()->json([
                            'message' => 'sent'
                          ],200)->withCookie(cookie('user',$enc_value , $minutes));
                          }
                }
                else{
                
                }

              
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
try{
        $user = Auth::user();

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

            return $user;
    }catch(\Exception $e){
        return response()->json([
            'msg' => $e->getMessage()
        ]);
    }
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
        Mail::to("sagnialemayehu69@gmail.com")->send(new ResetPassword($data));
    }

    public function testSessin(){
        $minutes = 60;

        
        $enc_value = Crypt::encrypt("hello thi is me");
        return response()->json([
            "name" => "mike"
        ])->withCookie(cookie('test-cookie', $enc_value, $minutes));
        // return $response;
    }
}





