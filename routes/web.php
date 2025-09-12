<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

// Trang chủ
Route::get('/homepage', [ProductController::class, 'homepage'])->name('homepage');

// Auth routes
Route::get('/dangnhap', [AuthController::class, 'showLoginForm'])->name('dangnhap');
Route::post('/dangnhap', [AuthController::class, 'login'])->name('login.post');

Route::get('/dangky', [AuthController::class, 'showRegisterForm'])->name('dangky');
Route::post('/dangky', [AuthController::class, 'register'])->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/quen-mat-khau', function () {
    return 'Chức năng quên mật khẩu đang phát triển.';
})->name('quenmatkhau');

// Product demo
Route::get('/product1', [ProductController::class, 'product1'])->name('product1');
Route::get('/product2', [ProductController::class, 'product2'])->name('product2');
Route::get('/product3', [ProductController::class, 'product3'])->name('product3');
Route::get('/product4', [ProductController::class, 'product4'])->name('product4');
Route::get('/product5', [ProductController::class, 'product5'])->name('product5');

// Profile
Route::get('/profile', [ProductController::class, 'profile'])->name('profile');

// Admin orders
Route::prefix('admin')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::post('/orders', [OrderController::class, 'store'])->name('admin.orders.store');
    Route::put('/orders/{id}', [OrderController::class, 'update'])->name('admin.orders.update');
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');
});

// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/update-quantity/{id}', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/add-from-profile', [CartController::class, 'addFromProfile'])->name('cart.addFromProfile');

// Checkout 
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
Route::post('/checkout/prepare', [CheckoutController::class, 'prepare'])->name('checkout.prepare');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
