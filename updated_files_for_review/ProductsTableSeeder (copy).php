
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use League\Csv\Reader;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        // Load the CSV file
        $csv = Reader::createFromPath(database_path('seeders/products.csv'), 'r');
        $csv->setHeaderOffset(0); // Adjust to your CSV's header row

        $records = $csv->getRecords();

        // Create a fallback category for products without a valid parent_id
        $fallbackCategory = Category::firstOrCreate(
            ['slug' => 'uncategorized'],
            ['name' => 'Uncategorized', 'description' => 'Default category for uncategorized products']
        );

        foreach ($records as $record) {
            // Trim and sanitize the input to prevent errors
            $parent_id = trim($record['parent_id'] ?? null);

            // Verify if 'parent_id' exists in the categories table
            $category = (!empty($parent_id) && is_numeric($parent_id)) ? Category::find($parent_id) : null;
            $category_id = $category ? $category->id : $fallbackCategory->id;

            if (!$category) {
                $this->command->info("Category ID {$record['parent_id']} not found. Using fallback category.");
            }

            // Validate product fields
            $name = trim($record['name']) ?: 'Unnamed Product'; // Fallback for name
            $slug = Str::slug(trim($record['slug']) ?: $name); // Ensure unique slug
            $description = trim($record['description']) ?: 'No description available';
            $price = is_numeric($record['price']) ? $record['price'] : 0.00; // Validate price
            $stock = is_numeric($record['stock']) ? (int) $record['stock'] : 0; // Validate stock

            // Insert product or update if it exists
            Product::firstOrCreate(
                ['slug' => $slug],
                [
                    'category_id' => $category_id,
                    'name' => $name,
                    'description' => $description,
                    'price' => $price,
                    'stock' => $stock,
                    'sku' => trim($record['sku']) ?: null,
                ]
            );
        }

        $this->command->info('Products seeded successfully');
    }
}
