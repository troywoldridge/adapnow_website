<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;
use App\Models\Product;

class CleanCategoriesAndFixProducts extends Command
{
    protected $signature = 'clean:categories-products';
    protected $description = 'Clean up categories and fix product associations';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Starting to clean categories and fix product associations...');
    
        // Step 1: Remove any categories that are not supposed to be categories
        $correctCategoryNames = [
            'Business Cards', 'Print Products', 'Large Format', 'Stationary',
            'Promotional', 'Labels & Packaging', 'Apparel'
        ];
    
        // Delete categories that don't match the correct ones
        Category::whereNotIn('name', $correctCategoryNames)->delete();
        $this->info('Deleted incorrect categories.');
    
        // Step 2: Remove categories with suffixes (e.g., "Business Cards-7")
        foreach ($correctCategoryNames as $name) {
            Category::where('name', 'like', $name . '-%')->delete();
        }
        $this->info('Deleted categories with numeric suffixes.');
    
        // Step 3: Ensure that products are associated with the correct category
        $categories = Category::all()->pluck('id', 'name')->toArray();
    
        $products = Product::all();
    
        foreach ($products as $product) {
            // Find the category name from product slug and assign parent category
            $categoryName = $this->findCategoryForProduct($product->slug);
            if ($categoryName && isset($categories[$categoryName])) {
                $product->category_id = $categories[$categoryName];
                $product->save();
            }
        }
    
        $this->info('Product associations fixed.');
    }


    private function findCategoryForProduct($slug)
    {
        // Define which product slugs belong to which categories
        $categoryMap = [
            'business-cards' => 'Business Cards',
            'flyers' => 'Print Products',
            'postcards' => 'Print Products',
            'banners' => 'Large Format',
            'notepads' => 'Stationary',
            'labels' => 'Labels & Packaging',
            't-shirts' => 'Apparel',
            'tank-tops' => 'Apparel',
            'hoodies' => 'Apparel',
            // Add more mappings as needed
        ];

        // Check for the matching category for the product
        foreach ($categoryMap as $partialSlug => $categoryName) {
            if (strpos($slug, $partialSlug) !== false) {
                return $categoryName;
            }
        }

        return null;
    }
}
