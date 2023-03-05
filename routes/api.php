<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/products', function () {

    $products = App\Models\Product::with('photos','catagory')->get();

        return $products;


});


Route::get('/catagories', function () {


   $catagory = \App\Models\Catagory::with('products.photos')->get();

  
  return $catagory;
});

Route::get('/order',function(){

    $order = App\Models\Order::with('orderProducts.products.photos')->get();

    $orderproduct = App\Models\orderProduct::with('products.photos','order')->get();
    return $order;
});


