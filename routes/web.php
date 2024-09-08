<?php 

use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;

// Dynamic Route for Products
Route::get('/catalog/{category:slug}/{productSlug}', [CatalogController::class, 'showProduct'])->name('showProduct');

// Dynamic Route for Categories
Route::get('/catalog/{category:slug}', [CatalogController::class, 'showCategory'])->name('category.show');

// Home Route
Route::get('/', [CatalogController::class, 'index'])->name('catalog.index');

