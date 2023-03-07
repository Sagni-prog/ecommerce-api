<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use App\Mail\VerificationMail;
use Cookie;
use Crypt;
use Illuminate\Support\Carbon;


class VerifyUserController extends Controller
{

    public function verifyUser(Request $request){


        try {
             $email = Crypt::decrypt($request->Cookie('user'));

             $user = User::where('email',$email)->first();

            if($user->token_expires_at){
               return response()->json([
                'message' => "Token expired"
               ]);
            }else{
                $token_created_at = $user->token_created_at;

                $now = Carbon::now();
                $diff = $now->diffInMinutes($token_created_at);
   
              if($diff > 5){
                  $user->update([
                    'token_expires_at' => Carbon::now()
                  ]);
              }else{
                    if($user->verification_token == $request->verification_token){
                        $user->update([
                            'isActive' => true,
                            'verification_token' => null,
                            'token_expires_at' => Carbon::now()
                        ]);
                    }else{
                       return response()->json([
                        'message' => 'Invalid Token'
                       ]);
                    }
                }
            }

           
        } catch (\Throwable $th) {
          return response()->json("invalid", 200);
        }

    }

    public function resendToken(){

        try {
            $email = Crypt::decrypt($request->Cookie('user'));

            if(!Mail::to($email)->send(new VerificationMail($data))){
                    
                              
                return response()->json([
                    'message' =>'not sent'
                ]);

              }


              $user = User::where('email',$email)->first();

              if($user->token_expires_at){
                  $user->update([
                    'token_expires_at' => null
                  ]);

                  return response()->json([
                    "message" => "resent"
                 ]);
              }
              return response()->json([
                      "message" => "resent"
              ]);
        } catch (\Throwable $th) {
            
      }
    }
  
}
