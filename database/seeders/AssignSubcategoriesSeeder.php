<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssignSubcategoriesSeeder extends Seeder
{
    public function run()
    {
        DB::table('subcategories')->insert([
            ['name' => 'Subcategory 1', 'category_id' => 1],
            ['name' => 'Subcategory 2', 'category_id' => 1],
            ['name' => 'Subcategory 3', 'category_id' => 2],
            // Add more subcategories here...
        ]);
    }
}
