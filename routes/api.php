<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::get('/send',[AuthController::class,'sendMail']);

Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);



Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/users',[AuthController::class,'getAll']);
    Route::post('/update-profile',[AuthController::class,'updateProfile']);
});

