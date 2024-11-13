<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seller>
 */
class SellerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'sexe' => $this->faker->randomElement(['Masculin', 'Féminin']),
            'picture' => $this->faker->imageUrl,
            'address' => $this->faker->address,
            'user_id' => $this->faker->randomElement(User::pluck('id')),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
