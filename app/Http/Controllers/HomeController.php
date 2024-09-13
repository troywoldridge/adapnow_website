<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        try {
            // Fetch featured products along with their category
            // Assuming 'is_featured' is a field in the products table
            $featuredProducts = Product::with('category')
                ->where('is_featured', true) // Filter by featured products
                ->take(4) // Limit to 4 products
                ->get();
    
            // Fetch all categories with their subcategories for the navbar or other views
            $categories = Category::with('subcategories')->get();
    
            // Pass the fetched data to the view
            return view('home', [
                'featuredProducts' => $featuredProducts,
                'categories' => $categories
            ]);
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Error loading homepage: ' . $e->getMessage());
    
            // Return an empty array or custom error message to the view
            return view('home', [
                'featuredProducts' => [], // Empty list if an error occurs
                'categories' => [], // Empty list if an error occurs
                'error' => 'Failed to load the homepage. Please try again later.'
            ]);
        }
    }
}
