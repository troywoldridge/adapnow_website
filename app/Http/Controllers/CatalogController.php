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
        return view('catalog.category', compact('category', 'products'));
    }

    public function showProduct(Category $category, $productSlug = null)
    {
        // Construct the view path based on the category and product slug
        $viewPath = 'catalog.' . strtolower($category->slug) . '.' . strtolower($productSlug);
    
        // Check if the view exists before returning it
        if (view()->exists($viewPath)) {
            return view($viewPath, compact('category', 'productSlug'));
        }
    
        // If the view doesn't exist, throw a 404 or redirect to an error page
        return abort(404, 'Product not found');
    }
}
