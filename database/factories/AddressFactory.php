<?php

namespace Zoker68\Shop\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Zoker68\Shop\Models\Address;
use Zoker68\Shop\Models\Country;
use Zoker68\Shop\Models\User;

class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'session' => $this->faker->word(),
            'zip' => $this->faker->postcode(),
            'city' => $this->faker->city(),
            'address' => $this->faker->address(),

            'user_id' => User::factory(),
            'country_id' => Country::factory(),
        ];
    }
}