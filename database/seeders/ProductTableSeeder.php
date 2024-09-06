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
        $products = [
            [
                'category_id' => 1,
                'subcategory_id' => 2,
                'name' => 'Business Cards 14pt',
                'sku' => 'business_cards_14pt',
                'description' => 'High-quality business cards',
                'price' => 19.99
            ],
            [
                'category_id' => 1,
                'subcategory_id' => 2,
                'name' => 'Flyers 100lb Glossy',
                'sku' => null,  // Example of a product with missing SKU
                'description' => 'Premium glossy flyers',
                'price' => 25.99
            ],
            // Add more products as needed...
        ];

        foreach ($products as $product) {
            if (!isset($product['sku']) || empty($product['sku'])) {
                // Log a warning and skip products with missing SKU
                Log::warning('Skipped product due to missing SKU: ' . json_encode($product));
                continue;
            }

            DB::table('products')->insert([
                'category_id' => $product['category_id'],
                'subcategory_id' => $product['subcategory_id'],
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
