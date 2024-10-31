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

    public function product_detail($id)
    {
        $product_detail = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('product_variants', 'products.id', '=', 'product_variants.product_id')
            ->leftJoin('images', 'products.id', '=', 'images.product_id')
            ->select(
                'images.image as image',
                'products.id as id',
                'products.name as product_name',
                'products.created_at as created_at',
                'categories.name as category_name',
                DB::raw('MIN(product_variants.price) as price'),
                DB::raw('MIN(product_variants.quantity) as quantity')
            )
            ->where('products.id', '=', $id)
            ->groupBy('products.id', 'products.name', 'products.created_at', 'categories.name', 'product_variants.id', 'images.image')
            ->first();

        return response()->json($product_detail);
    }

    public function product()
    {

        $product = DB::table('products')
            ->select(
                'products.id as id',
                'products.name as product_name',
                DB::raw('MIN(product_variants.price) as price'),
                DB::raw('(SELECT images.image FROM images WHERE images.product_id = products.id LIMIT 1) as image')
            )
            ->join('product_variants', 'product_variants.product_id', '=', 'products.id')
            ->groupBy('products.id', 'products.name')
            ->get();


        //        $product_detail = DB::table('products')
        //            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
        //            ->leftJoin('product_variants', 'products.id', '=', 'product_variants.product_id')
        //            ->leftJoin('images', 'product_variants.id', '=', 'images.productVariant_id')
        //            ->select(
        //                DB::raw('COALESCE(MAX(images.image), "default_image.png") as image'), // Get the first image or a default
        //                'products.id as id',
        //                'products.name as product_name',
        //                'products.created_at as created_at',
        //                'categories.name as category_name',
        //                DB::raw('MIN(product_variants.price) as price'),
        //                DB::raw('MIN(product_variants.quanity) as quantity') // Changed to SUM to aggregate quantity
        //            )
        //            ->groupBy(
        //                'products.id',
        //                'products.name',
        //                'products.created_at',
        //                'categories.name',
        //                'product_variants.id'
        //            )
        //            ->get();



        return view('user.index', compact('product'));
    }
    //
}
