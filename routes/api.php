<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use Request;

Route:/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

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

<<<<<<< HEAD
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

Route::post('/add-products',function(Request $request){
     $products = App\Models\Product::create(
        [
                            'catagory_id' => $request->catagory_id,
                            'product_name' => $request->product_name,
                            'product_quantity' => $request->product_quantity,
                            'price' => $request->price,
                            'description' => $request->description,
                            'features' => $request->features,
                            'product_by_gender' => $request->product_by_gender,
                            'product_discount_percent' => $request->product_discount_percent,
               ]
          )->photos()->create([
                                'photo_name' => $request->photo_name,
                                'photo_path' => $request->photo_path,
                                'photo_url' => $request->photo_url,
                                'height' => $request->height,
                                'width' => $request->width
          ]);

          return $products;
});



=======
    //  return $order->order;
    $orders = \App\Models\orderProduct::with('products.photos','order')->get();
    return $orders;

    // $o = \App\Models\orderProduct::with('products.photos','order')->get();
    //   foreach($o->products as $product){
    //     echo $product->price;
    //     echo "<br/>";
    //   }
});
>>>>>>> 7bd4f1829d14f6a982b5ccef5aa25e75c15a50d0
