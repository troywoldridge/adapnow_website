<?php

// Bootstrap Laravel
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Define the products and their paths
$products = [
    // Mugs
    ['category' => 'promotional', 'subcategory' => 'mugs', 'slug' => '10oz-stainless-steel', 'name' => '10oz Stainless Steel Mug'],
    ['category' => 'promotional', 'subcategory' => 'mugs', 'slug' => '11oz', 'name' => '11oz Mug'],
    ['category' => 'promotional', 'subcategory' => 'mugs', 'slug' => '15oz', 'name' => '15oz Mug'],
    ['category' => 'promotional', 'subcategory' => 'mugs', 'slug' => '16oz-frosted-beer', 'name' => '16oz Frosted Beer Mug'],
    ['category' => 'promotional', 'subcategory' => 'mugs', 'slug' => '18oz-clear-beer-blade', 'name' => '18oz Clear Beer Mug'],

    // Mason Jars
    ['category' => 'promotional', 'subcategory' => 'mason-jars', 'slug' => 'clear-12oz', 'name' => 'Clear 12oz Mason Jar'],
    ['category' => 'promotional', 'subcategory' => 'mason-jars', 'slug' => 'frosted-12oz', 'name' => 'Frosted 12oz Mason Jar'],

    // Bottles
    ['category' => 'promotional', 'subcategory' => 'bottles', 'slug' => '17oz-stainless', 'name' => '17oz Stainless Steel Bottle'],

    // NCR Forms
    ['category' => 'stationary', 'subcategory' => 'ncr-forms', 'slug' => '3-part', 'name' => '3-Part NCR Form']
];

// Path variables
$destinationBaseDir = 'resources/views/products/';
$defaultImagePath = '/public/images/defaults/';
$extensions = ['png', 'jpg', 'jpeg']; // Supported image formats

// Function to find an image for each product, including fallbacks
function findProductImage($category, $slug, $fallbackDir, $extensions) {
    $imageDir = "/public/images/{$category}/";
    foreach ($extensions as $ext) {
        $imagePath = "{$imageDir}{$slug}.{$ext}";
        if (file_exists(base_path($imagePath))) {
            return $imagePath;
        }
    }
    return $fallbackDir . 'fallback.png';
}

foreach ($products as $product) {
    $categorySlug = $product['category'];
    $subcategorySlug = $product['subcategory'];
    $slug = $product['slug'];
    $name = $product['name'];

    // Define directory path
    $categoryDir = $destinationBaseDir . $categorySlug . '/' . $subcategorySlug . '/';

    // Check if directory exists, if not create it
    if (!file_exists($categoryDir)) {
        mkdir($categoryDir, 0777, true);
    }

    // Create the Blade file
    $fileName = $categoryDir . $slug . '.blade.php';
    $imagePath = findProductImage($categorySlug, $slug, $defaultImagePath, $extensions);

    // Blade template content populated dynamically
    $fileContent = "
@extends('layouts.main')

@section('content')
<div class=\"container\">
    <h1 class=\"my-4\">$name</h1>
    <div class=\"row\">
        <div class=\"col-md-6\">
            <img src=\"{{ asset('$imagePath') }}\" alt=\"$name\" class=\"img-fluid\">
        </div>
        <div class=\"col-md-6\">
            <h2>Description</h2>
            <p>Product description for $name goes here.</p>
            <ul>
                <li>Key Feature 1</li>
                <li>Key Feature 2</li>
                <li>More details as needed</li>
            </ul>
        </div>
    </div>

    <!-- Specifications Section -->
    <div class=\"row mt-5\">
        <div class=\"col-md-12\">
            <h2>Specifications</h2>
            <table class=\"table\">
                <tbody>
                    <tr>
                        <td>Material</td>
                        <td>Product Material</td>
                    </tr>
                    <tr>
                        <td>Size</td>
                        <td>Product Size</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pricing Section -->
    <div class=\"row mt-5\">
        <div class=\"col-md-12\">
            <h2>Pricing</h2>
            <a href=\"{{ route('showProduct', ['category' => '$categorySlug', 'productSlug' => '$slug']) }}\" class=\"btn btn-primary\">Order Now</a>
        </div>
    </div>

    <!-- Back Button -->
    <div class=\"row mt-5\">
        <div class=\"col-md-12 text-center\">
            <a href=\"{{ route('$categorySlug.index') }}\" class=\"btn btn-secondary\">Back to {$product['subcategory']}</a>
        </div>
    </div>
</div>
@endsection
";

    // Write the content to the Blade file
    file_put_contents($fileName, $fileContent);
    echo "Created: $fileName\n";
}

echo "All specific Blade files generated successfully!\n";
