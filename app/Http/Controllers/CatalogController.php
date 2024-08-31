<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CatalogController extends Controller
{
    // This function handles the logic for the catalog page
    public function index()
    {
        // Fetch all categories with their subcategories and products
        $categories = Category::with('subcategories.products')->get();
        
        // Pass the categories data to the Blade view 'catalog'
        return view('catalog', compact('categories'));
    }
}
