<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $fillable = [
        'order_id',
        'payment_method',
        'payment_status',
        'discount_amount',
        'amount',
        // Add any other fields that should be mass assignable
    ];
}
