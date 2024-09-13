<?php

// Define the base path for Blade templates
$basePath = __DIR__. '/../resources/views/products';  // Adjust the path as needed

// Define the categories and subcategories based on the navbar structure
$categories = [
    'business-cards' => [
        'best-value-business-cards' => [],
        'matte-business-cards' => ['14pt-matte-finish', '16pt-matte-finish'],
        'uv-high-gloss-business-cards' => ['14pt-uv', '16pt-uv'],
        'lamination-business-cards' => ['18pt-gloss-lamination', '18pt-matte-silk-lamination'],
        'aq-business-cards' => ['14pt-aq', '16pt-aq'],
        'writable-business-cards' => ['13pt-enviro-uncoated', '13pt-linen-uncoated', '14pt-writable-aq', '18pt-writable'],
        'specialty-business-cards' => [
            'metallic-foil', 'kraft-paper', 'durable', 'spot-uv', 'pearl-paper', 'die-cut', 'soft-touch', '32pt-painted-edge', 'ultra-smooth'
        ],
    ],
    'large-format' => [
        'banners' => ['matte-vinyl-banners', 'glossy-vinyl-banners', 'mesh-vinyl-banners', 'standard-pull-up-banners', 'premium-pull-up-banners', 'x-frame-banners'],
        'coroplast-signs' => ['4mm-coroplast', '6mm-coroplast', '8mm-coroplast', '10mm-coroplast'],
        'floor-graphics' => ['custom-floor-graphics', 'social-distancing-floor-graphics'],
        'table-covers' => ['6ft-table-covers', '8ft-table-covers'],
        // Other large format products here...
    ],
    // Add other categories as needed...
];

// Template structure with placeholders for product and category
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
            <p></p>
            <a href="{{ route('showProduct', ['category' => '{{CATEGORY}}', 'productSlug' => '{{PRODUCT_SLUG}}']) }}" class="btn btn-primary">Order Now</a> 
        </div>
    </div>

    <!-- Back Button -->
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <a href="{{ route('{{CATEGORY}}.index') }}" class="btn btn-secondary">Back to {{CATEGORY}}</a>
        </div>
    </div>
</div>
@endsection
EOT;

// Function to replace placeholders in the template
function replacePlaceholders($template, $category, $product) {
    $productName = ucwords(str_replace('-', ' ', $product));
    $productSlug = strtolower($product);

    return str_replace(
        ['{{PRODUCT_NAME}}', '{{CATEGORY}}', '{{PRODUCT_SLUG}}', '{{PRODUCT_DESCRIPTION}}', '{{PRODUCT_PAPER_TYPE}}', '{{PRODUCT_SIZE}}', '{{PRODUCT_FINISH}}', '{{PRODUCT_SHIPPING_TIME}}'],
        [$productName, $category, $productSlug, 'Product description here...', 'Paper type here...', 'Product size here...', 'Product finish here...', 'Shipping time here...'],
        $template
    );
}

// Create helper functions
function createDirectory($path) {
    if (!is_dir($path)) {
        mkdir($path, 0755, true);
        echo "Created directory: $path\n";
    }
}

function createBladeFile($path, $fileName, $content) {
    $filePath = $path . '/' . $fileName . '.blade.php';

    // Delete the old file if it exists to avoid duplicates
    if (file_exists($filePath)) {
        unlink($filePath);
        echo "Deleted existing file: $filePath\n";
    }

    // Create the new Blade file with the updated content
    file_put_contents($filePath, $content);
    echo "Created Blade file: $filePath\n";
}

// Loop through categories and create directories and Blade files
foreach ($categories as $category => $subcategories) {
    $categoryPath = $basePath . '/' . $category;
    createDirectory($categoryPath);

    foreach ($subcategories as $subcategory => $products) {
        if (is_array($products)) {
            $subcategoryPath = $categoryPath . '/' . $subcategory;
            createDirectory($subcategoryPath);

            foreach ($products as $product) {
                $content = replacePlaceholders($template, $category, $product);
                createBladeFile($subcategoryPath, $product, $content);
            }
        } else {
            $content = replacePlaceholders($template, $category, $subcategory);
            createBladeFile($categoryPath, $subcategory, $content);
        }
    }
}

echo "Blade file creation completed!\n";
