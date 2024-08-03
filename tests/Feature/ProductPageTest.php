<?php

use App\Models\Category;
use App\Models\Product;

test('Can open product page', function () {
    $category = Category::factory(['name' => 'Категория'])->create();

    $product = Product::factory()->approved()->hasAttached($category)->create();

    $this->get(route('product', $product->slug))
        ->assertSuccessful()
        ->assertViewIs('pages.product')
        ->assertSeeTextInOrder([
            $category->name,
            $product->name,
            $product->name,
        ])
        ->assertSeeText([
            money($product->price),
            $product->description,
        ])
        ->assertSeeLivewire(\App\Livewire\Product::class);
});

test('404 if product not found or not approved or not published', function () {
    $this->get(route('product', 'not-found'))
        ->assertNotFound();

    $product = Product::factory()->rejected()->create();

    $this->get(route('product', $product->slug))
        ->assertNotFound();

    $product = Product::factory(['published' => false])->approved()->create();

    $this->get(route('product', $product->slug))
        ->assertNotFound();

});
