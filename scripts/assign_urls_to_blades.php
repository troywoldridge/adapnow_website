<?php

// Bootstrap Laravel
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Product;
use App\Models\Category;

// Define paths
$destinationBaseDir = 'resources/views/products/';
$baseUrl = 'http://127.0.0.1:8000/product/';  // Update this with your base URL

// Query all products
$products = Product::with('category', 'subcategory')->get();

foreach ($products as $product) {
    $categorySlug = $product->category->slug;
    $subcategorySlug = $product->subcategory ? $product->subcategory->slug : null;
    $slug = $product->slug;

    // Define the Blade file path
    $categoryDir = $destinationBaseDir . $categorySlug . '/';
    if ($subcategorySlug) {
        $categoryDir .= $subcategorySlug . '/';
    }

    $fileName = $categoryDir . $slug . '.blade.php';

    // Check if the file exists before modifying it
    if (file_exists($fileName)) {
        // Generate the URL
        $url = "{$baseUrl}{$categorySlug}/{$slug}";

        // Read the existing Blade file content
        $fileContent = file_get_contents($fileName);

        // Add the URL somewhere in the Blade template
        // For this example, we will append the URL at the end of the file
        $fileContent .= "\n<!-- URL for this product: {$url} -->\n";

        // Write the updated content back to the Blade file
        file_put_contents($fileName, $fileContent);

        echo "Updated URL in: $fileName\n";
    } else {
        echo "Blade file not found for: $slug\n";
    }
}

echo "All Blade files have been updated with URLs.\n";
