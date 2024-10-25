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
            ['name' => 'T-shirt', 'description' => 'comfort shirt',  'category_id' => '3'],
            ['name' => 'crop top', 'description' => 'tiny shirt', 'category_id' => '4'],
        ];

        // Insert each size into the database
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
