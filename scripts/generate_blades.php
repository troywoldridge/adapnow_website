<?php

use App\Models\Product;
use Illuminate\Support\Str;

// Define the base path for Blade templates
$basePath = resource_path('views/products');  // Correct base path

// Template structure with placeholders for product and category
$template = <<<EOT
@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">{{PRODUCT_NAME}}</h1>
    
    <!-- Description Section -->
    <div class="row">
        <div class="col-md-6">
            <img src="/images/{{CATEGORY_SLUG}}/{{PRODUCT_SLUG}}.png" alt="{{PRODUCT_NAME}}" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2>Description</h2>
            <p>{{PRODUCT_DESCRIPTION}}</p>
            <ul>
                <li>Feature 1</li>
                <li>Feature 2</li>
                <li>Feature 3</li>
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
            <p>Price: {{PRODUCT_PRICE}}</p>
            <a href="{{ route('product.show', ['category' => '{{CATEGORY_SLUG}}', 'productSlug' => '{{PRODUCT_SLUG}}']) }}" class="btn btn-primary">Order Now</a>
        </div>
    </div>

    <!-- Back Button -->
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <a href="{{ route('catalog.index') }}" class="btn btn-secondary">Back to Catalog</a>
        </div>
    </div>
</div>
@endsection
EOT;

// Function to replace placeholders in the template
function replacePlaceholders($template, $category, $product)
{
    $productName = $product->name ?: 'Unnamed Product';
    $productSlug = $product->slug ?: Str::slug($product->name);
    $categorySlug = $category->slug ?: 'uncategorized';
    $productDescription = $product->description ?: 'Description not available.';
    $productPrice = $product->price ?: '0.00';  // Placeholder for price
    $productPaperType = 'Paper type information not available';  // Placeholder for paper type
    $productSize = 'Size information not available';  // Placeholder for size
    $productFinish = 'Finish information not available';  // Placeholder for finish
    $productShippingTime = 'Shipping time information not available';  // Placeholder for shipping time

    return str_replace(
        ['{{PRODUCT_NAME}}', '{{CATEGORY_SLUG}}', '{{PRODUCT_SLUG}}', '{{PRODUCT_DESCRIPTION}}', '{{PRODUCT_PRICE}}', '{{PRODUCT_PAPER_TYPE}}', '{{PRODUCT_SIZE}}', '{{PRODUCT_FINISH}}', '{{PRODUCT_SHIPPING_TIME}}'],
        [$productName, $categorySlug, $productSlug, $productDescription, $productPrice, $productPaperType, $productSize, $productFinish, $productShippingTime],
        $template
    );
}

// Create helper functions
function createDirectory($path)
{
    if (!is_dir($path)) {
        mkdir($path, 0755, true);
        echo "Created directory: $path\n";
    }
}

function createBladeFile($path, $fileName, $content)
{
    $filePath = $path . '/' . $fileName . '.blade.php';

    // Check if the file already exists; if so, update it
    if (file_exists($filePath)) {
        echo "Updating existing file: $filePath\n";
    } else {
        echo "Creating new file: $filePath\n";
    }

    // Create or update the Blade file with the content
    file_put_contents($filePath, $content);
}

// Retrieve all products from the database
$products = Product::with('category')->get();

foreach ($products as $product) {
    $category = $product->category ?: 'uncategorized'; // Fallback to uncategorized if category is missing
    $categorySlug = $category->slug ?: 'uncategorized';

    // Define the directory path for the category
    $categoryPath = $basePath . '/' . $categorySlug;
    createDirectory($categoryPath);

    // Replace placeholders in the template with product details
    $content = replacePlaceholders($template, $category, $product);

    // Create or update the Blade file for the product
    createBladeFile($categoryPath, $product->slug, $content);
}

echo "Blade file generation and updates completed successfully!\n";
