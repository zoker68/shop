<?php

use App\Models\User;

it('has wishlist and change count after add to wishlist', function () {
    $product = \App\Models\Product::factory()->create();
    $user = User::factory()->create();

    $this->be($user);

    Livewire::actingAs($user)
        ->test(\App\Livewire\Header\WishlistWidget::class)
        ->assertViewIs('livewire.header.wishlist-widget')
        ->assertViewHas('wishlistCount', 0);

    $wishlist = \App\Models\Wishlist::create(['user_id' => $user->id, 'product_id' => $product->id]);

    Livewire::actingAs($user)
        ->test(\App\Livewire\Header\WishlistWidget::class)
        ->assertViewIs('livewire.header.wishlist-widget')
        ->assertViewHas('wishlistCount', 1);

    $wishlist->delete();

    Livewire::actingAs($user)
        ->test(\App\Livewire\Header\WishlistWidget::class)
        ->assertViewIs('livewire.header.wishlist-widget')
        ->assertViewHas('wishlistCount', 0);

});
