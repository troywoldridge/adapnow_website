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

// Additional Routes for Specific Categories
Route::prefix('business-cards')->group(function () {
    Route::get('/', [CatalogController::class, 'showCategory'])->name('business-cards.index');
    Route::get('/{product}', [CatalogController::class, 'showProduct'])->name('business-cards.product');
});

Route::prefix('print-products')->group(function () {
    Route::get('/', [CatalogController::class, 'showCategory'])->name('print-products.index');
    Route::get('/{product}', [CatalogController::class, 'showProduct'])->name('print-products.product');
});

Route::prefix('large-format')->group(function () {
    Route::get('/', [CatalogController::class, 'showCategory'])->name('large-format.index');
    Route::get('/{product}', [CatalogController::class, 'showProduct'])->name('large-format.product');
});

Route::prefix('stationery')->group(function () {
    Route::get('/', [CatalogController::class, 'showCategory'])->name('stationery.index');
    Route::get('/{product}', [CatalogController::class, 'showProduct'])->name('stationery.product');
});

Route::prefix('promotional')->group(function () {
    Route::get('/', [CatalogController::class, 'showCategory'])->name('promotional.index');
    Route::get('/{product}', [CatalogController::class, 'showProduct'])->name('promotional.product');
});

Route::prefix('labels-and-packaging')->group(function () {
    Route::get('/', [CatalogController::class, 'showCategory'])->name('labels-and-packaging.index');
    Route::get('/{product}', [CatalogController::class, 'showProduct'])->name('labels-and-packaging.product');
});

Route::prefix('apparel')->group(function () {
    Route::get('/', [CatalogController::class, 'showCategory'])->name('apparel.index');
    Route::get('/{product}', [CatalogController::class, 'showProduct'])->name('apparel.product');
});

// Dynamic Shipping Estimate Route
Route::post('/shipping-estimate', [ShippingController::class, 'getShippingEstimate'])->name('shipping.estimate');

// About Us Route
Route::view('/about-us', 'pages.about')->name('about-us');

// Contact Us Route
Route::view('/contact-us', 'pages.contact')->name('contact-us');

// Checkout and Cart Routes (if needed)
Route::get('/cart', [ProductController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/add/{product}', [ProductController::class, 'addToCart'])->name('cart.add');
Route::post('/checkout', [ProductController::class, 'checkout'])->name('checkout');

// Error or 404 Routes
Route::fallback(function () {
    return view('errors.404');
})->name('error.404');
