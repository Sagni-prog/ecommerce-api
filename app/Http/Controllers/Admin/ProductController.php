<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \App\Models\Product;
use \App\Models\Catagory;

class ProductController extends Controller
{

    // get all products
    public function index()
    {
        try{

            $product=\App\Models\Product::with('photos')
                                     ->orderBy('created_at', 'desc')
                                     ->paginate(10);
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


                $catagory=\App\Models\Catagory::where(['catagory_name'=>$request->catagory_name])->with('products.photos')->orderBy('created_at', 'desc')->paginate(3);

                if(!$catagory){
                    return response()->json([
                        'status'=>false,
                        'data'=>"no record"
                    ],404);

                }

                return response()->json([
                    'status'=>true,
                    'data'=>$catagory


                ],200);


        }catch(\Exception $E){
            return response()->json([
                'status'=>'fail',
                'msg'=>$E->getMessage()
            ]);
        }
    }

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
                    'status'=>'fail',
                    'msg'=>'no record'

                ],404);

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

        }catch(\Exception $E){
            return response()->json([
                'status'=>'fail',
                'msg'=>$E->getMessage()
            ]);
        }
    }

    public function edit(Request $request){
        try {

           $request->validate([
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

          $product = Product::where('id',$request->id)->with('photos')->first();

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
          return response()->json([
            'status' => $product
    ],200);


        } catch (\Exception $th) {

            return response()->json([
                'status'=>'fail',
                "message"=>$th->getMessage()
            ],500);
        }
    }
    public function destoryproduct($id){
        try{

            $product=Product::find($id);
            if(!$product){
                return response()->json([
                    'status'=>'fail',
                    "message"=>'no record'
                ],500);

            }
            $result=$product->delete();
            if($result){
                return response()->json([
                    'status' => $result
            ],200);
            }
            return response()->json([
                'status' => 'fail'
        ],500);



        }catch (\Exception $th) {

            return response()->json([
                'status'=>'fail',
                "message"=>$th->getMessage()
            ],500);
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

}
