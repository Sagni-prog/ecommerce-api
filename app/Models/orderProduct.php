<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderProduct extends Model
{
    use HasFactory;

    protected $fillable=['quantity','product_id'];

    public function order(){
        return $this->hasOne(Order::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }

}
