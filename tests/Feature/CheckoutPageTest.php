<?php

use App\Models\Cart;

test('Checkout page redirect to cart if cart is empty', function () {
    $this->get(route('checkout'))
        ->assertRedirect(route('cart'));
});

test('Checkout page for authenticated user', function () {
    $cart = Cart::factory()->statusCreated()->hasProducts(1)->create();

    $this->actingAs($cart->user)
        ->get(route('checkout'))
        ->assertSuccessful()
        ->assertViewIs('pages.checkout')
        ->assertSeeLivewire(\App\Livewire\Checkout::class);
});

test('Checkout page for anonymous user', function () {

    $sessionId = Cart::getCartSession();
    $cart = Cart::factory(['session' => $sessionId])->statusCreated()->hasProducts(1)->create();

    $this->withCookies(['cart_session' => $sessionId])
        ->get(route('checkout'))
        ->assertSuccessful()
        ->assertViewIs('pages.checkout')
        ->assertSeeLivewire(\App\Livewire\Checkout::class);
});
