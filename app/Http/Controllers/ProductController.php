<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Image;
use App\Models\ProductVariant;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('product_variants', 'products.id', '=', 'product_variants.product_id')
            ->leftJoin('images', 'product_variants.id', '=', 'images.productVariant_id')
            ->select(
                DB::raw('COALESCE(MAX(images.image), "default_image.png") as image'), // Get the first image or a default
                'products.id as id',
                'products.name as product_name',
                'products.created_at as created_at',
                'categories.name as category_name',
                DB::raw('MIN(product_variants.price) as price'),
                DB::raw('MIN(product_variants.quanity) as quantity') // Changed to SUM to aggregate quantity
            )
            ->groupBy(
                'products.id',
                'products.name',
                'products.created_at',
                'categories.name',
                'product_variants.id'
            )
            ->get();


        return view('admin.product_list', compact('product'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category');
        $product->save();

        $lastProductId = DB::table('products')->latest('id')->value('id');
        $product_variants = new ProductVariant();
        $product_variants->product_id = $lastProductId;
        $product_variants->color_id = $request->input('color');
        $product_variants->size_id = $request->input('size');
        $product_variants->price = $request->input('price');
        $product_variants->quanity = $request->input('quantity');
        $product_variants->save();
        $lastProductVariantId = DB::table('product_variants')->latest('id')->value('id');


        $filenames = ['filename1', 'filename2', 'filename3'];
        // Loop through each filename and handle the upload
        foreach ($filenames as $filename) {
            // Check if the file exists in the request
            if ($request->hasFile($filename)) {
                // Get the file
                $file = $request->file($filename);

                // Store the file in the public/images directory
                $path = $file->store('images', 'public');
                $filename = basename($path);
                // Create a new Image record
                $image = new Image(); // Make sure to import the Image model at the top
                $image->productVariant_id = $lastProductVariantId; // Associate with the last product variant
                $image->image = $filename; // Save the path to the database
                $image->save(); // Save the record
            }
        }


        return redirect('/add_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $category = Category::all();
        $size = Size::all();
        $color = Color::all();

        return view('admin.add_product', compact('category', 'size', 'color'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
