<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class FactureFactory extends Factory
{
    public function definition(): array
    {
        return [
            'date_facture' => $this->faker->date,
            'order_id' => Order::factory(),
            'total_tva' => $this->faker->randomFloat(2, 0, 100),
            'total_ht' => $this->faker->randomFloat(2, 0, 100),
            'total_ttc' => $this->faker->randomFloat(2, 0, 100),
            'status' => $this->faker->randomElement(['Non payée', 'Payée'])
        ];
    }
}
