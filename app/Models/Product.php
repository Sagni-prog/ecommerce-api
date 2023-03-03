<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['Product_name','product_quantity','price','description','features','product_by_gender'];

    public function catagory(){
        return $this->belongsTo(Catagory::class);
    }
}
