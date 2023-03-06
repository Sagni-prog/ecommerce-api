<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use Request;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

