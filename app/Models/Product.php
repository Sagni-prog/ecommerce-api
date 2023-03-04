<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
                            'catagory_id',
                            'Product_name',
                            'product_quantity',
                            'price',
                            'description',
                            'features',
                            'product_by_gender',
                            'product_discount_percent',
                            'product_discount_start_date',
                            'product_discount_end_date'


        ];

        protected $casts = [
            'features' => 'array'
        ];

    public function catagory(){
        return $this->belongsTo(Catagory::class);
    }
    public function photo(){
        return $this->hasMany(Photo::class,'photo_id');
    }
}
