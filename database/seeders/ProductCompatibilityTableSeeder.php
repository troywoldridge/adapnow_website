<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ProductCompatibilityTableSeeder extends Seeder
{
    public function run()
    {
        // Example products to seed
        $products = [
            [
                'name' => 'Dummy Product',
                'slug' => Str::slug('Dummy Product'),
                'description' => 'This is a placeholder product',
                'price' => 0,
                'category_id' => 1,
                'sku' => null  // Or set to null if SKU isn't mandatory
            ],
            // Add more products as needed
        ];

        try {
            foreach ($products as $product) {
                // Ensure 'sku' is nullable or use a default SKU value
                DB::table('products')->insert([
                    'name' => $product['name'],
                    'slug' => $product['slug'],
                    'description' => $product['description'],
                    'price' => $product['price'],
                    'category_id' => $product['category_id'],
                    'sku' => $product['sku'] ?? null,  // Allow null SKU
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            Log::info('Products seeded successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to seed products: ' . $e->getMessage());
        }
    }
}
