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
     //do something
    //   echo $product->catagory_name;
    //  echo $product->price;

    // //  echo $product->product->product_name;
    //  echo "<br/>";
 }
   $catagory = \App\Models\Catagory::all();
   return $catagory;

//    return $catagory->products;
});

Route::get('/order',function(){
    $orders=\App\Models\Order::all();
    return view('order',compact('orders'));
});


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
