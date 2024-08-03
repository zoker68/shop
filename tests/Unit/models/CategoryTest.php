<?php

namespace Tests\Unit\models;

use App\Models\Category;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function test_getBySlug_returns_category()
    {
        $category = Category::factory()->create();
        $subCategory = Category::factory()->create(['parent_id' => $category->id]);
        $subSubCategory = Category::factory()->create(['parent_id' => $subCategory->id]);

        expect(Category::getBySlug($category->url)->id)->toEqual($category->id)
            ->and(Category::getBySlug($subCategory->url)->id)->toEqual($subCategory->id)
            ->and(Category::getBySlug($subSubCategory->url)->id)->toEqual($subSubCategory->id);
    }
}
