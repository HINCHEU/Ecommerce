<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ColorProductVariant extends Model
{
    use HasFactory;
    protected $table = 'colorproductvariants';
    protected $fillable = [
        'color_id',
        'productVariant_id',
    ];
}
