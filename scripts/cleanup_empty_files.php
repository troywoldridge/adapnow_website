<?php

// Paths to check
$bladeFilesPath = '/home/troy/adap_now-website/resources/views/products/';
$publicImagesPath = '/home/troy/adap_now-website/public/images/';
$extensions = ['blade.php', 'jpg', 'jpeg', 'png']; // Files to check

// Function to find and delete empty files
function deleteEmptyFiles($directory, $extensions) {
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));

    foreach ($files as $file) {
        if ($file->isFile() && in_array($file->getExtension(), $extensions)) {
            if (filesize($file->getPathname()) === 0) {
                // Delete empty file
                unlink($file->getPathname());
                echo "Deleted empty file: " . $file->getPathname() . PHP_EOL;
            }
        }
    }
}

// Function to find unused images
function findUnusedImages($bladeFilesPath, $publicImagesPath) {
    $bladeFiles = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($bladeFilesPath));
    $imagePaths = [];

    foreach ($bladeFiles as $bladeFile) {
        if ($bladeFile->isFile() && $bladeFile->getExtension() === 'php') {
            // Read Blade file contents
            $contents = file_get_contents($bladeFile->getPathname());
            preg_match_all('/{{\s*asset\(\'(.*?)\'\)\s*}}/', $contents, $matches);

            // Collect image paths
            if (isset($matches[1])) {
                foreach ($matches[1] as $imagePath) {
                    $imagePaths[] = $publicImagesPath . basename($imagePath);
                }
            }
        }
    }

    // Search for unused images
    $publicImages = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($publicImagesPath));
    foreach ($publicImages as $publicImage) {
        if ($publicImage->isFile() && in_array($publicImage->getExtension(), ['jpg', 'jpeg', 'png'])) {
            if (!in_array($publicImage->getPathname(), $imagePaths)) {
                echo "Unused image: " . $publicImage->getPathname() . PHP_EOL;
            }
        }
    }
}

// Delete empty Blade files and images
deleteEmptyFiles($bladeFilesPath, $extensions);

// Find and list unused images
findUnusedImages($bladeFilesPath, $publicImagesPath);

echo "Cleanup and analysis completed.\n";

?>
