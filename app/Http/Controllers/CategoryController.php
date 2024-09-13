<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Show a category and its products.
     *
     * @param  string  $category_slug
     * @return \Illuminate\Http\Response
     */
    public function show($category_slug)
    {
        // Find the category by its slug
        $category = Category::where('slug', $category_slug)->firstOrFail();

        // Get products for this category
        $products = $category->products;

        // Log for debugging
        Log::info('Displaying products for category: ' . $category->name, ['products' => $products->pluck('name')]);

        // Return the view with the category and products
        return view('categories.show', compact('category', 'products'));
    }

    /**
     * Show a subcategory and its products.
     *
     * @param  string  $category_slug
     * @param  string  $subcategory_slug
     * @return \Illuminate\Http\Response
     */
    public function showSubcategory($category_slug, $subcategory_slug)
    {
        // Find the parent category
        $category = Category::where('slug', $category_slug)->firstOrFail();

        // Find the subcategory by slug under the parent category
        $subcategory = Category::where('slug', $subcategory_slug)
            ->where('parent_id', $category->id)
            ->firstOrFail();

        // Get products for this subcategory
        $products = $subcategory->products;

        // Log for debugging
        Log::info('Displaying products for subcategory: ' . $subcategory->name, ['products' => $products->pluck('name')]);

        // Return the view with the subcategory and products
        return view('categories.subcategory', compact('category', 'subcategory', 'products'));
    }
}
