<?php

namespace Database\Factories;

use App\Models\Shop;
use App\Models\CategoryProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'stock_quantity' => $this->faker->numberBetween(0, 100),
            'unit_price' => $this->faker->randomFloat(2, 0, 100),
            'shop_id' => $this->faker->randomElement(Shop::pluck('id')),
            'category_product_id' => $this->faker->randomElement(CategoryProduct::pluck('id'))
        ];
    }
}