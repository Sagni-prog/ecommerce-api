<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/products', function () {

    $products = App\Models\Product::with('photos','catagory')->get();


        foreach($products as $product){
            foreach($product->photos as $photo){
                // return $photo;
            }
        }

        return $products;


});


Route::get('/catagories', function () {


   $catagory = \App\Models\Catagory::with('products')->whereHas('products',function($q){
        $q->with('photos');
   })->get();

  
  return $catagory;
});

Route::get('/order',function(){
//    $order = App\Models\orderProduct::with('order')->get();
// $order = App\Models\Product::with('orderProduct')->get();


    //  return $order->order;

    $o = App\Models\orderProduct::with('products','order')->find(1);
      foreach($o->products as $product){
        echo $product->price;
        echo "<br/>";
      }
});


