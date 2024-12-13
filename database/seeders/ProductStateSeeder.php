<?php

namespace Database\Seeders;

use App\Models\ProductState;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            ['name' => 'Neuf', 'description' => 'Produit entièrement neuf, non utilisé.'],
            ['name' => 'Bon état', 'description' => 'Produit utilisé mais en très bon état.'],
            ['name' => 'Occasion', 'description' => 'Produit d’occasion, présentant des traces d’usage.'],
        ];

        foreach ($states as $state) {
            ProductState::create($state);
        }
    }
}
