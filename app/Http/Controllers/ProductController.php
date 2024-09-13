<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\SinaliteService;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Exception;

class ProductController extends Controller
{
    protected $sinaliteService;

    public function __construct(SinaliteService $sinaliteService)
    {
        $this->sinaliteService = $sinaliteService;
    }

    /**
     * Sync products from the Sinalite API into the database.
     * Inserts new products and updates existing ones.
     */
    public function syncProducts()
    {
        try {
            // Fetch products from Sinalite API
            $products = $this->sinaliteService->getProducts();

            foreach ($products as $apiProduct) {
                // Check if the product exists in the database using the SKU
                $existingProduct = Product::where('sku', $apiProduct['sku'])->first();

                if ($existingProduct) {
                    // Update the existing product
                    $existingProduct->update([
                        'name' => $apiProduct['name'],
                        'price' => $apiProduct['price'] ?? null, // Update price if it exists in the API data
                        'category' => $apiProduct['category'],  // Ensure your Product model has the relevant fields
                        'enabled' => $apiProduct['enabled'],
                        'updated_at' => now(), // Optional: Update the timestamp
                    ]);

                    Log::info('Product updated: ' . $existingProduct->name);
                } else {
                    // Insert new product
                    Product::create([
                        'sku' => $apiProduct['sku'],
                        'name' => $apiProduct['name'],
                        'price' => $apiProduct['price'] ?? null,
                        'category' => $apiProduct['category'],
                        'enabled' => $apiProduct['enabled'],
                        'created_at' => now(), // Set the timestamp
                        'updated_at' => now(),
                    ]);

                    Log::info('New product inserted: ' . $apiProduct['name']);
                }
            }

            Log::info('Product synchronization completed successfully.');

            return redirect()->route('catalog.index')->with('success', 'Products synchronized successfully.');
        } catch (Exception $e) {
            // Log the error
            Log::error('Failed to sync products: ' . $e->getMessage());

            return redirect()->route('catalog.index')->with('error', 'Product synchronization failed.');
        }
    }

    /**
     * Display the product based on the slug.
     */
    public function show($slug)
    {
        Log::info('Trying to find product with slug: ' . $slug);

        // Find the product by its slug
        $product = Product::where('slug', $slug)->first();

        if (!$product) {
            Log::error('Product not found: ' . $slug);
            abort(404);
        }

        Log::info('Product found: ' . $product->name);

        return view('product.show', compact('product'));
        
    }

    /**
     * Display all products.
     */
    public function index()
    {
        $products = Product::all(); // Fetch all products
        return view('catalog.index', compact('products'));
    }
}
