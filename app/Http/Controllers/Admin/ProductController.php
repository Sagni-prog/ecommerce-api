<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function create(Request $request){

        try {
            $product_validator=$request->Validate([
                            'catagory_id' =>['required','integer'],
                            'product_name' => ['required', 'string', 'max:255'],
                            'product_quantity' => ['required', 'integer'],
                            'price' =>['required','double'],
                            'description' => ['string'],
                            'features' =>['required'],
                            'product_by_gender' => ['required','string'],
                            'features' => ['required']
            ]);

            if($product_validator->fail()){
                return response()->json([
                    'error' => $errors()
                ]);
            }
        } catch (\Throwable $th) {

            return response()->json([

                "message"=>$th->getMessage()
            ]);
        }

    }
    
}
