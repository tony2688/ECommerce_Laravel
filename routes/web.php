<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

// Home con productos
Route::get('/', [HomeController::class, 'index'])->name('home');

// Cart routes (públicas para invitados)
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/add', [CartController::class, 'add'])->name('add');
    Route::patch('/update/{productId}', [CartController::class, 'update'])->name('update');
    Route::delete('/remove/{productId}', [CartController::class, 'remove'])->name('remove');
    Route::get('/count', [CartController::class, 'getCartCount'])->name('count');
    Route::delete('/clear', [CartController::class, 'clear'])->name('clear');
});

// Sync cart on login (requiere autenticación)
Route::post('/cart/sync', [CartController::class, 'sync'])->middleware('auth')->name('cart.sync');

// Wishlist routes
Route::prefix('wishlist')->name('wishlist.')->group(function () {
    Route::get('/', [WishlistController::class, 'index'])->name('index');
    Route::post('/toggle/{product}', [WishlistController::class, 'toggle'])->name('toggle');
    Route::delete('/remove/{product}', [WishlistController::class, 'destroy'])->name('destroy');
    Route::get('/ids', [WishlistController::class, 'getWishlistIds'])->name('ids');
});

// Sync wishlist on login (requiere autenticación)
Route::post('/wishlist/sync', [WishlistController::class, 'sync'])->middleware('auth')->name('wishlist.sync');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Product routes
Route::get('/products/{slug}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');

// Review routes (requiere autenticación)
Route::post('/reviews', [App\Http\Controllers\ReviewController::class, 'store'])->middleware('auth')->name('reviews.store');

