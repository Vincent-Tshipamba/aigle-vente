<?php

namespace Database\Seeders;

use App\Models\CategoryProduct;
use App\Models\Seller;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create();

        $this->call([
            SellerSeeder::class,
            ShopSeeder::class,
            ProductSeeder::class,
            // CategoryProductSeeder::class,
            // ProductStateSeeder::class
        ]);

    }
}
