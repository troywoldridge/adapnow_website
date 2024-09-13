// Path variables and image extensions
$publicImagesPath = '/home/troy/adap_now-website/public/images/';
$organizedImagesPath = '/home/troy/Pictures/Organized_Adap_Images/';
$defaultImagesPath = '/home/troy/adap_now-website/public/images/defaults/';
$extensions = ['png', 'jpg', 'jpeg']; // Allow multiple extensions

// Function to find an image
function findImage($categoryDir, $slug, $extensions, $fallbackDir) {
    foreach ($extensions as $ext) {
        $imagePath = "{$categoryDir}{$slug}.{$ext}";
        if (file_exists($imagePath)) {
            return $imagePath;
        }
    }
    // If no image found, use fallback
    return $fallbackDir . 'fallback.png';
}

foreach ($products as $product) {
    $categorySlug = $product->category->slug; // Use category slug
    $slug = $product->slug; // Use product slug

    // Check if product image exists in public images
    $categoryDir = $publicImagesPath . $categorySlug . '/';
    $organizedCategoryDir = $organizedImagesPath . $categorySlug . '/';
    
    $imagePath = findImage($categoryDir, $slug, $extensions, $defaultImagesPath . $categorySlug . '/');
    
    if (!file_exists($imagePath)) {
        // If image not found in public, check in the organized folder
        $imagePath = findImage($organizedCategoryDir, $slug, $extensions, $defaultImagesPath . $categorySlug . '/');
    }

    // Now use $imagePath in your Blade template or log it
    $this->command->info("Image path used for {$slug}: {$imagePath}");
}
