<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $fillable=['title','slug','discription'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function photos()
    {
        return $this->morphMany(Photo::class, 'photoable');
    }
}
