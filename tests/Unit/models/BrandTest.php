<?php

namespace Tests\Unit\models;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Collection;
use Tests\TestCase;

class BrandTest extends TestCase
{
    public function test_getBrandsForCategory_returns_brands_for_category()
    {
        // Arrange
        $category = Category::factory()->create();
        $brand1 = Brand::factory()->create();
        $brand2 = Brand::factory()->create();
        $brand3 = Brand::factory()->create();
        $product1 = Product::factory()->create([
            'brand_id' => $brand1->id,
        ]);
        $product2 = Product::factory()->create([
            'brand_id' => $brand2->id,
        ]);
        $product3 = Product::factory()->create([
            'brand_id' => $brand3->id,
        ]);
        $category->products()->attach([
            $product1->id,
            $product2->id,
            $product3->id,
        ]);

        // Act
        $result = Brand::getByCategory($category);

        // Assert
        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(3, $result);
        $this->assertTrue($result->contains($brand1));
        $this->assertTrue($result->contains($brand2));
        $this->assertTrue($result->contains($brand3));
    }

    public function test_getBrandsForCategory_returns_brands_for_category_and_its_children()
    {
        config()->set('category.includeChildren', true);
        // Arrange
        $parentCategory = Category::factory()->create();
        $childCategory = Category::factory()->create([
            'parent_id' => $parentCategory->id,
        ]);
        $brand1 = Brand::factory()->create();
        $brand2 = Brand::factory()->create();
        $brand3 = Brand::factory()->create();
        $product1 = Product::factory()->create([
            'brand_id' => $brand1->id,
        ]);
        $product2 = Product::factory()->create([
            'brand_id' => $brand2->id,
        ]);
        $product3 = Product::factory()->create([
            'brand_id' => $brand3->id,
        ]);
        $parentCategory->products()->attach([
            $product1->id,
            $product2->id,
        ]);
        $childCategory->products()->attach([
            $product3->id,
        ]);

        // Act
        $result = Brand::getByCategory($parentCategory);

        // Assert
        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(3, $result);
        $this->assertTrue($result->contains($brand1));
        $this->assertTrue($result->contains($brand2));
        $this->assertTrue($result->contains($brand3));
    }

    public function test_getBrandsForCategory_returns_empty_collection_if_no_brands_found()
    {
        // Arrange
        $category = Category::factory()->create();

        // Act
        $result = Brand::getByCategory($category);

        // Assert
        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(0, $result);
    }

    public function test_for_config_includeChildren_false()
    {
        config()->set('category.includeChildren', false);

        $brand = Brand::factory()->create();
        $brand2 = Brand::factory()->create();

        $category = Category::factory()->create();
        $subCategory = Category::factory()->create(['parent_id' => $category->id]);

        $category->products()->attach([
            Product::factory()->create([
                'brand_id' => $brand->id,
            ])->id,
        ]);
        $subCategory->products()->attach([
            Product::factory()->create([
                'brand_id' => $brand2->id,
            ])->id,
        ]);

        $result = Brand::getByCategory($category);
        $this->assertCount(1, $result);
        $this->assertTrue($result->contains($brand));
        $this->assertFalse($result->contains($brand2));
    }

    public function test_dont_show_unpublished_brands()
    {
        $brand = Brand::factory()->create();
        $brand->update(['published' => false]);

        $category = Category::factory()->create();
        $category->products()->attach([
            Product::factory()->create([
                'brand_id' => $brand->id,
            ])->id,
        ]);

        $result = Brand::getByCategory($category);
        $this->assertCount(0, $result);
    }
}
