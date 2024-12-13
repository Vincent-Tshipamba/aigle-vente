<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShopCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shop_categories')->insert([
            ['name' => 'Vêtements', 'description' => 'Magasins de vêtements pour hommes et femmes'],
            ['name' => 'Électronique', 'description' => 'Magasins de gadgets et appareils électroniques'],
            ['name' => 'Alimentation', 'description' => 'Supermarchés et magasins alimentaires'],
            ['name' => 'Meubles', 'description' => 'Magasins de meubles et décorations'],
            ['name' => 'Sports', 'description' => 'Magasins spécialisés en articles de sport'],
        ]);
    }
}
