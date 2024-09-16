<?php

// Include the Composer autoloader
require __DIR__ . '/../vendor/autoload.php';

// Bootstrap the Laravel application
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Initialize the Laravel console kernel to bootstrap the application
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Now we can use Laravel's Eloquent models
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

// Define the base path for Blade templates
$basePath = __DIR__ . '/../resources/views/products';  // Adjust the path as needed

// Define the base URL for product links
$baseUrl = 'http://127.0.0.1:8000/product/';  // Update this with your base URL

// Fetch all categories with subcategories and products
$categories = Category::with('subcategories.products')->get();

// Blade template structure with placeholders
$template = <<<EOT
@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">{{PRODUCT_NAME}}</h1>
    
    <!-- Description Section -->
    <div class="row">
        <div class="col-md-6">
            <img src="/public/images/{{CATEGORY}}/{{PRODUCT_SLUG}}.png" alt="{{PRODUCT_NAME}}" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2>Description</h2>
            <p>{{PRODUCT_DESCRIPTION}}</p>
            <ul>
                <li>{{FEATURE_1}}</li>
                <li>{{FEATURE_2}}</li>
                <li>{{FEATURE_3}}</li>
            </ul>
        </div>
    </div>

    <!-- Specifications -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Specifications</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Feature</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Paper Type</td>
                        <td>{{PRODUCT_PAPER_TYPE}}</td>
                    </tr>
                    <tr>
                        <td>Size</td>
                        <td>{{PRODUCT_SIZE}}</td>
                    </tr>
                    <tr>
                        <td>Finishes</td>
                        <td>{{PRODUCT_FINISH}}</td>
                    </tr>
                    <tr>
                        <td>Shipping Time</td>
                        <td>{{PRODUCT_SHIPPING_TIME}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pricing Section -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Pricing</h2>
            <a href="{{ route('product.show', ['category_slug' => '{{CATEGORY}}', 'product_slug' => '{{PRODUCT_SLUG}}']) }}" class="btn btn-primary">Order Now</a> 
        </div>
    </div>

    <!-- Back Button -->
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <a href="{{ route('category.show', ['category_slug' => '{{CATEGORY}}']) }}" class="btn btn-secondary">Back to {{CATEGORY}}</a>
        </div>
    </div>
</div>
@endsection

<!-- URL for this product: {{PRODUCT_URL}} -->
EOT;

// Fetch product data from the database using the Product model
function fetchProductData($productSlug) {
    // Ensure related data like category and subcategory is eagerly loaded
    return Product::with(['category', 'subcategory'])->where('slug', $productSlug)->first();
}

// Replace placeholders in the template with actual product data
function replacePlaceholders($template, $category, $productSlug, $url) {
    $product = fetchProductData($productSlug);

    if (!$product) {
        Log::error("Product not found: " . $productSlug);
        return false;
    }

    // Replace placeholders with actual product data
    return str_replace(
        [
            '{{PRODUCT_NAME}}', '{{CATEGORY}}', '{{PRODUCT_SLUG}}', '{{PRODUCT_DESCRIPTION}}', 
            '{{PRODUCT_PAPER_TYPE}}', '{{PRODUCT_SIZE}}', '{{PRODUCT_FINISH}}', '{{PRODUCT_SHIPPING_TIME}}', 
            '{{FEATURE_1}}', '{{FEATURE_2}}', '{{FEATURE_3}}', '{{PRODUCT_URL}}'
        ],
        [
            $product->name, $category, $product->slug, $product->description, 
            $product->paper_type ?? 'N/A', $product->size ?? 'N/A', $product->finish ?? 'N/A', $product->shipping_time ?? 'N/A',
            'Feature 1', 'Feature 2', 'Feature 3', $url
        ],
        $template
    );
}

// Create directory if it doesn't exist
function createDirectory($path) {
    if (!is_dir($path)) {
        mkdir($path, 0755, true);
        echo "Created directory: $path\n";
    }
}

// Create or overwrite a Blade file
function createBladeFile($path, $fileName, $content) {
    $filePath = $path . '/' . $fileName . '.blade.php';

    // Delete the old file if it exists to avoid duplicates
    if (file_exists($filePath)) {
        unlink($filePath);
        echo "Deleted existing file: $filePath\n";
    }

    // Create the new Blade file with the updated content
    if ($content) {
        file_put_contents($filePath, $content);
        echo "Created Blade file: $filePath\n";
    } else {
        echo "No content for: $fileName. Skipping file creation.\n";
    }
}

// Loop through categories and create directories and Blade files based on product data
foreach ($categories as $category) {
    $categoryPath = $basePath . '/' . $category->slug;  // Use the category slug
    createDirectory($categoryPath);

    // Loop through subcategories of the current category
    foreach ($category->subcategories as $subcategory) {
        $subcategoryPath = $categoryPath . '/' . $subcategory->slug;  // Use the subcategory slug
        createDirectory($subcategoryPath);

        // Loop through products in the current subcategory
        foreach ($subcategory->products as $product) {
            // Create URL for the product
            $url = "{$baseUrl}{$category->slug}/{$product->slug}";
            
            // Generate content for the product's Blade file
            $content = replacePlaceholders($template, $category->slug, $product->slug, $url);  // Use correct category slug
            createBladeFile($subcategoryPath, $product->slug, $content);  // Use correct product slug
        }
    }

    // If the category itself has products directly associated
    foreach ($category->products as $product) {
        // Create URL for the product
        $url = "{$baseUrl}{$category->slug}/{$product->slug}";
        
        // Generate content for the product's Blade file
        $content = replacePlaceholders($template, $category->slug, $product->slug, $url);  // Use correct category slug
        createBladeFile($categoryPath, $product->slug, $content);  // Use correct product slug
    }
}

echo "Blade file creation with product data and route URLs completed!\n";
