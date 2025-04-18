<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Artisan::call('make:superadmin', [
            'name' => 'Support AigleVente',
            'email' => 'supportAigleVente@aiglevente.com',
            'password' => 'supportAigleVente',
        ]);
    }
}