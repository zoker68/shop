<?php

namespace Zoker\Shop\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Zoker\Shop\Enums\PropertyFilter;
use Zoker\Shop\Enums\PropertyType;
use Zoker\Shop\Models\Property;

class PropertyFactory extends Factory
{
    protected $model = Property::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'type' => $this->faker->randomElement(PropertyType::class),
            'filter' => $this->faker->randomElement(PropertyFilter::class),
            'sort' => $this->faker->numberBetween(1, 100),
        ];
    }
}
