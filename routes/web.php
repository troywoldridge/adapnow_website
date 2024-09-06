<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShippingController;
use Illuminate\Support\Facades\Route;

// Home Page Route (Catalog index)
Route::get('/', [CatalogController::class, 'index'])->name('catalog.index');

// Catalog Category Routes
Route::get('/catalog/{category}', [CatalogController::class, 'showCategory'])->name('category.show');
Route::get('/catalog/{category}/{product}', [CatalogController::class, 'showProduct'])->name('product.show');

// Product Routes (General product listing and details)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Shipping API Route
Route::post('/api/shipping-estimate', [ShippingController::class, 'getShippingEstimate'])->name('api.shipping.estimate');
