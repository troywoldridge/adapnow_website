<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use App\Models\Category;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        // Load the CSV file generated from the Sinalite API
        $csvPath = storage_path('exports/sinalite_products.csv');
        $csv = Reader::createFromPath($csvPath, 'r');
        $csv->setHeaderOffset(0); // Assuming the first row is the header

        $records = $csv->getRecords(); // Fetch CSV records

        // Create a fallback category for products without a valid category
        $fallbackCategory = Category::firstOrCreate(
            ['slug' => 'uncategorized'],
            ['name' => 'Uncategorized', 'description' => 'Default category for uncategorized products']
        );

        // Iterate over CSV records and seed them into the products table
        foreach ($records as $record) {
            // Fetch or create the category
            $category = Category::where('slug', $record['category_slug'])->first();

            if (!$category) {
                $this->command->warn("Category '{$record['category_slug']}' not found. Assigning to 'Uncategorized'.");
                $category = $fallbackCategory;
            }

            // Insert or update the product
            Product::updateOrCreate(
                ['slug' => $record['slug']], // Use the slug to update if the product already exists
                [
                    'category_id' => $category->id,
                    'name' => $record['name'],
                    'description' => $record['description'] ?? 'No description available',
                    'price' => $record['price'] ?? 0.00, // Set default price if missing
                    'sku' => $record['sku'] ?? null,
                    'created_at' => $record['created_at'] ?? now(),
                    'updated_at' => $record['updated_at'] ?? now(),
                ]
            );

            $this->command->info("Product '{$record['name']}' has been added or updated.");
        }
    }
}
