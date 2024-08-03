<?php

namespace Tests\Unit\models;

use App\Enums\PropertyFilter;
use App\Models\Category;
use App\Models\Product;
use App\Models\Property;
use Tests\TestCase;

class PropertyTest extends TestCase
{
    public function testScopeForCategory()
    {
        $property = Property::factory()->create();
        $property2 = Property::factory()->create();
        $property3 = Property::factory()->create();

        $category = Category::factory()->create();
        $category2 = Category::factory()->create();

        $product = Product::factory()->approved()->create();
        $product->categories()->attach($category);
        $property->products()->attach($product);
        $property3->products()->attach($product);

        $product2 = Product::factory()->approved()->create();
        $product2->categories()->attach($category2);
        $property2->products()->attach($product2);

        $result = Property::forCategory($category)->get();

        $this->assertCount(2, $result);
        $this->assertTrue($result->contains($property));
        $this->assertTrue($result->contains($property3));
        $this->assertFalse($result->contains($property2));
    }

    public function testScopeHasFilter()
    {
        $property = Property::factory(['filter' => PropertyFilter::Checkbox])->create();
        $property2 = Property::factory(['filter' => PropertyFilter::None])->create();

        $category = Category::factory()->create();

        $product = Product::factory()->approved()->create();
        $product->categories()->attach($category);
        $property->products()->attach($product);
        $property2->products()->attach($product);

        $result = Property::hasFilter()->forCategory($category)->get();

        $this->assertCount(1, $result);
        $this->assertTrue($result->contains($property));
        $this->assertTrue($result->doesntContain($property2));
    }

    public function testScopeHasValue()
    {
        $property = Property::factory(['filter' => PropertyFilter::Checkbox])->create();
        $property2 = Property::factory()->create();

        $category = Category::factory()->create();

        $product = Product::factory()->approved()->create();
        $product->categories()->attach($category);
        $property->products()->attach($product, ['value' => 'value']);
        $property2->products()->attach($product);

        $result = Property::productPropertyRelationHasValue()->forCategory($category)->get();

        $this->assertCount(1, $result);
        $this->assertTrue($result->contains($property));
        $this->assertTrue($result->doesntContain($property2));
    }
}
