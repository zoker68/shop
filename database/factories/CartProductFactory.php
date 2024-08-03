<?php

namespace Zoker68\Shop\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Zoker68\Shop\Models\CartProduct;
use Zoker68\Shop\Models\Product;

class CartProductFactory extends Factory
{
    protected $model = CartProduct::class;

    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),

            'quantity' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->numberBetween(1, 100000),

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
