<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ForgetPasswordController extends Controller
{
    //

    public function submitForgetPasswordForm(Request $request)
    {
        try{
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = mt_rand(0000,9999 );
        $HasOne=DB::table('password_resets')
        ->where([
          'email' => $request->email,
        ])->first();
if(!$HasOne){
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
          ]);
          $data = [
            "pin" => $token
        ];
        Mail::to($request->email)->send(new ResetPassword($data));


        return response()->json([
            'status' => 'ok'

    ]);
}
else{
    DB::table('password_resets')->where([
        'email'=> $request->email
        ])
        ->update([
            'token'=>$token
        ]);
        $data = [
            "pin" => $token
        ];
        Mail::to($request->email)->send(new ResetPassword($data));


        return response()->json([
            'status' => 'ok'

    ]);

}
}
catch(\Throwable $th){
    return response()->json([
        "status"=>true,
        "message"=>$th->getMessage()
    ],500);

}
    }
    public function pinVerify(Request $request){
        $uservalidator=Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'token' => 'required'
           ]);
           if($uservalidator->fails()){
            return response()->json([
                "status"=>false,
                "message"=>"valitor error",
                "error"=>$uservalidator->errors()
            ],404);
             }
             $updatePassword = DB::table('password_resets')
             ->where([
               'email' => $request->email,
               'token' => $request->token
             ])->first();

        if(!$updatePassword){
            return response()->json([
                'status' => 'error',
                'msg' => 'pin not exists'

            ],404);
        }
        return response()->json([
            "status"=>true,
            "message"=>"pin is correct",


        ],200);


    }

    public function submitResetPasswordForm(Request $request)
    {

        try{
       $uservalidator=Validator::make($request->all(), [
        'email' => 'required|email|exists:users',
        'password' => 'required|string|min:6|confirmed',
        'password_confirmation' => 'required'
       ]);
        if($uservalidator->fails()){
            return response()->json([
                "status"=>false,
                "message"=>"valitor error",
                "error"=>$uservalidator->errors()
            ],404);
        }

        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return response()->json([
            "status"=>true,
            "message"=>"change password success",
            $user

        ],200);

}
catch(\Throwable $th){
    return response()->json([
        "status"=>true,
        "message"=>$th->getMessage()
    ],500);

}
    }
}
