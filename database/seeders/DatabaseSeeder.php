<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Zoker\Shop\Models\Address;
use Zoker\Shop\Models\Brand;
use Zoker\Shop\Models\Category;
use Zoker\Shop\Models\Country;
use Zoker\Shop\Models\PaymentMethod;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Zoker\Shop\Models\Product;
use Zoker\Shop\Models\ShippingMethod;
use Zoker\Shop\Models\User;
use Zoker\Shop\Models\Wishlist;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::insert([
            'name' => 'zoker',
            'surname' => 'zokerov',
            'email' => 'zoker68@ya.ru',
            'password' => '$2y$12$XsiXQx.5y55ymlG2hhUXMORiSg8SDhiKZHyPaPhCEeynqUZUfkZL6',
            'phone' => '89888888888',
            'company' => 'zoker sp',
            'vat' => '1234567890',
            'remember_token' => Str::random(10),
        ]);

        User::factory()->count(10)->create();

        $this->properties();

        $mainCategories = ['Категория 1', 'Категория 2', 'Категория 3', 'Категория 4', 'Категория 5', 'Категория 6', 'Категория 7', 'Категория 8'];

        foreach ($mainCategories as $categoryName) {
            $category = Category::factory([
                'name' => $categoryName,
                'parent_id' => 1,
            ])->create();
            if (mt_rand(0, 1)) {
                Category::factory(['parent_id' => $category->id])->count(mt_rand(3, 5))->hasChildren(mt_rand(0, 5))->create();
            }
        }

        $brand = Brand::factory()->count(10)->create();

        $categories = Category::all();
        $users = User::all();
        foreach (range(1, 500) as $id) {
            Product::factory()->count(10)
                ->hasAttached($categories->random())
                ->hasQuestions((mt_rand(0, 5)))
                ->hasReviews((mt_rand(0, 3)))
                ->recycle($users)
                ->recycle($brand)
                ->create();
        }

        $products = Product::all();
        Wishlist::factory()->count(1000)->recycle($users)->recycle($products)->create();

        ShippingMethod::factory()->count(3)->create();

        PaymentMethod::factory()->count(3)->create();

        $this->call([
            LocationSeeder::class,
            OrderStatusSeed::class,
        ]);

        $countries = Country::all();
        Address::factory()->recycle($countries)->recycle(User::find(1))->count(3)->create();

        Artisan::call('scout:flush', ['model' => 'Zoker\Shop\Models\Product']);
        Artisan::call('scout:import', ['model' => 'Zoker\Shop\Models\Product']);
    }

    public function properties()
    {
        $properties = [
            [
                'name' => 'TextArea Without Filter',
                'type' => 'textarea',
                'filter' => 'none',
                'sort' => 88,
                'options' => null,
            ],
            [
                'name' => 'String select with options',
                'type' => 'text',
                'filter' => 'select',
                'sort' => 11,
                'options' => json_encode([
                    ['value' => 'first'],
                    ['value' => 'second'],
                    ['value' => 'third'],
                ]),
            ],
            [
                'name' => 'Text no filter',
                'type' => 'text',
                'filter' => 'none',
                'sort' => 64,
                'options' => null,
            ],
            [
                'name' => 'Text Checkbox Options',
                'type' => 'text',
                'filter' => 'checkbox',
                'sort' => 18,
                'options' => json_encode([
                    ['value' => '1'],
                    ['value' => '2'],
                    ['value' => '3'],
                ]),
            ],
            [
                'name' => 'Text checkbox No options',
                'type' => 'text',
                'filter' => 'checkbox',
                'sort' => 52,
                'options' => json_encode([]),
            ],
            [
                'name' => 'Text Radio Options',
                'type' => 'text',
                'filter' => 'radio',
                'sort' => 51,
                'options' => json_encode([
                    ['value' => '1'],
                    ['value' => '2'],
                    ['value' => '3'],
                ]),
            ],
            [
                'name' => 'Text radio No options',
                'type' => 'text',
                'filter' => 'radio',
                'sort' => 46,
                'options' => json_encode([]),
            ],
            [
                'name' => 'Multi Checkbox',
                'type' => 'textarea',
                'filter' => 'radio',
                'sort' => 26,
                'options' => null,
            ],
            [
                'name' => 'Multi radio',
                'type' => 'textarea',
                'filter' => 'radio',
                'sort' => 85,
                'options' => null,
            ],
            [
                'name' => 'Number without',
                'type' => 'number',
                'filter' => 'none',
                'sort' => 89,
                'options' => null,
            ],
            [
                'name' => 'Number Checkbox No options',
                'type' => 'number',
                'filter' => 'checkbox',
                'sort' => 90,
                'options' => json_encode([]),
            ],
            [
                'name' => 'Number chechox options',
                'type' => 'number',
                'filter' => 'checkbox',
                'sort' => 91,
                'options' => json_encode([
                    ['value' => '1'],
                    ['value' => '2'],
                    ['value' => '3'],
                ]),
            ],
            [
                'name' => 'Number radio No Options',
                'type' => 'number',
                'filter' => 'radio',
                'sort' => 92,
                'options' => json_encode([]),
            ],
            [
                'name' => 'Number radio Options',
                'type' => 'number',
                'filter' => 'radio',
                'sort' => 93,
                'options' => json_encode([
                    ['value' => '1'],
                    ['value' => '2'],
                    ['value' => '3'],
                ]),
            ],
            [
                'name' => 'Number select Options',
                'type' => 'number',
                'filter' => 'select',
                'sort' => 94,
                'options' => json_encode([
                    ['value' => '1'],
                    ['value' => '2'],
                    ['value' => '3'],
                ]),
            ],
            [
                'name' => 'Number select no options',
                'type' => 'number',
                'filter' => 'select',
                'sort' => 95,
                'options' => json_encode([]),
            ],
            [
                'name' => 'Number Range',
                'type' => 'number',
                'filter' => 'range',
                'sort' => 96,
                'options' => null,
            ],
            [
                'name' => 'Switcher No',
                'type' => 'boolean',
                'filter' => 'none',
                'sort' => 97,
                'options' => null,
            ],
            [
                'name' => 'Switcher Checkbox',
                'type' => 'boolean',
                'filter' => 'checkbox',
                'sort' => 98,
                'options' => null,
            ],
            [
                'name' => 'Switcher Radio',
                'type' => 'boolean',
                'filter' => 'radio',
                'sort' => 99,
                'options' => null,
            ],
            [
                'name' => 'Switcher Select',
                'type' => 'boolean',
                'filter' => 'select',
                'sort' => 100,
                'options' => null,
            ],
            [
                'name' => 'Color NO',
                'type' => 'color',
                'filter' => 'none',
                'sort' => 101,
                'options' => null,
            ],
            [
                'name' => 'Color Checkbox Options',
                'type' => 'color',
                'filter' => 'checkbox',
                'sort' => 102,
                'options' => json_encode([
                    ['value' => '#ba3636'],
                    ['value' => '#1f6e35'],
                    ['value' => '#eef784'],
                ]),
            ],
            [
                'name' => 'Color checkbox no options',
                'type' => 'color',
                'filter' => 'checkbox',
                'sort' => 103,
                'options' => json_encode([]),
            ],
            [
                'name' => 'Color Radio No options',
                'type' => 'color',
                'filter' => 'radio',
                'sort' => 104,
                'options' => json_encode([]),
            ],
            [
                'name' => 'Color radio Options',
                'type' => 'color',
                'filter' => 'radio',
                'sort' => 105,
                'options' => json_encode([
                    ['value' => '#1a1818'],
                    ['value' => '#ff0000'],
                    ['value' => '#0029ff'],
                ]),
            ],
        ];

        foreach ($properties as $property) {
            DB::table('properties')->insert($property);
        }
    }
}
