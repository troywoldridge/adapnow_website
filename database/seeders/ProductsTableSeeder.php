<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        // Load the CSV file generated from the Sinalite API or a local file
        $csvPath = base_path('scripts/updated_products.csv'); // Adjust this path to the real location

        try {
            $csv = Reader::createFromPath($csvPath, 'r');
            $csv->setHeaderOffset(0); // Assuming the first row is the header
            $records = $csv->getRecords(); // Fetch CSV records
        } catch (\Exception $e) {
            Log::error("Failed to read CSV file: " . $e->getMessage());
            return;
        }

        // Create a fallback category for products without a valid category
        $fallbackCategory = Category::firstOrCreate(
            ['slug' => 'uncategorized'],
            ['name' => 'Uncategorized', 'description' => 'Default category for uncategorized products']
        );

        // Iterate over CSV records and seed them into the products table
        foreach ($records as $record) {
            // Fetch or create the category
            $category = Category::where('slug', $record['category_slug'])->first();

            if (!$category) {
                $this->command->warn("Category '{$record['category_slug']}' not found. Assigning to 'Uncategorized'.");
                $category = $fallbackCategory;
            }

            // Construct the image paths based on your folder structure
            $images = $this->findImages($record['category_slug'], $record['slug']);

            if (empty($images)) {
                Log::warning("No images found for product: " . $record['slug']);
            } else {
                Log::info("Images found for product {$record['slug']}: " . implode(", ", $images));
            }

            // Insert or update the product
            Product::updateOrCreate(
                ['slug' => $record['slug']], // Use the slug to update if the product already exists
                [
                    'category_id' => $category->id,
                    'name' => $record['name'],
                    'description' => $record['description'] ?? 'No description available',
                    'price' => $record['price'] ?? 0.00, // Set default price if missing
                    'sku' => $record['sku'] ?? null,
                    'image' => $images[0] ?? null, // Insert the first image as the main one
                    'image_2' => $images[1] ?? null,
                    'image_3' => $images[2] ?? null,
                    'image_4' => $images[3] ?? null,
                    'image_5' => $images[4] ?? null,
                    'created_at' => $record['created_at'] ?? now(),
                    'updated_at' => $record['updated_at'] ?? now(),
                ]
            );

            Log::info("Product '{$record['name']}' has been added or updated with images.");
        }
    }

    /**
     * Find up to 5 images in the appropriate directory based on the category and product slug.
     * @param string $categorySlug
     * @param string $productSlug
     * @return array
     */
    private function findImages($categorySlug, $productSlug)
    {
        // Parse the image paths from the text file
        $filePath = base_path('image_paths.txt'); // Adjust path if needed
        $imagePaths = $this->parseImagePaths($filePath);

        // Return an array of up to 5 image paths
        return $imagePaths[$categorySlug][$productSlug] ?? [];
    }

    /**
     * Parse the image paths from a text file.
     * @param string $filePath
     * @return array
     */
    private function parseImagePaths($filePath)
    {
        $imagePaths = [];
        $lines = file($filePath, FILE_IGNORE_NEW_LINES);

        foreach ($lines as $line) {
            // Extract the category and product slug from the path
            // Assuming the structure is: public/images/{category}/{slug}.{extension}
            $parts = explode('/', $line);
            $categorySlug = $parts[2] ?? null;
            $fileName = end($parts);
            $productSlug = pathinfo($fileName, PATHINFO_FILENAME);

            if ($categorySlug && $productSlug) {
                $imagePaths[$categorySlug][$productSlug][] = $line;
            }
        }

        return $imagePaths;
    }
}
