<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id', // Add this line
        'product_id',
        'productcolor_id',
        'productsize_id',
        'quantity',
        'price',
        'final_price',
        // Add any other fields that should be mass assignable
    ];
}
