<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FixProductImages extends Command
{
    protected $signature = 'fix:product-images';
    protected $description = 'Fix and verify product image paths based on slugs';

    public function handle()
    {
        // Fetch all products with their slugs
        $products = DB::table('products')->select('slug', 'image')->get();

        // Base image directory
        $imageDir = public_path('images/products/');
        
        foreach ($products as $product) {
            $expectedImagePath = $imageDir . $product->slug . '.jpg'; // Assuming image extensions are .jpg, modify if necessary

            // Check if the image file exists
            if (!file_exists($expectedImagePath)) {
                // Log the issue or try to fix the path
                Log::error("Image not found for product slug: {$product->slug}");

                // Optionally, you can rename the existing image to match the slug
                $currentImagePath = $imageDir . $product->image; // Assuming the image is stored correctly in DB

                if (file_exists($currentImagePath)) {
                    rename($currentImagePath, $expectedImagePath);
                    Log::info("Renamed {$currentImagePath} to {$expectedImagePath}");
                } else {
                    Log::error("No image found for {$product->slug}. Please check manually.");
                }
            } else {
                Log::info("Image exists for product slug: {$product->slug}");
            }
        }

        $this->info('Image paths have been verified and fixed where necessary.');
    }
}
