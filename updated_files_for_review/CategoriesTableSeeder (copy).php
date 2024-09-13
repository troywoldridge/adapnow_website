
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        // Top-level categories
        $businessCardsId = Category::firstOrCreate(
            ['slug' => Str::slug('Business Cards')],
            ['name' => 'Business Cards', 'description' => 'All business card products']
        );

        $printProductsId = Category::firstOrCreate(
            ['slug' => Str::slug('Print Products')],
            ['name' => 'Print Products', 'description' => 'All print products']
        );

        $largeFormatId = Category::firstOrCreate(
            ['slug' => Str::slug('Large Format')],
            ['name' => 'Large Format', 'description' => 'Large format products']
        );

        $stationaryId = Category::firstOrCreate(
            ['slug' => Str::slug('Stationary')],
            ['name' => 'Stationary', 'description' => 'All stationary products']
        );

        $promotionalId = Category::firstOrCreate(
            ['slug' => Str::slug('Promotional')],
            ['name' => 'Promotional', 'description' => 'Promotional items']
        );

        // Log for each category created
        $this->command->info('Categories seeded successfully');
    }
}
