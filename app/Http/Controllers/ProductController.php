<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\SinaliteService;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    protected $sinaliteService;

    public function __construct(SinaliteService $sinaliteService)
    {
        $this->sinaliteService = $sinaliteService;
    }

    public function index(): View
    {
        try {
            $products = $this->sinaliteService->getProducts();
            return view('products.index', ['products' => $products]);
        } catch (\Exception $e) {
            Log::error('Failed to retrieve products: ' . $e->getMessage());
            return view('products.index', ['products' => []])
                ->with('error', 'Failed to load products.');
        }
    }

    public function show($id): View
    {
        try {
            $product = Product::findOrFail($id);
            return view('products.show', ['product' => $product]);
        } catch (\Exception $e) {
            Log::error('Failed to load product details: ' . $e->getMessage());
            return view('products.show', ['product' => null])
                ->with('error', 'Failed to load product details.');
        }
    }
}
