<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderProduct extends Model
{
    use HasFactory;

    protected $fillable=['quantity','product_id','order_id'];

    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function products(){
        return $this->belongsTo(Product::class);
    }

}
