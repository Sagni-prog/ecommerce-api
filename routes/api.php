<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use Request;

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

    $orderproduct = App\Models\orderProduct::with('products.photos','order.user')->get();
    return $order;
});


Route::post('/place-order',function(Request $request){
      $order = App\Models\Order::create(
                        [
                            'user_id' => $request->user_id,
                            'billing_firstname' => $request->billing_firstname ,
                            'billing_lastname' => $request->billing_lastname,
                            'billing_email' => $request->billing_email,
                            'billing_country' => $request->billing_country,
                            'billing_city' => $request->billing_city,
                            'billing_address_line1' =>$request->billing_address_line1,
                            'billing_address_line2' => $request->billing_address_line2,
                            'billing_total' => $request->billing_total,
                            'billing_payment_gateway' =>  $request->billing_payment_gateway,
                            'billing_payment_status' => $request->billing_payment_status,
                            'billing_payment_shipment_status' => $request->billing_payment_shipment_status,
                            'billing_error' => $request->billing_error,
                         ]
                        );

                 for($i = 0; $i < 3; $i++){
                        $order->orderProducts()->create([
                            'quantity' => $request->quantity,
                            'product_id' => $request->product_id
                        ]);
                    }
                        // return $order->with('orderProduct')->first();


});



