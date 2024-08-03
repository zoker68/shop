<?php

use App\Models\Category;
use App\Models\Product;
use Livewire\Livewire;

it('renders successfully', function () {
    $category = Category::factory(['name' => 'Категория'])->create();

    $product = Product::factory(['stock' => 10])->approved()->hasAttached($category)->create()->load('categories');

    Livewire::test(\App\Livewire\Product::class, ['product' => $product])
        ->assertSuccessful()
        ->assertViewIs('livewire.shop.product')
        ->assertSee([
            $product->name,
            money($product->price),
            $product->description,
            $product->getCoverImage(),
            $product->brand->name,
        ])
        ->set('quantityForCart', 10)
        ->call('addToCart', productHash: $product->hash)
        ->assertHasNoErrors()
        ->assertDispatched('cartUpdated');
});

it('throw error if quantity is invalid', function () {
    $category = Category::factory(['name' => 'Категория'])->create();

    $product = Product::factory()->approved()->hasAttached($category)->create()->load('categories');

    Livewire::test(\App\Livewire\Product::class, ['product' => $product])
        ->set('quantityForCart', 0)
        ->call('addToCart', productHash: $product->hash)
        ->assertDispatched('livewire:alert', fn ($event, $alert) => $alert[0]['type'] === 'danger' && $alert[0]['message'] === __('cart.error.min'))
        ->set('quantityForCart', 'string')
        ->call('addToCart', productHash: $product->hash)
        ->assertDispatched('livewire:alert', fn ($event, $alert) => $alert[0]['type'] === 'danger' && $alert[0]['message'] === __('cart.error.integer'))
        ->set('quantityForCart', null)
        ->call('addToCart', productHash: $product->hash)
        ->assertDispatched('livewire:alert', fn ($event, $alert) => $alert[0]['type'] === 'danger' && $alert[0]['message'] === __('cart.error.required'));
});
