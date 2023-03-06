<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderProduct extends Model
{
    use HasFactory;


    protected $fillable=['order_id','quantity'];


    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function products(){
        return $this->belongsToMany(Product::class,'order_products_products');

    }


}
