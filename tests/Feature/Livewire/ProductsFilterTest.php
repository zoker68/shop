<?php

use App\Livewire\ProductsFilter;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Livewire;

it('renders successfully', function () {
    $category = Category::factory()->create();
    Livewire::test(ProductsFilter::class, ['category' => $category])
        ->assertViewIs('livewire.shop.products.filter')
        ->assertStatus(200);
});

it('brand filter works and dispatches update', function () {
    $category = Category::factory()->create();

    $brand = Brand::factory()->create();
    $brand2 = Brand::factory()->create();

    Product::factory(['brand_id' => $brand->id])->hasAttached($category)->create();
    Product::factory(['brand_id' => $brand2->id])->hasAttached($category)->create();

    Livewire::test(ProductsFilter::class, ['category' => $category])
        ->assertSeeText([
            $brand->name,
            $brand2->name,
        ])
        ->set('selectedBrands', [$brand->slug => true])
        ->call('filter')
        ->assertDispatched('updateFilters', ['brands' => $brand->slug])
        ->set('selectedBrands', [$brand->slug => true, $brand2->slug => true])
        ->call('filter')
        ->assertDispatched('updateFilters', ['brands' => $brand->slug . ',' . $brand2->slug])
        ->set('selectedBrands', [$brand->slug => true, $brand2->slug => false])
        ->call('filter')
        ->assertDispatched('updateFilters', ['brands' => $brand->slug]);
});
