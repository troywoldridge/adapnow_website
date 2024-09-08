<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Ensure this model is imported
use App\Models\Category; // Ensure this model is imported

class HomeController extends Controller
{
    // Home Page View
    public function index()
    {
        try {
            // Fetch the featured products - you may need to adjust this based on your logic
            $featuredProducts = Product::where('is_featured', true)->take(4)->get();

            // Fetch the categories if needed for additional data in dropdowns
            $categories = Category::all();

            // Pass the fetched data to the view
            return view('home', [
                'featuredProducts' => $featuredProducts,
                'categories' => $categories, // Pass if dropdowns require category data
            ]);
        } catch (\Exception $e) {
            // Log the error if something goes wrong
            \Log::error('Error loading homepage: ' . $e->getMessage());
            return view('home', [
                'featuredProducts' => [],
                'categories' => [],
                'error' => 'Failed to load the homepage.'
            ]);
        }
    }
}
