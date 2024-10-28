<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'date' => $this->faker->date,
            'delivery_address' => $this->faker->address,
            'order_id' => $this->faker->randomElement(Order::pluck('id'))
        ];
    }
}