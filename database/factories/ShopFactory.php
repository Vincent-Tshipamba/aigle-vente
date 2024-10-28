<?php

namespace Database\Factories;

use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'address' => $this->faker->address,
            'seller_id' => $this->faker->randomElement(Seller::pluck('id')),
            'is_active' => $this->faker->boolean
        ];
    }
}