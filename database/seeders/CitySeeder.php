<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $cities = [
            ['name' => 'Kinshasa', 'description' => 'Capitale de la RDC'],
            ['name' => 'Lubumbashi', 'description' => 'Ville minière importante'],
            ['name' => 'Mbuji-Mayi', 'description' => 'Centre de l\'industrie du diamant'],
            ['name' => 'Kisangani', 'description' => 'Ville portuaire sur le fleuve Congo'],
            ['name' => 'Kananga', 'description' => 'Capitale de la province du Kasaï-Central'],
            ['name' => 'Bukavu', 'description' => 'Ville située près du lac Kivu'],
            ['name' => 'Goma', 'description' => 'Ville frontalière avec le Rwanda'],
            ['name' => 'Matadi', 'description' => 'Principal port maritime de la RDC'],
            ['name' => 'Boma', 'description' => 'Ancienne capitale coloniale'],
            ['name' => 'Kolwezi', 'description' => 'Centre minier du cuivre et du cobalt'],
            ['name' => 'Likasi', 'description' => 'Ville minière dans le Haut-Katanga'],
            ['name' => 'Tshikapa', 'description' => 'Ville du diamant dans le Kasaï'],
            ['name' => 'Uvira', 'description' => 'Ville sur le lac Tanganyika'],
            ['name' => 'Bunia', 'description' => 'Capitale de la province de l\'Ituri'],
            ['name' => 'Butembo', 'description' => 'Centre commercial du Nord-Kivu']
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}