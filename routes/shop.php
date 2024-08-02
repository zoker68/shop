<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'zoker68.shop::pages.index')->name('index');

Route::middleware('guest')->group(function () {

//    Route::get('/login', \App\Livewire\Auth\Login::class)->name('login');
//    Route::get('/forgot-password', \App\Livewire\Auth\ForgotPassword::class)->name('forgot-password');
//    Route::get('/reset-password/{email}', \App\Http\Controllers\Auth\ResetPasswordController::class)->name('reset-password');
});

Route::middleware('auth')->group(function () {
//    Route::delete('/logout', \App\Http\Controllers\Auth\LogoutController::class)->name('logout');
//    Route::get('/account', \App\Http\Controllers\Auth\AccountController::class)->name('account.profile.dashboard');
//    Route::get('/account/profile', [\App\Http\Controllers\Auth\ProfileController::class, 'index'])->name('account.profile.index');
//    Route::patch('/account/profile', [\App\Http\Controllers\Auth\ProfileController::class, 'update'])->name('account.profile.update');
//    Route::resource('/account/address', \App\Http\Controllers\Auth\AddressController::class)->names('account.profile.address')->only('index', 'edit', 'destroy');
//    Route::get('/account/password', [\App\Http\Controllers\Auth\PasswordController::class, 'edit'])->name('account.profile.password.edit');
//    Route::patch('/account/password', [\App\Http\Controllers\Auth\PasswordController::class, 'update'])->name('account.profile.password.update');
//    Route::get('/account/wishlist', \App\Http\Controllers\Auth\WishlistController::class)->name('account.wishlist');
//    Route::get('/account/orders', [\App\Http\Controllers\Auth\OrderController::class, 'index'])->name('account.orders.index');
//    Route::get('/account/orders/{orderHash:hash}', [\App\Http\Controllers\Auth\OrderController::class, 'show'])->name('account.orders.show');
});


//Route::get('/category/{category:slug?}', \App\Http\Controllers\CategoryController::class)->where('category', '.*')->name('category');
//Route::get('/search', \App\Http\Controllers\SearchController::class)->name('search');
//Route::get('/product/{product:slug}', \App\Http\Controllers\ProductController::class)->name('product');
//Route::get('/cart', \App\Http\Controllers\CartController::class)->name('cart');
//Route::get('/checkout', \App\Http\Controllers\CheckoutController::class)->name('checkout');
//Route::get('/checkout/shipping', \App\Http\Controllers\ShippingController::class)->name('checkout.shipping');
//Route::get('/checkout/payment', \App\Http\Controllers\PaymentController::class)->name('checkout.payment');
//Route::get('/checkout/confirm', \App\Http\Controllers\ConfirmController::class)->name('checkout.confirm');
//Route::get('/checkout/success', \App\Http\Controllers\SuccessOrderController::class)->name('checkout.success');
