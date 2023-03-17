<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        try {
             $orders = Order::with('orderProducts.products','user')->get();
             
             return response()->json([
                "status" => "success",
                "data" => $orders
             ],200);
        } catch (\Throwable $th) {
          
        }
    }
    
    public function getOrder($id){
    
    try {
        $order = Order::with('orderProducts.products','user')
                      ->where('id',$id)
                      ->orderBy('created_at','desc')
                      ->get();
        
        return response()->json([
                "status" => "success",
                "data" => $order
        ]);
      } catch (\Throwable $th) {
          
        }  
    } 
    
    public function edit($id){
        $order = Order::with('orderProducts.products','user')
                       ->where('id',$id)    
                       ->get();
                       
          if(!$order->billing_payment_status)  {
          }           
                
       $isUpdated = $order->update(['billing_payment_shipment_status' => true]);
       if($isUpdated){
          return response()->json([
              "status" => "seccess",
              "message" => "You have successfully updated"
          ]);
       }
    }
}

