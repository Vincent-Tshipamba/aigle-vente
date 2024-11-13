<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_date' => $this->faker->date,
            'client_id' => $this->faker->randomElement(Client::pluck('id')),
            'status' => $this->faker->randomElement(['En cours', 'Terminée', 'Annulée']),
            'frais_livraison' => $this->faker->randomFloat(2, 0, 100)
        ];
    }
}