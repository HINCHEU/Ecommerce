<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductVariant;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // List of sizes to add
        $product_variants = [
            ['price' => '15', 'quanity' => '5', 'product_id' => '1', 'size_id' => '1', 'color_id' => '1'],

        ];

        // Insert each size into the database
        foreach ($product_variants as $product_variant) {
            ProductVariant::create($product_variant);
        }
    }
}
