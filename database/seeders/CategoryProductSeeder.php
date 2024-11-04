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
            ['name' => 'Électronique', 'image' => 'electronics.jpg', 'description' => 'Appareils électroniques, téléphones, tablettes et gadgets.'],
            ['name' => 'Mode', 'image' => 'fashion.jpg', 'description' => 'Vêtements, chaussures, et accessoires pour hommes et femmes.'],
            ['name' => 'Maison & Jardin', 'image' => 'home_garden.jpg', 'description' => 'Mobilier, décoration, et articles de jardinage.'],
            ['name' => 'Beauté & Santé', 'image' => 'beauty_health.jpg', 'description' => 'Produits de beauté, maquillage, et soins de santé.'],
            ['name' => 'Sports & Loisirs', 'image' => 'sports_outdoors.jpg', 'description' => 'Équipements sportifs, vêtements, et articles de plein air.'],
            ['name' => 'Alimentation', 'image' => 'food.jpg', 'description' => 'Produits alimentaires, boissons, et épicerie.'],
            ['name' => 'Livres & Médias', 'image' => 'books_media.jpg', 'description' => 'Livres, magazines, musique, et films.'],
            ['name' => 'Jouets & Enfants', 'image' => 'toys_kids.jpg', 'description' => 'Jouets et articles pour enfants, y compris vêtements et accessoires.'],
            ['name' => 'Automobile', 'image' => 'automobile.jpg', 'description' => 'Véhicules, pièces détachées, et accessoires pour autos.'],
            ['name' => 'Informatique', 'image' => 'computers.jpg', 'description' => 'Ordinateurs, logiciels, périphériques, et accessoires.'],
            ['name' => 'Bricolage', 'image' => 'diy.jpg', 'description' => 'Outils, matériel de bricolage, et équipement de construction.'],
            ['name' => 'Animaux', 'image' => 'pets.jpg', 'description' => 'Produits pour animaux de compagnie, y compris nourriture et accessoires.'],
            ['name' => 'Voyages', 'image' => 'travel.jpg', 'description' => 'Articles pour les voyages, bagages, et accessoires de tourisme.'],
            ['name' => 'Bijoux & Montres', 'image' => 'jewelry.jpg', 'description' => 'Montres, bijoux, et accessoires de luxe.'],
            ['name' => 'Musique & Instruments', 'image' => 'music_instruments.jpg', 'description' => 'Instruments de musique, accessoires, et équipements audio.'],
            ['name' => 'Articles de Fête', 'image' => 'party_supplies.jpg', 'description' => 'Décorations, fournitures de fête, et déguisements.'],
            ['name' => 'Art & Artisanat', 'image' => 'art_craft.jpg', 'description' => 'Matériel d’art, fournitures de peinture, et artisanat.'],
            ['name' => 'Équipement Industriel', 'image' => 'industrial.jpg', 'description' => 'Équipements pour l’industrie, y compris machines et outils spécialisés.']
        ];

        foreach ($categories as $category) {
            CategoryProduct::create($category);
        }
       
    }
}