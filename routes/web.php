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

// Category and Subcategory Pages
Route::get('/category/{category_slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/category/{category_slug}/subcategory/{subcategory_slug}', [CategoryController::class, 'showSubcategory'])->name('subcategory.show');

// Product Pages within Category (Category slug and product slug in the URL)
Route::get('/category/{category_slug}/product/{product_slug}', [ProductController::class, 'show'])->name('product.show');

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

// SinaLite API Test Route (using ApiTestController)
Route::get('/test-sinalite', [ApiTestController::class, 'testSinaliteConnection'])->name('test.sinalite');

// Catalog route
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');

// Sync Products Route
Route::get('/sync-products', [ProductController::class, 'syncProducts'])->name('sync.products');

// Import Products Route
Route::get('/import-products', [ProductImportController::class, 'importProducts']);

// Authentication routes
require __DIR__.'/auth.php';
