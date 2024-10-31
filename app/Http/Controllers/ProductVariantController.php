<?php

namespace App\Http\Controllers;
use App\Models\Size;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{


    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $product = Product::all();
        $size = Size::all();
        $color = Color::all();

        return view('admin.add_product_variant', compact('product','size', 'color'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        // $product = new Product();
        // $product->name = $request->input('name');
        // $product->description = $request->input('description');
        // $product->category_id = $request->input('category');
        // $product->save();

        // $lastProductId = DB::table('products')->latest('id')->value('id');
        $product_variants = new ProductVariant();
        $product_variants->product_id = $request->input('product_id');
        $product_variants->color_id = $request->input('color');
        $product_variants->size_id = $request->input('size');
        $product_variants->price = $request->input('price');
        $product_variants->quanity = $request->input('quantity');
        $product_variants->save();
        //$lastProductVariantId = DB::table('product_variants')->latest('id')->value('id');


        // $filenames = 'filename1';
        // // Loop through each filename and handle the upload
        // //foreach ($filenames as $filename) {
        //     // Check if the file exists in the request
        //     if ($request->hasFile($filenames)) {
        //         // Get the file
        //         $file = $request->file($filenames);

        //         // Store the file in the public/images directory
        //         $path = $file->store('images', 'public');
        //         $filename = basename($path);
        //         // Create a new Image record
        //         $image = new Image(); // Make sure to import the Image model at the top
        //         $image->product_id = $request->input('product_id'); // Associate with the last product variant
        //         $image->image = $filename; // Save the path to the database
        //         $image->save(); // Save the record
        //     }
        //}
        $filename = 'filename1'; // The single file input name
        
        // Check if the file exists in the request
        if ($request->hasFile($filename)) {
            // Get the file
            $file = $request->file($filename);

            // Store the file in the public/images directory
            $path = $file->store('images', 'public');
            $savedFilename = basename($path); // Get the filename from the path

            // Create a new Image record
            $image = new Image(); // Ensure the Image model is imported
            $image->product_id = $request->input('product_id'); // Associate with the product
            $image->image = $savedFilename;
            // Save the filename to the database
            $image->save(); // Save the record
        }else{
            return "k";
        }






        // $request->validate([
        //     'sizes' => 'required|array',
        //     'sizes.*' => 'exists:sizes,id', // Assuming 'sizes' table has an 'id'
        // ]);

        // // Loop through each checked size and create a new product variant
        // foreach ($request->sizes as $sizeId) {
        //     SizeProductVariant::create([
        //         'size_id' => $sizeId,
        //         'productVariant_id' => $lastProductVariantId, // Adjust the column name as necessary
        //         // Add other necessary fields here
        //     ]);
        // }

        // $request->validate([
        //     'colors' => 'required|array',
        //     'colors.*' => 'exists:colors,id', // Assuming 'colors' table has an 'id'
        // ]);

        // // Loop through each checked size and create a new product variant
        // foreach ($request->colors as $colorId) {
        //     ColorProductVariant::create([
        //         'color_id' => $colorId,
        //         'productVariant_id' => $lastProductVariantId, // Adjust the column name as necessary
        //         // Add other necessary fields here
        //     ]);
        // }


        return redirect('/add_product_variant');
    }
}
