<?php

use App\Livewire\Cart;
use App\Models\Cart as CartModel;
use App\Models\CartProduct;
use App\Models\Product;
use App\Models\User;
use Livewire\Livewire;

it('renders successfully', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create();
    $cart = CartModel::factory(['user_id' => $user->id])->statusCreated()->create();

    CartProduct::factory(['cart_id' => $cart->id, 'price' => $product->price, 'quantity' => 1])->recycle($product)->create();
    $cart->load('products');

    Livewire::actingAs($user)
        ->test(Cart::class)
        ->assertSuccessful()
        ->assertViewIs('livewire.shop.cart')
        ->assertSee([
            $product->name,
            money($product->price),
            $cart->products->first()->quantity,
            money($product->price * $cart->products->first()->quantity),
        ]);
});
