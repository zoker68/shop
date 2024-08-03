<?php

namespace Zoker\Shop\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Zoker\Shop\Models\ShippingMethod;

class ShippingMethodFactory extends Factory
{
    protected $model = ShippingMethod::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->text(),
            'sort' => $this->faker->randomNumber(1),
            'price' => $this->faker->randomNumber(2),
            'available_from' => 0,
            'available_until' => 0,
            'days' => $this->faker->randomNumber(2),

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
