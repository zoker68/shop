<?php

use App\Livewire\Products;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

test('Can open category and look for products and subcategories', function () {
    $category = Category::factory(['name' => 'Категория'])->create();
    $subCategory = Category::factory(['name' => 'Подкатегория'])->create(['parent_id' => $category->id]);
    $categoryNotInUse = Category::factory()->create();

    $brand = Brand::factory()->count(2)->create();
    $brandNotInCategory = Brand::factory()->create();

    $product = Product::factory(['brand_id' => $brand[0]->id])->hasAttached($category)->create();
    $product2 = Product::factory(['brand_id' => $brand[1]->id])->hasAttached($subCategory)->create();
    $productNotInCategory = Product::factory(['brand_id' => $brand[1]->id])->hasAttached($categoryNotInUse)->create();

    $this->get(route('category', $category->url))
        ->assertSuccessful()
        ->assertViewIs('pages.category')
        ->assertSeeTextInOrder([
            'Sub categories',
            'Brands',
            $brand[0]->name,
            $brand[1]->name,
        ])
        ->assertSeeInOrder([
            'Sub categories',
            route('category', $subCategory->url),
        ])
        ->assertDontSeeText($brandNotInCategory->name)
        ->assertSeeLivewire(Products::class);
});
