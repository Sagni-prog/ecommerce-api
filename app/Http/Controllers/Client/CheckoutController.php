<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class CheckoutController extends Controller
{
     public function create(Request $request){
     
        $order = Order::create(
            [
                'user_id'=>$request->order['user_id'],
                'billing_firstname' => $request->order['billing_firstname'] ,
                'billing_lastname' => $request->order['billing_lastname'],
                'billing_email' => $request->order['billing_email'],
                'billing_country' => $request->order['billing_country'],
                'billing_city' => $request->order['billing_city'],
                'billing_address_line1' =>$request->order['billing_address_line1'],
                'billing_address_line2' => $request->order['billing_address_line2'],
                'billing_total' => $request->order['billing_total'],
                'billing_payment_gateway' =>  $request->order['billing_payment_gateway'],
                'billing_payment_status' => true,
                'billing_payment_shipment_status' => false,
                'billing_error' => 'err'
               ]
            );


    foreach($request->cart as $cart){

            $orderProduct = $order->orderProducts()->create([
                    'quantity' => $cart['product_quantity'],
                ]);
                
                $product = Product::find($cart['product_id']);
                $product->orderProducts()->attach($orderProduct);
         }
     }
}
