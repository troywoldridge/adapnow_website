<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;

// Home Page Route
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Catalog Page Route
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');

// Business Cards Page Route
Route::get('/business-cards', function () {
    return view('business-cards');
});

// Individual Business Card Style Routes
Route::get('/business-cards/profit-maximizer', function () {
    return view('business-cards.profit-maximizer');
});

Route::get('/business-cards/matte-14pt', function () {
    return view('business-cards.matte-14pt');
});

Route::get('/business-cards/matte-16pt', function () {
    return view('business-cards.matte-16pt');
});

Route::get('/business-cards/uv-quick-ship', function () {
    return view('business-cards.uv-quick-ship');
});

Route::get('/business-cards/uv-14pt', function () {
    return view('business-cards.uv-14pt');
});

Route::get('/business-cards/uv-16pt', function () {
    return view('business-cards.uv-16pt');
});

Route::get('/business-cards/gloss-lamination-18pt', function () {
    return view('business-cards.gloss-lamination-18pt');
});

Route::get('/business-cards/matte-silk-lamination-18pt', function () {
    return view('business-cards.matte-silk-lamination-18pt');
});

Route::get('/business-cards/aq-14pt', function () {
    return view('business-cards.aq-14pt');
});

Route::get('/business-cards/aq-16pt', function () {
    return view('business-cards.aq-16pt');
});

Route::get('/business-cards/enviro-uncoated-13pt', function () {
    return view('business-cards.enviro-uncoated-13pt');
});

Route::get('/business-cards/linen-uncoated-13pt', function () {
    return view('business-cards.linen-uncoated-13pt');
});

Route::get('/business-cards/writable-aq-14pt', function () {
    return view('business-cards.writable-aq-14pt');
});

Route::get('/business-cards/writable-uv-14pt', function () {
    return view('business-cards.writable-uv-14pt');
});

Route::get('/business-cards/writable-c1s-18pt', function () {
    return view('business-cards.writable-c1s-18pt');
});

Route::get('/business-cards/metallic-foil', function () {
    return view('business-cards.metallic-foil');
});

Route::get('/business-cards/kraft-paper', function () {
    return view('business-cards.kraft-paper');
});

Route::get('/business-cards/durable', function () {
    return view('business-cards.durable');
});

Route::get('/business-cards/spot-uv', function () {
    return view('business-cards.spot-uv');
});

Route::get('/business-cards/pearl-paper', function () {
    return view('business-cards.pearl-paper');
});

Route::get('/business-cards/die-cut', function () {
    return view('business-cards.die-cut');
});

Route::get('/business-cards/soft-touch', function () {
    return view('business-cards.soft-touch');
});

Route::get('/business-cards/painted-edge-32pt', function () {
    return view('business-cards.painted-edge-32pt');
});

Route::get('/business-cards/ultra-smooth', function () {
    return view('business-cards.ultra-smooth');
});
