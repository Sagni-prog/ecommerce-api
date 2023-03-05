<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
                    'user_id',
                    'billing_firstname',
                    'billing_lastname',
                    'billing_email',
                    'billing_country',
                    'billing_city',
                    'billing_address_line1',
                    'billing_address_line2',
                    'billing_total',
                    'billing_payment_gateway',
                    'billing_payment_status',
                    'billing_payment_shipment_status',
                    'billing_error',
    ];

    public function orderProducts(){
        return $this->hasMany(orderProduct::class,'product_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
