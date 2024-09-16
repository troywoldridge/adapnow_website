<?php 

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ApiTestController;
use App\Http\Controllers\ProductImportController;
use Illuminate\Support\Facades\Route;

// Home Page Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Category Page Route
Route::get('/category/{category_slug}', [CategoryController::class, 'show'])->name('category.show');

// Product Page Route (with optional subcategory)
Route::get('/category/{category_slug}/product/{product_slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/category/{category_slug}/{subcategory_slug}/{product_slug}', [ProductController::class, 'show'])->name('subcategory.product.show');

// Dashboard, Profile, and Authentication Middleware
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Test Products (for development purposes)
Route::get('/test-products', [ProductController::class, 'testProducts'])->name('products.test');

// SinaLite API Test Route
Route::get('/test-sinalite', [ApiTestController::class, 'testSinaliteConnection'])->name('test.sinalite');

// Catalog Route (showing all categories or products)
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');

// Catalog Category Route (showing products in a specific category)
Route::get('/catalog/{category_slug}', [CatalogController::class, 'showCategory'])->name('catalog.category');

// Catalog Product Route (showing a specific product within a category)
Route::get('/catalog/{category_slug}/product/{product_slug}', [CatalogController::class, 'showProduct'])->name('catalog.product');

// Sync Products Route
Route::get('/sync-products', [ProductController::class, 'syncProducts'])->name('sync.products');

// Import Products Route
Route::get('/import-products', [ProductImportController::class, 'importProducts']);

// Authentication routes
require __DIR__.'/auth.php';
