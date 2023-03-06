<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;



Route::post('login',[AuthController::class,'login']);
<<<<<<< HEAD
Route::post('/register',[\App\Http\Controllers\Auth\AuthController::class,'register']);

=======
>>>>>>> 22436fe491606d585c2386f3fab1969cd7a1cfd2

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();


// });

Route::middleware(['auth:sanctum'])->group(function () {

});

