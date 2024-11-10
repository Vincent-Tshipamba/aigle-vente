<?php

namespace Database\Seeders;

use App\Models\PanierItem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PanierItemSeeder extends Seeder
{
    public function run(): void
    {
        PanierItem::factory()->count(10)->create();
    }
}
