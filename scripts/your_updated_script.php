<?php

// Bootstrap Laravel
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Product;

// Get all products with their category and subcategory
$products = Product::with('category', 'subcategory')->get(); 

// Define the base directory for the generated blade files
$destinationBaseDir = 'resources/views/products/';

// Check if the destination base folder exists, if not, create it
if (!file_exists($destinationBaseDir)) {
    mkdir($destinationBaseDir, 0777, true);
}

foreach ($products as $product) {
    // Construct the destination path for each product based on its category and subcategory
    $categorySlug = $product->category->slug; // Use category slug
    $subcategorySlug = $product->subcategory ? $product->subcategory->slug : null; // Use subcategory slug if exists
    
    // Set up the category directory
    $categoryDir = $destinationBaseDir . $categorySlug . '/';
    
    // If subcategory exists, include it in the directory path
    if ($subcategorySlug) {
        $categoryDir .= $subcategorySlug . '/';
    }

    // Check if the category (and subcategory) directories exist, if not, create them
    if (!file_exists($categoryDir)) {
        mkdir($categoryDir, 0777, true);
    }

    // Dynamically generate the Blade file name based on the product's slug
    $fileName = $categoryDir . $product->slug . '.blade.php';
    
    // Blade template content populated dynamically
    $fileContent = "
@extends('layouts.main')

@section('content')
<div class=\"container\">
    <h1 class=\"my-4\">{$product->name}</h1>
    <p>{$product->description}</p>

    <!-- Description Section -->
    <div class=\"row\">
        <div class=\"col-md-6\">
            <img src=\"{{ asset('images/{$categorySlug}/{$subcategorySlug}/' . \$product->slug . '.png') }}\" alt=\"{{ \$product->name }}\" class=\"img-fluid\">
        </div>
        <div class=\"col-md-6\">
            <h2>Description</h2>
            <p>{$product->description}</p>
            <ul>
                <li>Example Feature 1</li>
                <li>Example Feature 2</li>
                <li>Example Feature 3</li>
            </ul>
        </div>
    </div>

    <!-- Specifications -->
    <div class=\"row mt-5\">
        <div class=\"col-md-12\">
            <h2>Specifications</h2>
            <table class=\"table\">
                <thead>
                    <tr>
                        <th>Feature</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Paper Type</td>
                        <td>Description of the paper type for this product</td>
                    </tr>
                    <tr>
                        <td>Color</td>
                        <td>CMYK and White</td>
                    </tr>
                    <tr>
                        <td>Quantity</td>
                        <td>Ranges from 25 to 50,000</td>
                    </tr>
                    <tr>
                        <td>Printing Method</td>
                        <td>High-resolution digital printing</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pricing Section -->
    <div class=\"row mt-5\">
        <div class=\"col-md-12\">
            <h2>Pricing</h2>
            <a href=\"{{ route('showProduct', ['category' => '{$categorySlug}', 'productSlug' => \$product->slug]) }}\" class=\"btn btn-primary\">Order Now</a>
        </div>
    </div>

    <!-- Back Button -->
    <div class=\"row mt-5\">
        <div class=\"col-md-12 text-center\">
            <a href=\"{{ route('{$categorySlug}.index') }}\" class=\"btn btn-secondary\">Back to {$product->category->name}</a>
        </div>
    </div>
</div>
@endsection
";

    // Write the content to the file
    file_put_contents($fileName, $fileContent);
    echo "Created Blade file: $fileName\n";
}

echo "All Blade files generated and organized successfully!\n";

