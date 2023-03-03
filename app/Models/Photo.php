<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
                    'photo_name',
                    'photo_path',
                    'photo_url',
                    'height',
                    'width'
    ];

   

    public function product(){
        return $this->belongsTo(Product::class);
    }

}
