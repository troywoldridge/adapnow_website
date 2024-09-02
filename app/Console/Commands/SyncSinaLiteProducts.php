<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\SinaLiteService;
use App\Models\Product;
use App\Models\Size;
use App\Models\Stock;

class SyncSinaLiteProducts extends Command
{
    protected $signature = 'sync:sinalite-products';
    protected $description = 'Synchronize products from the SinaLite API';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $sinaLiteService = new SinaLiteService();
        $products = $sinaLiteService->getProducts();

        foreach ($products as $productData) {
            $product = Product::updateOrCreate(
                ['api_id' => $productData['id']],
                [
                    'name' => $productData['name'],
                    'slug' => $productData['slug'],
                    'description' => $productData['description'],
                    'price' => $productData['price'],
                    'category_id' => $productData['category_id'],
                    'subcategory_id' => $productData['subcategory_id'],
                ]
            );

            // Handle sizes
            if (isset($productData['sizes'])) {
                foreach ($productData['sizes'] as $sizeData) {
                    $size = Size::updateOrCreate(['name' => $sizeData['name']]);
                    $product->sizes()->syncWithoutDetaching([$size->id]);
                }
            }

            // Handle stocks
            if (isset($productData['stocks'])) {
                foreach ($productData['stocks'] as $stockData) {
                    $stock = Stock::updateOrCreate(['name' => $stockData['name']]);
                    $product->stocks()->syncWithoutDetaching([$stock->id]);
                }
            }

            // Handle other relationships like grommets, coatings, etc.
            // Add similar loops for other related entities (grommets, coatings, etc.)
        }

        $this->info('SinaLite products synchronized successfully!');
    }
}
