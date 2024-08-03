<?php

namespace Zoker68\Shop\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Zoker68\Shop\Enums\CartStatus;
use Zoker68\Shop\Models\Cart;
use Zoker68\Shop\Models\User;

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
