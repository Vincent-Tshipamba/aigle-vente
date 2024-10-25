<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'image' => $this->faker->imageUrl,
            'description' => $this->faker->sentence,
            'product_id' => Product::factory()
        ];
    }
}
