<?php

namespace App\Http\Controllers;

use App\Services\SinaliteService;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Routing\Controller as BaseController;

class ProductController extends BaseController

{
    protected $sinaliteService;

    public function __construct(SinaliteService $sinaliteService)
    {
        $this->sinaliteService = $sinaliteService;
    }

    public function index(Request $request): View
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
}
