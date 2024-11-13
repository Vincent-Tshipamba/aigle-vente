<?php

namespace Database\Seeders;

use App\Models\Facture;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FactureSeeder extends Seeder
{
    public function run(): void
    {
        Facture::factory(200)->create();
    }
}