<?php

namespace Database\Seeders;

use App\Models\CategoryProduct;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create();

        $this->call([
            CitySeeder::class,
            CategoryProductSeeder::class,
            SellerSeeder::class,
            ClientSeeder::class,
            ShopSeeder::class,
            ProductSeeder::class,
            OrderSeeder::class,
            PhotoSeeder::class,
            FactureSeeder::class,
            OrderProductSeeder::class,
            DeliverySeeder::class
        ]);

    }
}
