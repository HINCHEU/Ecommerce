<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SizeProductVariant extends Model
{
    use HasFactory;
    protected $table = 'sizeproductvariants';
    protected $fillable = [
        'size_id',
        'productVariant_id',
    ];
}
