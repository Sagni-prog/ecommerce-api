<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
    public function index(Request $request){
        try{
            $post=Post::with('photos')->orderBy('created_at', 'desc')->paginate(1);
            return response()->json([
                "status"=>"success",
                "data"=>$post
            ],202);
        }catch (\Exception $th) {

            return response()->json([
                'status'=>'fail',
                "message"=>$th->getMessage()
            ],500);
        }
    }
    public function store(Request $request){
        try{
            $input=Validator::make($request->all(),[
                "title"=>['required'],
                "discription"=>['required', 'string', 'max:255']
            ]);
            if(!$input){
                return response()->json([
                    "status"=>"fail",
                    "msg"=>$input->getMessage()
                ],404);

            }

           $post=Post::create($request->all());

           if($request->hasFile('photo')){

            $extension = $request->file('photo')->extension();
            $name = "product";
            $filename = $name . "-" . time() ."." .$extension;

            $path = $request->file('photo')->storeAs('product-photo',$filename);

            $photo_url = Storage::url($path);

            $data = $this->getDimension($path);
              $width = $data['width'];
              $height = $data['height'];

            $post->photos()->create([
                          'photo_name' => $name,
                          'photo_path' => $path,
                          'photo_url' => $photo_url,
                          'height' => $width,
                          'width' => $height
            ]);
            return response()->json([
                "status"=>"success",
                "data"=>$post
            ],200);
        }
        return response()->json([
            'prducts' => $post
    ],200);

        }
        catch (\Exception $th) {

            return response()->json([
                'status'=>'fail',
                "message"=>$th->getMessage()
            ],500);
        }
    }
    public function edit(Request $request,$id){
        try{
            $request->validate([
                "title"=>['required'],
                "discription"=>['required', 'string', 'max:255']
            ]);
            $post=Post::where(['id'=>$id])->with('photos')->first();
            $post->update($request->all());
            if($request->hasFile('photo')){

                $extension = $request->file('photo')->extension();
                $name = "product";
                $filename = $name . "-" . time() ."." .$extension;

                $path = $request->file('photo')->storeAs('product-photo',$filename);

                $photo_url = Storage::url($path);

                $data = $this->getDimension($path);
                  $width = $data['width'];
                  $height = $data['height'];

                $post->photos()->update([
                              'photo_name' => $name,
                              'photo_path' => $path,
                              'photo_url' => $photo_url,
                              'height' => $width,
                              'width' => $height
                ]);
                return response()->json([
                    "status"=>"success",
                    "data"=>$post
                ],200);
            }
            return response()->json([
                "status"=>"success",
                "msg"=>$post
            ],200);


         } catch (\Exception $th) {

            return response()->json([
                'status'=>'fail',
                "message"=>$th->getMessage()
            ],500);
        }
    }
    public function destorypost($id){
        try{

            $product=Post::where('id',$id)->first();
            $now=Carbon::now();

            $res=$product->update(['deleted_at'=>$now]);
            if($res){
                $product->delete();
                return response()->json([
                    'status'=>true,
                    'msg'=>'deleted sucessfully'
                ]);
            }

            return response()->json([
                'status'=>'fail',
                "message"=>'no record'
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
