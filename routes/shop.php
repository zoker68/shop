<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'zoker68.shop::pages.index')->name('index');

Route::middleware('guest')->group(function () {

    Route::get('/login', \Zoker68\Shop\Livewire\Auth\Login::class)->name('login');
    Route::get('/forgot-password', \Zoker68\Shop\Livewire\Auth\ForgotPassword::class)->name('forgot-password');
    Route::get('/reset-password/{email}', \Zoker68\Shop\Http\Controllers\Auth\ResetPasswordController::class)->name('reset-password');
});

Route::middleware('auth')->group(function () {
    Route::delete('/logout', \Zoker68\Shop\Http\Controllers\Auth\LogoutController::class)->name('logout');
    Route::get('/account', \Zoker68\Shop\Http\Controllers\Auth\AccountController::class)->name('account.profile.dashboard');
    Route::get('/account/profile', [\Zoker68\Shop\Http\Controllers\Auth\ProfileController::class, 'index'])->name('account.profile.index');
    Route::patch('/account/profile', [\Zoker68\Shop\Http\Controllers\Auth\ProfileController::class, 'update'])->name('account.profile.update');
    Route::resource('/account/address', \Zoker68\Shop\Http\Controllers\Auth\AddressController::class)->names('account.profile.address')->only('index', 'edit', 'destroy');
    Route::get('/account/password', [\Zoker68\Shop\Http\Controllers\Auth\PasswordController::class, 'edit'])->name('account.profile.password.edit');
    Route::patch('/account/password', [\Zoker68\Shop\Http\Controllers\Auth\PasswordController::class, 'update'])->name('account.profile.password.update');
    Route::get('/account/wishlist', \Zoker68\Shop\Http\Controllers\Auth\WishlistController::class)->name('account.wishlist');
    Route::get('/account/orders', [\Zoker68\Shop\Http\Controllers\Auth\OrderController::class, 'index'])->name('account.orders.index');
    Route::get('/account/orders/{orderHash:hash}', [\Zoker68\Shop\Http\Controllers\Auth\OrderController::class, 'show'])->name('account.orders.show');
});

Route::get('/category/{category:slug?}', \Zoker68\Shop\Http\Controllers\CategoryController::class)->where('category', '.*')->name('category');
Route::get('/search', \Zoker68\Shop\Http\Controllers\SearchController::class)->name('search');
Route::get('/product/{product:slug}', \Zoker68\Shop\Http\Controllers\ProductController::class)->name('product');
Route::get('/cart', \Zoker68\Shop\Http\Controllers\CartController::class)->name('cart');
Route::get('/checkout', \Zoker68\Shop\Http\Controllers\CheckoutController::class)->name('checkout');
Route::get('/checkout/shipping', \Zoker68\Shop\Http\Controllers\ShippingController::class)->name('checkout.shipping');
Route::get('/checkout/payment', \Zoker68\Shop\Http\Controllers\PaymentController::class)->name('checkout.payment');
Route::get('/checkout/confirm', \Zoker68\Shop\Http\Controllers\ConfirmController::class)->name('checkout.confirm');
Route::get('/checkout/success', \Zoker68\Shop\Http\Controllers\SuccessOrderController::class)->name('checkout.success');
