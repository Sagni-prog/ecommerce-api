<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\VerifyUserController;
use App\Http\Controllers\Admin\ProductController;

// Route::get('/send',[AuthController::class,'sendMail']);

Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/forgot-password',[ForgetPasswordController::class, 'submitForgetPasswordForm']);
Route::post('/reset-password',[ForgetPasswordController::class, 'submitResetPasswordForm']);
Route::post('/pinverify',[ForgetPasswordController::class, 'pinVerify']);

Route::post('/verify-email',[VerifyUserController::class,'verifyUser']);
Route::get('/resend',[VerifyUserController::class,'resendToken']);

Route::get('/users',[AuthController::class,'getAll']);

Route::post('/add-products',[ProductController::class,'store']);
Route::post('/edit-products',[ProductController::class,'edit']);


Route::get('/allproduct',[ProductController::class,'index']);
Route::post('/getByName',[ProductController::class,'getbyname']);
Route::post('/getByCatagory',[ProductController::class,'getbycatagory']);
Route::delete('/deleteproduct/{id}',[ProductController::class,'destoryproduct']);






Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/update-profile',[AuthController::class,'updateProfile']);
});

