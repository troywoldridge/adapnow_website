<?php

// Bootstrap Laravel
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Product; // Ensure this path is correct

// Define paths
$publicImagesPath = '/home/troy/adap_now-website/public/images/';
$bladeFilesPath = '/home/troy/adap_now-website/resources/views/products/';
$organizedImagesPath = '/home/troy/Pictures/Organized_Adap_Images/';
$defaultImagesPath = $publicImagesPath . 'defaults/';
$extensions = ['png', 'jpg', 'jpeg'];

// Function to move a file to the correct directory
function moveFile($source, $destination) {
    if (!file_exists($destination)) {
        mkdir(dirname($destination), 0777, true);
    }
    rename($source, $destination);
}

// Function to find image by category
function findImage($categoryDir, $slug, $extensions, $fallbackDir) {
    foreach ($extensions as $ext) {
        $imagePath = "{$categoryDir}{$slug}.{$ext}";
        if (file_exists($imagePath)) {
            return $imagePath;
        }
    }
    return $fallbackDir . 'fallback.png';
}

// Check if file is empty
function isEmptyFile($filePath) {
    return filesize($filePath) === 0;
}

// Scan Blade files and Images
$products = Product::with('category', 'subcategory')->get();

$log = '';
$emptyFiles = [];
$unusedFiles = [];

foreach ($products as $product) {
    $categorySlug = $product->category->slug;
    $subcategorySlug = $product->subcategory ? $product->subcategory->slug : null;
    $productSlug = $product->slug;

    // Define correct paths
    $correctBladeDir = $bladeFilesPath . $categorySlug . ($subcategorySlug ? "/$subcategorySlug" : '') . '/';
    $correctImageDir = $publicImagesPath . $categorySlug . '/';

    // Ensure Blade file is in the correct directory
    $correctBladeFile = $correctBladeDir . $productSlug . '.blade.php';
    $existingBladeFile = $bladeFilesPath . $productSlug . '.blade.php'; // Check if Blade file exists in root
    if (file_exists($existingBladeFile)) {
        moveFile($existingBladeFile, $correctBladeFile);
        $log .= "Moved Blade file for product {$productSlug} to {$correctBladeDir}\n";
    }

    // Check if the Blade file is empty
    if (file_exists($correctBladeFile) && isEmptyFile($correctBladeFile)) {
        $emptyFiles[] = $correctBladeFile; // Log empty files
    }

    // Ensure image is in the correct directory
    $imagePath = findImage($correctImageDir, $productSlug, $extensions, $defaultImagesPath . $categorySlug . '/');
    if ($imagePath !== $defaultImagesPath . $categorySlug . '/fallback.png') {
        // If image is found, move it
        $existingImage = $publicImagesPath . $productSlug . '.' . pathinfo($imagePath, PATHINFO_EXTENSION);
        if (file_exists($existingImage)) {
            moveFile($existingImage, $correctImageDir . basename($imagePath));
            $log .= "Moved image for product {$productSlug} to {$correctImageDir}\n";
        }
    } else {
        $log .= "Using fallback image for product {$productSlug}\n";
    }
}

// Check for any images or Blade files that are not associated with any product
$allBladeFiles = glob($bladeFilesPath . '*/*.blade.php');
foreach ($allBladeFiles as $bladeFile) {
    $bladeFileSlug = pathinfo($bladeFile, PATHINFO_FILENAME);
    if (!$products->contains('slug', $bladeFileSlug)) {
        $unusedFiles[] = $bladeFile; // Log unused Blade files
    }
}

$allImageFiles = glob($publicImagesPath . '*/*.{png,jpg,jpeg}', GLOB_BRACE);
foreach ($allImageFiles as $imageFile) {
    $imageFileSlug = pathinfo($imageFile, PATHINFO_FILENAME);
    if (!$products->contains('slug', $imageFileSlug)) {
        $unusedFiles[] = $imageFile; // Log unused image files
    }
}

// Log results
$log .= "Empty Blade files: \n" . implode("\n", $emptyFiles) . "\n";
$log .= "Unused files: \n" . implode("\n", $unusedFiles) . "\n";
file_put_contents('cleanup_log.txt', $log);

echo "Organization completed. Check cleanup_log.txt for details.\n";

