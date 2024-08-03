<?php

test('cart page', function () {
    $this->get(route('cart'))
        ->assertSuccessful()
        ->assertViewIs('pages.cart')
        ->assertSeeLivewire(\App\Livewire\Cart::class);
});
