<?php

namespace Zoker68\Shop\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Zoker68\Shop\Enums\OrderStatusType;
use Zoker68\Shop\Models\OrderStatus;

class OrderStatusFactory extends Factory
{
    protected $model = OrderStatus::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'type' => $this->faker->randomElement(OrderStatusType::class),
            'color' => $this->faker->hexColor(),
        ];
    }
}
