<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSet;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Exception;

class ProductController extends Controller
{
    /**
     * Sync products from the DBeaver database into the application database.
     * Inserts new products and updates existing ones.
     */
    public function syncProducts()
    {
        try {
            // Assuming we are fetching products from a local database (e.g., DBeaver-connected SQLite)
            $products = Product::all();  // Fetch products directly from the database

            foreach ($products as $dbProduct) {
                // Check if the product exists in the application database using the SKU
                $existingProduct = Product::where('sku', $dbProduct->sku)->first();

                if ($existingProduct) {
                    // Update the existing product
                    $existingProduct->update([
                        'name' => $dbProduct->name,
                        'price' => $dbProduct->price,
                        'category' => $dbProduct->category,
                        'enabled' => $dbProduct->enabled,
                        'updated_at' => now(),  // Update timestamp
                    ]);

                    Log::info('Product updated: ' . $existingProduct->name);
                } else {
                    // Insert new product
                    Product::create([
                        'sku' => $dbProduct->sku,
                        'name' => $dbProduct->name,
                        'price' => $dbProduct->price,
                        'category' => $dbProduct->category,
                        'enabled' => $dbProduct->enabled,
                        'created_at' => now(),  // Set timestamp
                        'updated_at' => now(),
                    ]);

                    Log::info('New product inserted: ' . $dbProduct->name);
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
     * Display the product based on category_slug and product_slug.
     * Also shows set choices (1-20) if available.
     */
    

    /**
     * Display all products.
     */
    public function index()
    {
        $products = Product::all();  // Fetch all products
        return view('catalog.index', compact('products'));
    }

    public function show($category_slug, $product_slug)
{
    Log::info('Trying to find product with slug: ' . $product_slug);

    // Find the product by its slug
    $product = Product::where('slug', $product_slug)->first();

    if (!$product) {
        Log::error('Product not found: ' . $product_slug);
        abort(404);
    }

    // Fetch the set choices for the product
    $setChoices = ProductSet::where('product_id', $product->id)->pluck('set_choice');

    Log::info('Product found: ' . $product->name);

    return view('product.show', compact('product', 'setChoices'));
}


   

}
