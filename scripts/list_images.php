<?php

// Function to recursively scan directories
function listDirectoryContents($dir, &$results = []) {
    $files = scandir($dir);

    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
            $results[] = $path;
        } else if ($value != "." && $value != "..") {
            listDirectoryContents($path, $results);
        }
    }

    return $results;
}

// Define the base directory to scan
$baseDir = __DIR__ . '/../public/images'; // Adjust if needed

if (file_exists($baseDir)) {
    $files = listDirectoryContents($baseDir);

    // Output the list of files
    foreach ($files as $file) {
        echo $file . PHP_EOL;
    }
} else {
    echo "Directory not found: " . $baseDir;
}
