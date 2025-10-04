<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminProductController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\Authenticate;

// Trang chủ
Route::get('/', [ProductController::class, 'homepage'])->name('homepage');
Route::get('/homepage', [ProductController::class, 'homepage']);

// Xem chi tiết sản phẩm động
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

// Auth routes - User
Route::get('/dangnhap', [AuthController::class, 'showLoginForm'])->name('dangnhap');
Route::post('/dangnhap', [AuthController::class, 'login'])->name('login.post');

Route::get('/dangky', [AuthController::class, 'showRegisterForm'])->name('dangky');
Route::post('/dangky', [AuthController::class, 'register'])->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/quen-mat-khau', function () {
    return 'Chức năng quên mật khẩu đang phát triển.';
})->name('quenmatkhau');

// Auth routes - Admin
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Profile - Cần đăng nhập user
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProductController::class, 'profile'])->name('profile');

    // Cart - Cần đăng nhập user
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add-product', [CartController::class, 'addProduct'])->name('cart.addProduct');
    Route::post('/cart/update-quantity/{id}', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/add-from-profile', [CartController::class, 'addFromProfile'])->name('cart.addFromProfile');

    // Checkout - Cần đăng nhập user
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::post('/checkout/prepare', [CheckoutController::class, 'prepare'])->name('checkout.prepare');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
});

// Admin routes - Cần đăng nhập admin
Route::prefix('admin')->middleware('admin')->group(function () {
    // Trang chính admin - hiển thị cả sản phẩm và đơn hàng
    Route::get('/products', [AdminProductController::class, 'index'])->name('admin.products.index');

    // Quản lý sản phẩm
    Route::post('/products', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::put('/products/{id}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{id}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');

    // Quản lý đơn hàng
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::post('/orders', [OrderController::class, 'store'])->name('admin.orders.store');
    Route::put('/orders/{id}', [OrderController::class, 'update'])->name('admin.orders.update');
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');
});
