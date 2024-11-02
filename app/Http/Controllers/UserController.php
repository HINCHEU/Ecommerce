<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index()
    {

        $users = Auth::user();
        return view('user.index', compact('users'));
    }


    public function product()
    {
        $product = DB::table('products')
            ->leftJoin('images', 'images.product_id', '=', 'products.id')
            ->select(
                'products.id as id',
                'products.name as name',
                'products.base_price as price',
                DB::raw('MIN(images.image) as image') // Get the first image
            )
            ->groupBy('products.id', 'products.name', 'products.base_price')
            ->get();

//


        return view('user.index', compact('product'));
    }

}
