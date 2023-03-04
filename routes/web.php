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
   $products = \App\Models\Product::where('product_by_gender','male')->get();

//    foreach($products->features  as $key => $value){
//     return $key. " : ".$value;
//    }

   return $products;
});

Route::get('/catagories', function () {

    $catagory = App\Models\Catagory::find(3)->products()->get();

 foreach ($catagory as $product) {
     //do something

     echo $product->product_name;
     echo "<br/>";
 }
//    $catagory = \App\Models\Catagory::all();


//    return $catagory->products;
});



// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
