<?php

// Paths
$sourceDir = '/home/troy/Pictures/Organized_Adap_Images/';
$destinationDir = '/home/troy/adap_now-website/public/images/';
$extensions = ['jpg', 'jpeg', 'png']; // Define allowed extensions

// Function to rename and move files
function renameAndMoveImages($sourceDir, $destinationDir, $extensions) {
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($sourceDir, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($iterator as $file) {
        if ($file->isFile() && in_array($file->getExtension(), $extensions)) {
            // Extract category and slug from the directory structure
            $subPath = str_replace($sourceDir, '', $file->getPath()); // Remove the base path
            $categorySlug = basename($subPath); // Category is the last part of the directory path
            $slug = pathinfo($file->getFilename(), PATHINFO_FILENAME); // Slug is the file name without extension

            // Construct the new file name based on category and slug
            $newFileName = "{$categorySlug}-{$slug}.{$file->getExtension()}";

            // Create the destination directory if it doesn't exist
            if (!is_dir($destinationDir)) {
                mkdir($destinationDir, 0777, true);
            }

            // Move and rename the image
            $newFilePath = $destinationDir . $newFileName;
            if (rename($file->getPathname(), $newFilePath)) {
                echo "Moved and renamed: {$file->getPathname()} -> {$newFilePath}\n";
            } else {
                echo "Failed to move: {$file->getPathname()}\n";
            }
        }
    }
}

// Run the function
renameAndMoveImages($sourceDir, $destinationDir, $extensions);

echo "Image renaming and reorganization completed.\n";

?>
