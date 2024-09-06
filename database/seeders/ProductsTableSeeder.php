<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Array of products with category names instead of IDs
        $products = [
            [
                'category' => 'Business Cards',
                'subcategory' => 'Standard',
                'name' => 'Business Cards 14pt',
                'sku' => 'business_cards_14pt',
                'description' => 'High-quality business cards',
                'price' => 19.99
            ],
            [
                'category' => 'Print Products',
                'subcategory' => 'Flyers',
                'name' => 'Flyers 100lb Glossy',
                'sku' => null,  // Missing SKU will be generated
                'description' => 'Premium glossy flyers',
                'price' => 25.99
            ],
            // Add more products as needed...
        ];

        foreach ($products as $product) {
            // Get the category ID by category name
            $category = DB::table('categories')->where('name', $product['category'])->first();
            if (!$category) {
                Log::warning('Skipped product due to unmapped category: ' . json_encode($product));
                continue; // Skip if the category doesn't exist
            }

            // Get the subcategory ID by subcategory name and parent category ID
            $subcategory = DB::table('categories')->where('name', $product['subcategory'])->where('parent_id', $category->id)->first();
            if (!$subcategory) {
                Log::warning('Skipped product due to unmapped subcategory: ' . json_encode($product));
                continue; // Skip if the subcategory doesn't exist
            }

            // Generate SKU if missing
            if (!isset($product['sku']) || empty($product['sku'])) {
                $product['sku'] = 'sku_' . Str::slug($product['name']) . '_' . uniqid();
                Log::info('Generated missing SKU: ' . $product['sku']);
            }

            // Ensure SKU is unique
            $existingProduct = DB::table('products')->where('sku', $product['sku'])->first();
            if ($existingProduct) {
                $product['sku'] = 'sku_' . Str::slug($product['name']) . '_' . uniqid();
                Log::info('Duplicate SKU found. Generated new unique SKU: ' . $product['sku']);
            }

            // Insert the product into the products table
            DB::table('products')->insert([
                'category_id' => $category->id,
                'subcategory_id' => $subcategory->id,
                'name' => $product['name'],
                'slug' => Str::slug($product['name'], '-') . '-' . uniqid(),
                'sku' => $product['sku'],
                'description' => $product['description'],
                'price' => $product['price'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
