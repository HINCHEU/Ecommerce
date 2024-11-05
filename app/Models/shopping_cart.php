<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class shopping_cart extends Model
{
    use HasFactory;
    protected $table = 'shopping_cart';
    protected $fillable = ['user_id', 'product_id', 'productsize_id', 'productcolor_id', 'quantity'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function size()
    {
        return $this->belongsTo(ProductSize::class, 'productsize_id');
    }

    public function color()
    {
        return $this->belongsTo(ProductColor::class, 'productcolor_id');
    }
}
