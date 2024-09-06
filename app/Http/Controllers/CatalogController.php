<?php 

namespace App\Http\Controllers;

use App\Services\SinaliteService;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controller as BaseController;

class CatalogController extends BaseController

{ 
    protected $sinaliteService;

    public function __construct(SinaliteService $sinaliteService)
    {
        $this->sinaliteService = $sinaliteService;
    }

    // Catalog homepage, displays categories
    public function index(): View
    {
        try {
            $categories = Category::all();
            return view('catalog.index', ['categories' => $categories]);
        } catch (\Exception $e) {
            Log::error('Failed to load categories: ' . $e->getMessage());
            return view('catalog.index', ['categories' => []])
                ->with('error', 'Failed to load categories.');
        }
    }

    // Show products in a category
    public function showCategory($category): View
    {
        try {
            $category = Category::where('slug', $category)->firstOrFail();
            $products = $this->sinaliteService->getProductsByCategory($category->id);
            return view('catalog.category', ['category' => $category, 'products' => $products]);
        } catch (\Exception $e) {
            Log::error('Failed to load products for category: ' . $e->getMessage());
            return view('catalog.category', ['category' => $category, 'products' => []])
                ->with('error', 'Failed to load products for this category.');
        }
    }

    // Show a specific product
    public function showProduct($category, $product): View
    {
        try {
            $category = Category::where('slug', $category)->firstOrFail();
            $product = Product::where('slug', $product)->firstOrFail();
            return view('catalog.product', ['category' => $category, 'product' => $product]);
        } catch (\Exception $e) {
            Log::error('Failed to load product details: ' . $e->getMessage());
            return view('catalog.product', ['category' => $category, 'product' => null])
                ->with('error', 'Failed to load product details.');
        }
    }
}
