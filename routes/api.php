<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\VerifyUserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Admin\OrderController;

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


Route::post('/checkout',[CheckoutController::class,'create']);

Route::post('/blogpost',[BlogController::class,'store']);
Route::get('/blogs',[BlogController::class,'index']);
Route::post('/blogs/{id}',[BlogController::class,'edit']);
Route::delete('/blogs/{id}',[BlogController::class,'destorypost']);Route::get('/orders',[OrderController::class,'index']);
Route::get('/order/{id}',[OrderController::class,'getOrder']);
Route::patch('/order/{id}',[OrderController::class,'edit']);


Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/update-profile',[AuthController::class,'updateProfile']);
    Route::post('/carts/product/{id}',[CartController::class,'store']);
});

