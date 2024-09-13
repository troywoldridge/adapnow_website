<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\Category;
use App\Services\SinaliteService; // Make sure your SinaliteService is working properly

class FetchSinaliteProducts extends Command
{
    protected $signature = 'sinalite:fetch-products';
    protected $description = 'Fetch products from Sinalite API and store them in the local database';

    protected $sinaliteService;

    // Inject the Sinalite service into the command
    public function __construct(SinaliteService $sinaliteService)
    {
        parent::__construct();
        $this->sinaliteService = $sinaliteService;
    }

    public function handle()
    {
        try {
            // Fetch products from Sinalite API
            $products = $this->sinaliteService->getProducts();

            foreach ($products as $productData) {
                // Example: Store each product in the database
                $category = Category::firstOrCreate(['name' => $productData['category']['name']], [
                    'slug' => $productData['category']['slug'],
                ]);

                // Optionally handle subcategories if you have them
                $subcategory = null;
                if (isset($productData['subcategory'])) {
                    $subcategory = $category->subcategories()->firstOrCreate(['name' => $productData['subcategory']['name']], [
                        'slug' => $productData['subcategory']['slug'],
                    ]);
                }

                // Store the product
                Product::updateOrCreate(
                    ['slug' => $productData['slug']], // Unique field to identify product
                    [
                        'category_id' => $category->id,
                        'subcategory_id' => $subcategory ? $subcategory->id : null,
                        'name' => $productData['name'],
                        'description' => $productData['description'],
                        'price' => $productData['price'],
                        'sku' => $productData['sku'],
                        'image' => $productData['image'],
                    ]
                );
            }

            $this->info('Products fetched and stored successfully.');
        } catch (\Exception $e) {
            $this->error('Error fetching products: ' . $e->getMessage());
        }
    }
}
