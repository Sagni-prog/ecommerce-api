<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
<<<<<<< HEAD
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // get all product from the database
    public function index()
    {
        try{

            $product=\App\Models\Product::with('photos')->orderBy('created_at', 'desc')->paginate(3);
            if(!$product){
=======
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Validate;

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
>>>>>>> 7dd4d7688dca24d098844844d796182cfd4d0faf
                return response()->json([
                    'status'=>'fail',
                    'msg'=>'no record'
                
                ],500);

            }
<<<<<<< HEAD
=======
            
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

>>>>>>> 7dd4d7688dca24d098844844d796182cfd4d0faf
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
    
<<<<<<< HEAD
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

=======
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

        [$width,$height] = getimagesize(Storage::path($path));

        $data = [
            "width" => $width,
            "height" => $height
        ];
         return $data; 
    }
    
>>>>>>> 7dd4d7688dca24d098844844d796182cfd4d0faf
}
