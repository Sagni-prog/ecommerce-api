<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function store(Request $request){

        try {
            $product_validator=$request->validate([
                            'catagory_id' =>['required','integer'],
                            'product_name' => ['required', 'string', 'max:255'],
                            'product_quantity' => ['required','integer'],
                            'price' =>['required'],
                            'description' => ['string'],
                            'features' =>['required'],
                            'product_by_gender' => ['required','string'],
                            'features' => ['required'],
                            'photo' => ['nullable','image','mimes:jpeg,jpg,png,gif']
            ]);
            
    
            if(!$product_validator){
                return response()->json([
                    'error' => $errors()
                ]);
            }
            
           $product = Product::create([
                            'catagory_id' => $request->catagory_id,
                            'product_name' => $request->product_name,
                            'product_quantity' => $request->product_quantity,
                            'price' => $request->price,
                            'description' => $request->description,
                            'features' => $request->features,
                            'product_by_gender' => $request->product_by_gender,
           ]);  
           
           
          if($request->hasFile('photo')){
          
              $extension = $request->file('photo')->extension();
              $name = "product";
              $filename = $name . "-" . time() ."." .$extension;
              
              $path = $request->file('photo')->storeAs('product-photo',$filename);
              
              $photo_url = Storage::url($path);
              
              $data = $this->getDimension($path);
                $width = $data['width'];
                $height = $data['height'];
              
              $product->photos()->create([
                            'photo_name' => $name,
                            'photo_path' => $path,
                            'photo_url' => $photo_url,
                            'height' => $width,
                            'width' => $height
              ]);
              
              return response()->json([
                      'prducts' => $product
              ],200);
              
              
          }
            
        } catch (\Throwable $th) {

            return response()->json([

                "message"=>$th->getMessage()
            ]);
        }

    }
    
    public function edit(Request $request){
    
       
            $product_validator=$request->validate([
                            'catagory_id' =>['required','integer'],
                            'product_name' => ['required', 'string', 'max:255'],
                            'product_quantity' => ['required','integer'],
                            'price' =>['required'],
                            'description' => ['string'],
                            'features' =>['required'],
                            'product_by_gender' => ['required','string'],
                            'features' => ['required'],
                            'photo' => ['nullable','image','mimes:jpeg,jpg,png,gif']
            ]);
            
    
            if(!$product_validator){
                return response()->json([
                    'error' => $errors()
                ]);
            }
            
      try {
      
          $product = Product::where('id',$request->id)->first();
             $result = $product->update([
                            'catagory_id' => $request->catagory_id,
                            'product_name' => $request->product_name,
                            'product_quantity' => $request->product_quantity,
                            'price' => $request->price,
                            'description' => $request->description,
                            'features' => $request->features,
                            'product_by_gender' => $request->product_by_gender,
           ]);  
           
           
          if($request->hasFile('photo')){
          
              $extension = $request->file('photo')->extension();
              $name = "product";
              $filename = $name . "-" . time() ."." .$extension;
              
              $path = $request->file('photo')->storeAs('product-photo',$filename);
              
              $photo_url = Storage::url($path);
              
              $data = $this->getDimension($path);
                $width = $data['width'];
                $height = $data['height'];
              
              $product->photos()->update([
                            'photo_name' => $name,
                            'photo_path' => $path,
                            'photo_url' => $photo_url,
                            'height' => $width,
                            'width' => $height
              ]);
              
              return response()->json([
                      'status' => $result
              ],200);
              
              
          }
            
        } catch (\Throwable $th) {

            return response()->json([

                "message"=>$th->getMessage()
            ]);
        }
    }
    
    public static function getDimension($path){
    
    try {
        
            [$width,$height] = getimagesize(Storage::path($path));
    
            $data = [
                "width" => $width,
                "height" => $height
            ];
             return $data; 
                       } catch (\Throwable $th) {
                        return response()->json([

                            "message"=>$th->getMessage()
                        ]);
                      }

           }
    }
    

