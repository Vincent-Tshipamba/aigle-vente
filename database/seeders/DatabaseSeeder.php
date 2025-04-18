<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Seller;
use App\Models\CategoryProduct;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\SuperAdminSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create();

        $this->call([
            // CategoryProductSeeder::class,
            // ProductStateSeeder::class,
            SuperAdminSeeder::class,
        ]);

    }
}