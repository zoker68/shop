<?php

namespace Zoker68\Shop\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Zoker68\Shop\Models\PaymentMethod;

class PaymentMethodFactory extends Factory
{
    protected $model = PaymentMethod::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'code' => $this->faker->unique()->word(),
            'description' => $this->faker->realText(),
            'sort' => $this->faker->randomNumber(1),
            'fee' => $this->faker->randomNumber(4),
            'fee_percent' => $this->faker->randomFloat(2, 0, 20),

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
