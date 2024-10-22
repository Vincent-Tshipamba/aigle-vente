<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class PanierFactory extends Factory
{
    public function definition(): array
    {
        return [
            'client_id' => Client::factory(),
            'creation_date' => now(),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
