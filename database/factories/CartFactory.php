<?php

namespace Zoker\Shop\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Zoker\Shop\Enums\CartStatus;
use Zoker\Shop\Models\Cart;
use Zoker\Shop\Models\User;

class CartFactory extends Factory
{
    protected $model = Cart::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),

            'session' => $this->faker->word(),
            'total_products' => $this->faker->numberBetween(1, 100000),
            'status' => $this->faker->randomElement(CartStatus::class),

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    public function statusCreated(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => CartStatus::CREATED,
        ]);
    }
}
