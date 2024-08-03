<?php

namespace Zoker68\Shop\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Zoker68\Shop\Models\Country;

class CountryFactory extends Factory
{
    protected $model = Country::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->country,
            'code' => $this->faker->countryCode,
            'phone_code' => $this->faker->randomNumber(3),
            'published' => true,
            'pined' => true,

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
