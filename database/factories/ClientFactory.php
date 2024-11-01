<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->word,
            'phone' => $this->faker->phoneNumber,
            'sexe' => $this->faker->randomElement(['Masculin', 'Féminin']),
            'picture' => $this->faker->imageUrl,
            'address' => $this->faker->address,
            'delivery_address' => $this->faker->address,
            'city_id' => $this->faker->randomElement(City::pluck('id')),
            'user_id' => $this->faker->randomElement(User::pluck('id')),
            'is_active' => $this->faker->boolean(),
        ];
    }
}