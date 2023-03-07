<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/send',[AuthController::class,'sendMail']);

Route::get('/', function () {
   
    $carts = App\Models\Cart::with('products')->where('user_id',1)->get();

    foreach($carts as $cart){

        echo $cart->quantity;
        echo "<br/>";
        // foreach($cart->products as $product){
        //     echo $product->product_name;
        //     echo "<br/>";
        // }
    }
    // return $carts;
});


