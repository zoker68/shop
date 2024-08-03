<?php

use App\Livewire\Products;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Livewire\Livewire;

it('renders successfully', function () {
    $category = \App\Models\Category::factory()->create();
    $product = Product::factory()->count(3)->approved()->hasAttached($category)->create();
    $notApproved = Product::factory()->count(1)->rejected()->hasAttached($category)->create();

    Livewire::test(Products::class, ['category' => $category])
        ->assertSeeTextInOrder([
            $product[0]->name,
            $product[0]->description_short,
            $product[1]->name,
            $product[1]->description_short,
            $product[2]->name,
            $product[2]->description_short,
        ])
        ->assertSeeInOrder([
            asset($product[0]->image),
            asset($product[1]->image),
            asset($product[2]->image),
        ])
        ->assertSee([
            route('product', $product[0]->slug),
            route('product', $product[1]->slug),
            route('product', $product[2]->slug),
        ])
        ->assertStatus(200);
});

it('apply brands filter', function () {
    $category = Category::factory()->create();

    $brand = Brand::factory()->create();
    $brand2 = Brand::factory()->create();

    $product = Product::factory(['brand_id' => $brand->id])->approved()->hasAttached($category)->create();
    $product2 = Product::factory(['brand_id' => $brand2->id])->approved()->hasAttached($category)->create();

    Livewire::test(Products::class, ['category' => $category])
        ->assertViewHas('products', function ($products) use ($product, $product2) {
            return $products->contains($product) && $products->contains($product2);
        })
        ->dispatch('updateFilters', ['brands' => $brand->slug])
        ->assertViewHas('products', function ($products) use ($product, $product2) {
            return $products->contains($product) && $products->doesntContain($product2);
        });
});

it('can change view type', function () {
    $category = Category::factory()->create();
    Livewire::test(Products::class, ['category' => $category])
        ->assertViewHas('viewType', 'grid')
        ->dispatch('changeViewType', 'list')
        ->assertViewHas('viewType', 'list')
        ->dispatch('changeViewType', 'grid')
        ->assertViewHas('viewType', 'grid');
});

it('can sort products', function () {
    $category = Category::factory()->create();
    $product = Product::factory(['price' => 100, 'sell_count' => 10])->approved()->hasAttached($category)->create();
    $product2 = Product::factory(['price' => 200, 'sell_count' => 20])->approved()->hasAttached($category)->create();
    $product3 = Product::factory(['price' => 150, 'sell_count' => 30])->approved()->hasAttached($category)->create();

    config(['category.defaultSort' => \App\Enums\ProductsSorting::BESTSELLERS]);

    Livewire::test(Products::class, ['category' => $category])
        ->assertViewHas('products', function ($products) use ($product, $product2, $product3) {
            return $products[0]->id === $product3->id && $products[1]->id === $product2->id && $products[2]->id === $product->id;
        })
        ->dispatch('updateFilters', ['sort' => \App\Enums\ProductsSorting::PRICE_ASC->value])
        ->assertViewHas('products', function ($products) use ($product, $product2, $product3) {
            return $products[0]->id === $product->id && $products[1]->id === $product3->id && $products[2]->id === $product2->id;
        })
        ->dispatch('updateFilters', ['sort' => \App\Enums\ProductsSorting::PRICE_DESC->value])
        ->assertViewHas('products', function ($products) use ($product, $product2, $product3) {
            return $products[0]->id === $product2->id && $products[1]->id === $product3->id && $products[2]->id === $product->id;
        });
});

it('apply price filter', function () {
    $category = Category::factory()->create();
    $product = Product::factory(['price' => 100])->approved()->hasAttached($category)->create();
    $product2 = Product::factory(['price' => 200])->approved()->hasAttached($category)->create();
    $product3 = Product::factory(['price' => 150])->approved()->hasAttached($category)->create();

    Livewire::test(Products::class, ['category' => $category])
        ->assertViewHas('products', function ($products) use ($product, $product2, $product3) {
            return $products->contains($product) && $products->contains($product2) && $products->contains($product3);
        })
        ->dispatch('updateRangeFilter', min: 100, max: 200, property: 'price')
        ->assertViewHas('products', function ($products) use ($product, $product2, $product3) {
            return $products->contains($product) && $products->contains($product2) && $products->contains($product3);
        })
        ->dispatch('updateRangeFilter', min: 101, max: 200, property: 'price')
        ->assertViewHas('products', function ($products) use ($product, $product2, $product3) {
            return $products->doesntContain($product) && $products->contains($product2) && $products->contains($product3);
        })
        ->dispatch('updateRangeFilter', min: 101, max: 199, property: 'price')
        ->assertViewHas('products', function ($products) use ($product, $product2, $product3) {
            return $products->doesntContain($product) && $products->doesntContain($product2) && $products->contains($product3);
        });
});

it('can add product to wishlist for authenticated user', function () {
    $category = Category::factory()->create();
    $product = Product::factory()->approved()->hasAttached($category)->create();
    Livewire::actingAs(User::factory()->create())
        ->test(Products::class, ['category' => $category])
        ->call('toggleWishlist', $product->hash)
        ->assertDispatched('updateWishlist')
        ->assertViewHas('wishlist', function ($wishlist) use ($product) {
            $this->assertCount(1, $wishlist);

            return in_array($product->id, $wishlist);
        })
        ->call('toggleWishlist', $product->hash)
        ->assertDispatched('updateWishlist')
        ->assertViewHas('wishlist', function ($wishlist) use ($product) {
            $this->assertCount(0, $wishlist);

            return ! in_array($product->id, $wishlist);
        });
});

it('cannot add product to wishlist for unauthenticated user', function () {
    $category = Category::factory()->create();
    $product = Product::factory()->approved()->hasAttached($category)->create();
    Livewire::test(Products::class, ['category' => $category])
        ->call('toggleWishlist', $product->hash)
        ->assertNotDispatched('updateWishlist');

    $this->assertCount(0, Wishlist::all());
});

it('can add to cart', function () {
    $category = Category::factory()->create();
    $product = Product::factory(['stock' => 1])->approved()->hasAttached($category)->create();

    Livewire::test(Products::class, ['category' => $category])
        ->call('addToCart', $product->hash)
        ->assertDispatched('cartUpdated')
        ->assertDispatched('livewire:alert', function ($event, $alert) {
            return $alert[0]['type'] === 'success' && $alert[0]['message'] === __('cart.added');
        });
});

it('add to cart overstock false', function () {
    config(['product.allow_overstock' => false]);

    $category = Category::factory()->create();
    $product = Product::factory(['stock' => 0])->approved()->hasAttached($category)->create();

    Livewire::test(Products::class, ['category' => $category])
        ->call('addToCart', $product->hash)
        ->assertNotDispatched('cartUpdated')
        ->assertDispatched('livewire:alert', function ($event, $alert) {
            return $alert[0]['type'] === 'danger' && $alert[0]['message'] === __('cart.exceptions.stock');
        });
});

it('add to cart overstock true', function () {
    config(['product.allow_overstock' => true]);

    $category = Category::factory()->create();
    $product = Product::factory(['stock' => 0])->approved()->hasAttached($category)->create();

    Livewire::test(Products::class, ['category' => $category])
        ->call('addToCart', $product->hash)
        ->assertDispatched('cartUpdated');
});
