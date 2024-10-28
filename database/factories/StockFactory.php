<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockFactory extends Factory
{
    public function definition(): array
    {
        return [
            'product_id' => $this->faker->randomElement(Product::pluck('id')),
            'quantity' => $this->faker->numberBetween(1, 1000)
        ];
    }
}