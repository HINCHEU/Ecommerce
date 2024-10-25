<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // List of colors to add
        $images = [
            ['image' => 'cheu.png', 'productVariant_id' => '1'],
        ];

        // Insert each color into the database
        foreach ($images as $image) {
            Image::create($image);
        }
    }
}