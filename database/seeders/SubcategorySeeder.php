<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Subcategory;

class SubcategorySeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            Subcategory::create([
                'name' => 'Example Subcategory for ' . $category->name,
                'category_id' => $category->id,
            ]);
        }
    }
}
