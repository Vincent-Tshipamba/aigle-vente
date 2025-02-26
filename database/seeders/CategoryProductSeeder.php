<?php

namespace Database\Seeders;

use App\Models\CategoryProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Électronique', 'image' => 'img/categories/electronic_category.png', 'description' => 'Appareils électroniques, téléphones, tablettes et gadgets.'],
            ['name' => 'Mode', 'image' => 'img/categories/fashion_category.png', 'description' => 'Vêtements, chaussures, et accessoires pour hommes et femmes.'],
            ['name' => 'Maison & Jardin', 'image' => 'img/categories/home_garden_category.png', 'description' => 'Mobilier, décoration, et articles de jardinage.'],
            ['name' => 'Beauté & Santé', 'image' => 'img/categories/beauty_health_category.png', 'description' => 'Produits de beauté, maquillage, et soins de santé.'],
            ['name' => 'Sports & Loisirs', 'image' => 'img/categories/sports_outdoors_category.png', 'description' => 'Équipements sportifs, vêtements, et articles de plein air.'],
            ['name' => 'Alimentation', 'image' => 'img/categories/food_category.png', 'description' => 'Produits alimentaires, boissons, et épicerie.'],
            ['name' => 'Livres & Médias', 'image' => 'img/categories/books_media_category.png', 'description' => 'Livres, magazines, musique, et films.'],
            ['name' => 'Jouets & Enfants', 'image' => 'img/categories/toys_kids_category.png', 'description' => 'Jouets et articles pour enfants, y compris vêtements et accessoires.'],
            ['name' => 'Automobile', 'image' => 'img/categories/automobile_category.png', 'description' => 'Véhicules, pièces détachées, et accessoires pour autos.'],
            ['name' => 'Informatique', 'image' => 'img/categories/computers_category.png', 'description' => 'Ordinateurs, logiciels, périphériques, et accessoires.'],
            ['name' => 'Bricolage', 'image' => 'img/categories/diy_category.png', 'description' => 'Outils, matériel de bricolage, et équipement de construction.'],
            ['name' => 'Animaux', 'image' => 'img/categories/pets_category.png', 'description' => 'Produits pour animaux de compagnie, y compris nourriture et accessoires.'],
            ['name' => 'Voyages', 'image' => 'img/categories/travel_category.png', 'description' => 'Articles pour les voyages, bagages, et accessoires de tourisme.'],
            ['name' => 'Bijoux & Montres', 'image' => 'img/categories/jewelry_category.png', 'description' => 'Montres, bijoux, et accessoires de luxe.'],
            ['name' => 'Musique & Instruments', 'image' => 'img/categories/music_instruments_category.png', 'description' => 'Instruments de musique, accessoires, et équipements audio.'],
            ['name' => 'Articles de Fête', 'image' => 'img/categories/party_supplies_category.png', 'description' => 'Décorations, fournitures de fête, et déguisements.'],
            ['name' => 'Art & Artisanat', 'image' => 'img/categories/art_craft_category.png', 'description' => 'Matériel d’art, fournitures de peinture, et artisanat.'],
            ['name' => 'Équipement Industriel', 'image' => 'img/categories/industrial_category.png', 'description' => 'Équipements pour l’industrie, y compris machines et outils spécialisés.']
        ];


        foreach ($categories as $category) {
            CategoryProduct::create($category);
        }

    }
}
