// scripts/verify_products.php

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;

// Bootstrap Laravel
require __DIR__.'/../vendor/autoload.php';

// Boot Laravel framework for scripts
$app = require_once __DIR__.'/../bootstrap/app.php';

// Load the kernel and run Laravel's environment
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Now you can interact with the database using Eloquent models

// Check each product
$products = Product::with('category')->get();
foreach ($products as $product) {
    // Check if the product has a valid category
    if (!$product->category) {
        Log::warning("Product '{$product->name}' (ID: {$product->id}) does not have a valid category.");
        echo "Product '{$product->name}' (ID: {$product->id}) does not have a valid category.\n";
    }

    // Check if product image exists
    $imagePath = public_path('images/' . $product->image);
    if (!file_exists($imagePath)) {
        Log::warning("Image not found for product '{$product->name}' (ID: {$product->id}) at path: $imagePath");
        echo "Image not found for product '{$product->name}' (ID: {$product->id}) at path: $imagePath\n";
    }

    // Verify category's slug exists and is correct
    if (!$product->category->slug || empty($product->category->slug)) {
        Log::warning("Category slug missing for product '{$product->name}' (ID: {$product->id}).");
        echo "Category slug missing for product '{$product->name}' (ID: {$product->id}).\n";
    }
}

echo "Product and category verification completed.\n";
