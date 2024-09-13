<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class CatalogController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('catalog.index', compact('categories'));
    }

    public function showCategory(Category $category)
    {
        $products = $category->products;

        // Log the product data to the log file
        Log::info('Products for category: ' . $category->name, $products->toArray());

        return view('catalog.category', compact('category', 'products'));
    }

    /**
     * Show product details based on category and product slug.
     */
    public function showProduct($category, $productSlug)
    {
        // Find the category by slug
        $category = Category::where('slug', $category)->firstOrFail();

        // Find the product by slug and ensure it belongs to the correct category
        $product = Product::where('slug', $productSlug)->where('category_id', $category->id)->firstOrFail();

        // Log product access
        Log::info('Product viewed: ' . $product->name);

        // Return the view with the product details
        return view('product.show', compact('product'));
    }
}
