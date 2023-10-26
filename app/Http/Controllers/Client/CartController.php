<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class CartController extends Controller
{

public function store(Request $request, $id){

  try {
     
     $product = Product::with('carts')->find($id);
     
    //  $carts = Cart::with('products')->where('user_id',Auth::user()->id)->get();
        
        if(!$product){
        return response()->json([
                 'message' => 'product not found'
        ],404);
        }
        if($request->quantity > $product->product_quantity){
           return response()->json([
                'message' => 'Product out of Stock, only ' . $product->product_quantity. ' avaliable'
           ],404);
           
        }
        
            $carts = $product->carts()->create([
                'user_id' => Auth::user()->id,
                'quantity' => $request->quantity,
         ]);
         if($carts){
           return response()->json([
                'message' => 'product added to the cart'
           ],201);
         }
    } catch (\Throwable $th) {
        return response()->json([

            "message"=>$th->getMessage()
            ]);
         }
     }
}
