<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', function () {

    $products = App\Models\Product::with('photos')->get();


        foreach($products as $product){
            foreach($product->photos as $photo){
                echo $photo->photo_name;
                echo "<br/>";

            }
        }
});


Route::get('/catagories', function () {

    $catagory = App\Models\Catagory::find(3)->products()->get();

 foreach ($catagory as $product) {
    
 }
   $catagory = \App\Models\Catagory::all();
//    return $catagory;

  $p = App\Models\Product::with('catagory')->get();
  
  return $p;
//    return $catagory->products;
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


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
