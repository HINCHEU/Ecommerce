<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'total_amount',
        'user_id',
        'shipping_address',
        'total_price',
        'coupon_id',
    ];
}
