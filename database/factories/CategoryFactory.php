<?php

namespace Zoker68\Shop\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Zoker68\Shop\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Zoker68\Shop\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->word;

        return [
            'name' => $name,
            'published' => true,
        ];
    }

    public function withParent()
    {
        return $this->state(function (array $attributes) {
            return [
                'parent_id' => Category::factory(),
            ];
        });

    }
}
