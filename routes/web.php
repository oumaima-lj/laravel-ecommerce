<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/effects', [HomeController::class, 'effects'])->name('effects');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::view('/aboutus', 'aboutus')->name('aboutus');
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Product likes
    Route::post('/products/{product}/like', [LikeController::class, 'toggle'])->name('products.like');

    // Shopping cart
    Route::post('/cart/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/{cart}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/{cart}/quantity', [CartController::class, 'updateQuantity'])->name('cart.quantity');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    // Admin routes
    Route::middleware('admin')->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('dashboard/products', ProductAdminController::class)->names([
            'index' => 'dashboard.products.index',
            'create' => 'dashboard.products.create',
            'store' => 'dashboard.products.store',
            'show' => 'dashboard.products.show',
            'edit' => 'dashboard.products.edit',
            'update' => 'dashboard.products.update',
            'destroy' => 'dashboard.products.destroy',
        ]);
        Route::get('/dashboard/orders', [AdminController::class, 'orders'])->name('dashboard.orders');
        Route::post('/dashboard/orders/{order}/status', [AdminController::class, 'updateOrderStatus'])->name('dashboard.orders.status');
        Route::get('/dashboard/users', [AdminController::class, 'users'])->name('dashboard.users');
    });
});

Route::get('/notes', function () {
    return view('notes');
})->name('notes');

Route::post('/dashboard/products', [App\Http\Controllers\ProductController::class, 'store'])->name('dashboard.products.store');

// Mock Admin Login (UI only)
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('dashboard/products', ProductAdminController::class)->names([
        'index' => 'dashboard.products.index',
        'create' => 'dashboard.products.create',
        'store' => 'dashboard.products.store',
        'show' => 'dashboard.products.show',
        'edit' => 'dashboard.products.edit',
        'update' => 'dashboard.products.update',
        'destroy' => 'dashboard.products.destroy',
    ]);
    Route::get('/dashboard/orders', [AdminController::class, 'orders'])->name('dashboard.orders');
    Route::get('/dashboard/users', [AdminController::class, 'users'])->name('dashboard.users');
});

Route::get('/liked-items', [LikeController::class, 'index'])->name('liked.items');

Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');

Route::get('/thank-you', function () {
    return view('thankyou');
})->name('thankyou');

require __DIR__.'/auth.php';
