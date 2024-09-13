<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use League\Csv\Reader;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        // Load the CSV file
        $csv = Reader::createFromPath(database_path('seeders/products.csv'), 'r');
        $csv->setHeaderOffset(0); // Adjust to your CSV's header row

        $records = iterator_to_array($csv->getRecords()); // Convert to array
            $this->command->info("CSV records loaded successfully.");
            $this->command->info("Number of records in CSV: " . count($records));
            $this->command->info("Inserting product: {$name} into products table.");


        // Create a fallback category for products without a valid parent_id
        $fallbackCategory = Category::firstOrCreate(
            ['slug' => 'uncategorized'],
            ['name' => 'Uncategorized', 'description' => 'Default category for uncategorized products']
        );

        foreach ($records as $record) {
            // Trim and sanitize the input to prevent errors
            $parent_id = trim($record['parent_id'] ?? null);

            // Log the processing product name
            $this->command->info("Processing product: {$record['name']}");

            // Verify if 'parent_id' exists in the categories table
            if (!empty($parent_id) && is_numeric($parent_id)) {
                $category = Category::find($parent_id);
            } else {
                $category = null;
            }

            if ($category) {
                // Use the valid category_id if found
                $this->command->info("Category found for product: {$record['name']}");
                $category_id = $category->id;
            } else {
                // Log or display a message if the category is missing
                $this->command->info("Category ID {$record['parent_id']} not found. Using fallback category.");
                // Use fallback category if 'parent_id' is invalid or missing
                $category_id = $fallbackCategory->id;
            }

            // Validate other fields to prevent data type mismatch
            $name = trim($record['name']) ?: 'Unnamed Product'; // Fallback for name
            $slug = $this->createUniqueSlug(trim($record['slug']) ?: Str::slug($name)); // Ensure unique slug
            $description = trim($record['description']) ?: 'No description available';

            // Insert product into the 'products' table (without manually setting the ID)
            DB::table('products')->insert([
                'category_id' => $category_id, // Use the found or fallback category_id
                'name' => $name,  // CSV 'name'
                'slug' => $slug,  // Generated unique slug
                'description' => $description, // CSV 'description'
                'price' => 0.00, // Default price (can change if needed)
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Generate a unique slug by appending a number if the slug already exists.
     *
     * @param string $slug
     * @return string
     */
    private function createUniqueSlug($slug)
    {
        $originalSlug = $slug;
        $count = 1;

        // Check if the slug already exists in the database
        while (Product::where('slug', $slug)->exists()) {
            // If the slug exists, append a number to it and check again
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
}
