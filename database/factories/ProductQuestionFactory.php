<?php

namespace Zoker68\Shop\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Zoker68\Shop\Models\Product;
use Zoker68\Shop\Models\ProductQuestion;
use Zoker68\Shop\Models\User;

class ProductQuestionFactory extends Factory
{
    protected $model = ProductQuestion::class;

    public function definition(): array
    {
        $created_at = $this->faker->dateTimeBetween('-1 year', 'now');

        return [
            'question' => $this->faker->realText(),
            'answer' => $this->faker->realText(),

            'product_id' => Product::factory(),
            'user_id' => User::factory(),

            'created_at' => $created_at,
            'updated_at' => $this->faker->dateTimeBetween($created_at, 'now'),
        ];
    }
}
