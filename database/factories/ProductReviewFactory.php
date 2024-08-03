<?php

namespace Zoker68\Shop\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Zoker68\Shop\Models\Product;
use Zoker68\Shop\Models\ProductReview;
use Zoker68\Shop\Models\User;

class ProductReviewFactory extends Factory
{
    protected $model = ProductReview::class;

    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'user_id' => User::factory(),

            'rating' => $this->faker->numberBetween(1, 5),
            'review' => $this->faker->realText(1000),
            'published' => 1,

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
