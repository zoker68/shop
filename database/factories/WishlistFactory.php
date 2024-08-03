<?php

namespace Zoker68\Shop\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Zoker68\Shop\Models\Product;
use Zoker68\Shop\Models\User;
use Zoker68\Shop\Models\Wishlist;

class WishlistFactory extends Factory
{
    protected $model = Wishlist::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'product_id' => Product::factory(),
        ];
    }
}
