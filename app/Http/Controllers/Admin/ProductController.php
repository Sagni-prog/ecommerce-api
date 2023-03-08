<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // get all product from the database
    public function index()
    {
        try{

            $product=\App\Models\Product::with('photos')->orderBy('created_at', 'desc')->paginate(3);
            if(!$product){
                return response()->json([
                    'status'=>'fail',
                    'msg'=>'no record'
                
                ],500);

            }
            return response()->json([
                'status'=>'success',
                'data'=>$product
            
            ],200);


        }catch(\Exception $E){
            return response()->json([
                'status'=>'fail',
                'msg'=>$E->getMessage()
            ]);
        }
    }
    // get product by name
    public function getbyname(Request $request)
    {
    
        try{
            $para=Validator::make($request->all(),[
                'product_name'=>['required', 'string']
            ]);
        
            if(!$para){
                $products=\App\Models\Product::with('photos')->orderBy('created_at', 'desc')->paginate(3);
                return response()->json([
                    'status'=>true,
                    'data'=>$products
                ],200);
            }
            else{
                $product=\App\Models\Product::where(['product_name'=>$request->product_name])->with('photos')->first();
                if(!$product){
                    return response()->json([
                        'status'=>false,
                        'data'=>"no record"
                    ],404);

                }

                return response()->json([
                    'status'=>true,
                    'data'=>$product
                   
                
                ],200);
            }

       


        }catch(\Exception $E){
            return response()->json([
                'statua'=>'fail',
                'msg'=>$E->getMessage()
            ]);
        }
    }
    //get product by catagory
    public function getbycatagory(Request $request)
    {
    
        try{
            $para=Validator::make($request->all(),[
                'catagory_name'=>['required', 'string']
            ]);
            
        
                $catagory=\App\Models\Catagory::where(['catagory_name'=>$request->catagory_name])->with('products.photos')->orderBy('created_at', 'desc')->paginate(3);
                return $catagory;
                // if(!$catagory){
                //     return response()->json([
                //         'status'=>false,
                //         'data'=>"no record"
                //     ],404);

                // }

                // return response()->json([
                //     'status'=>true,
                //     'data'=>$catagory
                   
                
                // ],200);
            

       


        }catch(\Exception $E){
            return response()->json([
                'status'=>'fail',
                'msg'=>$E->getMessage()
            ]);
        }
    }

}
