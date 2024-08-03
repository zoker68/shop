<?php

namespace Zoker\Shop\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Zoker\Shop\Enums\ProductStatus;
use Zoker\Shop\Models\Brand;
use Zoker\Shop\Models\Product;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'foreign_id' => $this->faker->word(),
            'brand_id' => Brand::factory(),
            'slug' => $this->faker->slug(),
            'name' => $this->faker->words(mt_rand(1, 3), true),
            'description' => $this->faker->realText(),
            'description_short' => $this->faker->words(3, true),
            'stock' => $this->faker->numberBetween(0, 100),
            'price' => $this->faker->numberBetween(1, 90000),
            'image' => $this->faker->imageUrl(),
            'status' => $this->faker->randomElement(ProductStatus::class),
            'published' => true,
        ];
    }

    public function approved()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => ProductStatus::APPROVED,
            ];
        });
    }

    public function rejected()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => ProductStatus::REJECTED,
            ];
        });
    }
}
