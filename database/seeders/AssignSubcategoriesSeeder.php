<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Subcategory;

class AssignSubcategoriesSeeder extends Seeder
{
    public function run()
    {
        // Get all subcategories
        $subcategories = Subcategory::all();

        // Loop through all products
        Product::all()->each(function ($product) use ($subcategories) {
            // Assign a random subcategory to each product
            $product->subcategory_id = $subcategories->random()->id;
            $product->save();
        });
    }
}
