<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
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


        foreach($products as $product){
            foreach($product->photos as $photo){
                // return $photo;
            }
        }

        return $products;


});


Route::get('/catagories', function () {


   $catagory = \App\Models\Catagory::with('products.photos')->get();


  return $catagory;
});

Route::get('/order',function(){
//    $order = App\Models\orderProduct::with('order')->get();
// $order = App\Models\Product::with('orderProduct')->get();


    //  return $order->order;
       $orders = \App\Models\orderProduct::with('products.photos','order')->get();
    return $orders;

    // $o = \App\Models\orderProduct::with('products.photos','order')->get();
    //   foreach($o->products as $product){
    //     echo $product->price;
    //     echo "<br/>";
    //   }
});
Route::get('userorder',function(){
    $u=\App\Models\Order::with('user')->get();
   return $u;
});
Route::post('userorder',function(Request $request){
    try{
        $order=\App\Models\Order::create($request->all());
        return response()->json([
         'data'=>$order
        ],200);
    }catch(\Exception $e){
        return response()->json([
            'msg'=> $e->getMessage()
        ]);
        }

});
