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



    $orderproduct = App\Models\orderProduct::with('products.photos','order.user')->get();
    return $orderproduct;
});


Route::post('/place-order',function(Request $request){
      $order = App\Models\Order::create(
                        [
                            'user_id'=>$request->user_id,
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



                $carts = App\Models\Cart::with('products')->where('user_id',$request->user_id)->get();

                //   return $carts;

                        // foreach($carts as $cart){
                        //     $order->orderProducts()->create([
                        //             'quantity' => $request->quantity,
                        //             'product_id' => $cart->products->id
                        //         ]);
                        // }


                foreach($carts as $cart){

                        $orderProduct = $order->orderProducts()->create([
                                'quantity' => $cart->quantity,
                            ]);
                           foreach($cart->products as $product){
                                $product->orderProducts()->attach($orderProduct);
                           }
                }



});
Route::get('/signleorder',function(){
    $userorder=\App\Models\Order::find(2)->with('orderproducts.products.photos','user.photo')->get();
    // $userorder = App\Models\Order::all();


                    return $userorder;

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



Route::get('/order',function(){
    $orders = \App\Models\orderProduct::with('products.photos','order.user')->get();
    return $orders;
});
    //  return $order->order;





Route::get('userorder',function(){
    $u=\App\Models\Order::with('user')->get();
   return $u;
});
Route::post('userorder',function(Request $request){
    try{
        //  $product=\App\Models\Product::find($request->order_id)->get();
        //  if(!$product){
        //     return response()->json([
        //     'msg'=>"no product"
        //     ],404);
        //  }

       $product=App\Models\Product::find($request->product_id)->orderproducts()->create(
       $request->all()
        );
        $orderproduct=App\Models\orderProduct::find($request->order_id)->order()->create($request->all())->user()->find($request->user_id);
        $order=App\Models\Order::find($request->order_id);
        $pr=App\Models\Product::find($request->product_id);
        return response()->json([
            $product,
            $orderproduct,
            $order,
            $pr
        ]);

        // ],200);
    }catch(\Exception $e){
        return response()->json([
            'msg'=> $e->getMessage()
        ]);
        }

});

Route::post('cart',function(Request $request){
    //   $cart = App\Models\Cart::create($request->all());

    // $cart;

    $cart = App\Models\Product::find(2)->carts()->create(
        $request->all()
    );

    return $cart;

});
Route::get('carts',function(Request $request){
      $cart = App\Models\Cart::with('products')->get();

   return $cart->products;

});

Route::get('order-product',function(){
   $orderProduct = App\Models\orderProduct::with('products')->find(10);

   return $orderProduct->products;
});

Route::post('create-user',function(Request $request){
    $user = App\Models\User::create([
                                        'name' => $request->name,
                                        'email' => $request->email,
                                        'password' => $request->password,
                                        'phone_number' => $request->phone_number,
    ])->photos()->create([
                            'photo_name' => $request->photo_name,
                            'photo_path' => $request->photo_path,
                            'photo_url' => $request->photo_url,
                            'height' => $request->height,
                            'width' => $request->width
    ]);

       return $user;
});

