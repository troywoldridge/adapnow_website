<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class CatalogController extends Controller
{
    public function index()
    {
        // Fetch all categories
        $categories = Category::all();
        return view('catalog.index', compact('categories'));
    }

    // Show all products in a category
    public function showCategory($category_slug)
    {
        // Fetch the category by slug
        $category = Category::where('slug', $category_slug)->firstOrFail();

        // Fetch products in that category
        $products = $category->products;

        // Log the product data
        Log::info('Products for category: ' . $category->name, $products->toArray());

        return view('catalog.category', compact('category', 'products'));
    }

    // Show a specific product in the category
    public function showProduct($category_slug, $product_slug)
    {
        // Fetch the category by slug
        $category = Category::where('slug', $category_slug)->firstOrFail();

        // Fetch the product by slug and category
        $product = Product::where('slug', $product_slug)
            ->where('category_id', $category->id)
            ->firstOrFail();

        // Log product access
        Log::info('Product viewed: ' . $product->name);

        return view('product.show', compact('product'));
    }
}
