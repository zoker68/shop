<?php

namespace Tests\Unit\models;

use App\Models\Category;
use App\Models\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_scope_in_category_returns_products_in_category()
    {
        $category = Category::factory()->create();
        $category2 = Category::factory()->create();
        $productInCategory = Product::factory()->create();
        $productNotInCategory = Product::factory()->create();
        $productInCategory->categories()->attach($category);
        $productNotInCategory->categories()->attach($category2);

        $result = Product::forCategory($category)->get();

        $this->assertCount(1, $result);
        $this->assertTrue($result->contains($productInCategory));
        $this->assertFalse($result->contains($productNotInCategory));
    }

    public function test_scope_in_category_returns_products_in_category_and_its_children()
    {
        config(['category.includeChildren' => true]);

        $parentCategory = Category::factory()->create();
        $childCategory = Category::factory()->create(['parent_id' => $parentCategory->id]);
        $productInParentCategory = Product::factory()->create();
        $productInChildCategory = Product::factory()->create();
        $productNotInCategory = Product::factory()->create();
        $productInParentCategory->categories()->attach($parentCategory);
        $productInChildCategory->categories()->attach($childCategory);

        $result = Product::forCategory($parentCategory)->get();

        $this->assertCount(2, $result);
        $this->assertTrue($result->contains($productInParentCategory));
        $this->assertTrue($result->contains($productInChildCategory));
        $this->assertFalse($result->contains($productNotInCategory));
    }

    public function test_scope_in_category_returns_products_in_category_only()
    {
        config(['category.includeChildren' => false]);

        $parentCategory = Category::factory()->create();
        $childCategory = Category::factory()->create(['parent_id' => $parentCategory->id]);
        $productInParentCategory = Product::factory()->create();
        $productInChildCategory = Product::factory()->create();
        $productInParentCategory->categories()->attach($parentCategory);
        $productInChildCategory->categories()->attach($childCategory);

        $result = Product::forCategory($parentCategory)->get();

        $this->assertCount(1, $result);
        $this->assertTrue($result->contains($productInParentCategory));
        $this->assertFalse($result->contains($productInChildCategory));
    }
}
