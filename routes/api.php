<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;



Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[\App\Http\Controllers\Auth\AuthController::class,'register']);


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();


// });

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/users',[AuthController::class,'getAll']);
    Route::post('update-profile',[AuthController::class,'updateProfile']);
});

