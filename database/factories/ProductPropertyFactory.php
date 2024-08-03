<?php

namespace Zoker\Shop\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Zoker\Shop\Models\Product;
use Zoker\Shop\Models\ProductProperty;
use Zoker\Shop\Models\Property;

class ProductPropertyFactory extends Factory
{
    protected $model = ProductProperty::class;

    public function definition(): array
    {

        $product = Product::all()->random();
        $property = Property::whereDoesntHave('products', fn ($query) => $query->where('product_id', $product->id))->get()->random();
        if (! empty($property->options)) {
            $word = Arr::random($property->options)['value'];
        } else {
            $word = $this->faker->word;
        }

        return [
            'value' => $word,
            'index_value' => Str::slug($word),

            'product_id' => $product->id,
            'property_id' => $property->id,
        ];
    }
}
