<?php

namespace Database\Seeders;

use App\Models\Panier;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PanierSeeder extends Seeder
{
    public function run(): void
    {
        Panier::factory()->count(10)->create();
    }
}
