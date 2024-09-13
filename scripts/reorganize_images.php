<?php

// Bootstrapping Laravel
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Paths
$publicImagesPath = '/home/troy/adap_now-website/public/images/';
$organizedImagesPath = '/home/troy/Pictures/Organized_Adap_Images/';
$extensions = ['png', 'jpg', 'jpeg'];

// Function to move a file to the correct directory
function moveFile($source, $destination) {
    if (!file_exists($destination)) {
        mkdir(dirname($destination), 0777, true);
    }
    if (!file_exists($destination . basename($source))) {
        rename($source, $destination . basename($source));
        echo "Moved: " . $source . " to " . $destination . "\n";
    }
}

// Function to find image
function findImage($categoryDir, $slug, $extensions) {
    foreach ($extensions as $ext) {
        $imagePath = "{$categoryDir}{$slug}.{$ext}";
        if (file_exists($imagePath)) {
            return $imagePath;
        }
    }
    return false;
}

// Load products from the database
$products = \App\Models\Product::with('category', 'subcategory')->get();

foreach ($products as $product) {
    $categorySlug = $product->category->slug;
    $subcategorySlug = $product->subcategory ? $product->subcategory->slug : '';
    $productSlug = $product->slug;

    // Define correct paths
    $correctImageDir = $publicImagesPath . $categorySlug . '/';
    if (!empty($subcategorySlug)) {
        $correctImageDir .= $subcategorySlug . '/';
    }

    // Check in public images first
    $imagePath = findImage($correctImageDir, $productSlug, $extensions);

    // If not found in public images, check in the organized folder
    if (!$imagePath) {
        $organizedImagePath = findImage($organizedImagesPath . $categorySlug . '/', $productSlug, $extensions);
        if ($organizedImagePath) {
            moveFile($organizedImagePath, $correctImageDir);
        } else {
            echo "Image not found for product: " . $productSlug . "\n";
        }
    } else {
        echo "Image already exists for product: " . $productSlug . "\n";
    }
}

// Clean up unused images
$allPublicImages = glob($publicImagesPath . '*/*.{jpg,jpeg,png}', GLOB_BRACE);
$usedImages = [];

foreach ($products as $product) {
    $usedImages[] = $correctImageDir . $product->slug . '.png';
    $usedImages[] = $correctImageDir . $product->slug . '.jpg';
    $usedImages[] = $correctImageDir . $product->slug . '.jpeg';
}

foreach ($allPublicImages as $publicImage) {
    if (!in_array($publicImage, $usedImages)) {
        echo "Deleting unused image: " . $publicImage . "\n";
        unlink($publicImage);
    }
}

echo "Image reorganization and cleanup completed.\n";

?>
