<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // List of sizes to add
        $products = [
            ['name' => 'T-shirt', 'description' => 'comfort shirt',  'category_id' => '3','base_price' => '10'],
            ['name' => 'crop top', 'description' => 'tiny shirt', 'category_id' => '4','base_price' => '20'],
        ];

        // Insert each size into the database
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
