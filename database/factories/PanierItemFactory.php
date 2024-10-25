<?php

namespace Database\Factories;

use App\Models\Panier;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class PanierItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'panier_id' => Panier::factory(),
            'product_id' => Product::factory(),
            'quantity' => $this->faker->numberBetween(1, 10),
        ];
    }
}
