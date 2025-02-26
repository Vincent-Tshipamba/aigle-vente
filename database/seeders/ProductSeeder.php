<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [

                '_id' => Str::uuid(),
                'name' => 'Casque Audio Bluetooth',
                'description' => 'Casque audio sans fil avec réduction de bruit active, compatible avec tous les appareils Bluetooth.',
                'unit_price' => 99.99,
                'shop_id' => 1,
                'category_product_id' => 10 // Informatique
            ],
            [
                '_id' => Str::uuid(),
                'name' => 'Montre Connectée Sport',
                'description' => 'Montre intelligente avec suivi de l\'activité physique, notifications, et GPS intégré. Idéale pour les sportifs.',
                'unit_price' => 129.99,
                'shop_id' => 2,
                'category_product_id' => 4 // Beauté & Santé
            ],
            [
                '_id' => Str::uuid(),
                'name' => 'Lampe de Bureau LED',
                'description' => 'Lampe de bureau avec éclairage réglable, économie d’énergie et design moderne. Parfaite pour un éclairage doux et efficace.',
                'unit_price' => 45.50,
                'shop_id' => 3,
                'category_product_id' => 3 // Maison & Jardin
            ],
            [
                '_id' => Str::uuid(),
                'name' => 'Tapis de Yoga Antidérapant',
                'description' => 'Tapis antidérapant, confortable, idéal pour la pratique du yoga et du Pilates. Facile à transporter et à entretenir.',
                'unit_price' => 29.90,
                'shop_id' => 4,
                'category_product_id' => 5 // Sports & Loisirs
            ],
            [
                '_id' => Str::uuid(),
                'name' => 'Smartphone Android Galaxy X10',
                'description' => 'Smartphone haut de gamme avec écran OLED 6,5", 128 Go de stockage, caméra 48 MP, et batterie longue durée.',
                'unit_price' => 699.99,
                'shop_id' => 5,
                'category_product_id' => 10 // Informatique
            ],
            [
                '_id' => Str::uuid(),
                'name' => 'Enceinte Bluetooth Portable',
                'description' => 'Enceinte sans fil résistante à l’eau avec un son clair et puissant, idéale pour écouter de la musique en déplacement.',
                'unit_price' => 79.99,
                'shop_id' => 2,
                'category_product_id' => 10 // Informatique
            ],
            [
                '_id' => Str::uuid(),
                'name' => 'Appareil Photo Numérique Reflex',
                'description' => 'Caméra reflex numérique avec capteur de 24.2 MP, compatible avec plusieurs objectifs et accessoires.',
                'unit_price' => 499.99,
                'shop_id' => 7,
                'category_product_id' => 1 // Électronique
            ],
            [
                '_id' => Str::uuid(),
                'name' => 'Brosse Lissante',
                'description' => 'Brosse chauffante pour cheveux, lisse les cheveux rapidement tout en les protégeant de la chaleur excessive.',
                'unit_price' => 35.00,
                'shop_id' => 8,
                'category_product_id' => 4 // Beauté & Santé
            ],
            [
                '_id' => Str::uuid(),
                'name' => 'Coffret Cadeau Parfum Femme',
                'description' => 'Coffret contenant un parfum en édition limitée et des produits de soin assortis. Un cadeau parfait pour toutes les occasions.',
                'unit_price' => 89.99,
                'shop_id' => 6,
                'category_product_id' => 4 // Beauté & Santé
            ],
            [
                '_id' => Str::uuid(),
                'name' => 'Machine à Café Espresso',
                'description' => 'Machine à café automatique avec broyeur intégré, permettant de préparer un espresso parfait à chaque utilisation.',
                'unit_price' => 199.99,
                'shop_id' => 10,
                'category_product_id' => 3 // Maison & Jardin
            ],
            [
                '_id' => Str::uuid(),
                'name' => 'Paire de Sneakers Running',
                'description' => 'Chaussures de sport légères et respirantes, idéales pour les courses longues distances et l’entraînement quotidien.',
                'unit_price' => 79.90,
                'shop_id' => 11,
                'category_product_id' => 5 // Sports & Loisirs
            ],
            [
                '_id' => Str::uuid(),
                'name' => 'Table de Cuisine en Bois Massif',
                'description' => 'Table de cuisine élégante en bois massif, robuste et facile à entretenir. Idéale pour les repas en famille.',
                'unit_price' => 249.00,
                'shop_id' => 12,
                'category_product_id' => 3 // Maison & Jardin
            ],
            [
                '_id' => Str::uuid(),
                'name' => 'Lunettes de Soleil Polarized',
                'description' => 'Lunettes de soleil avec verres polarisés offrant une protection UV à 100%. Design moderne et léger.',
                'unit_price' => 39.99,
                'shop_id' => 9,
                'category_product_id' => 2 // Mode
            ],
            [
                '_id' => Str::uuid(),
                'name' => 'Sac à Dos de Voyage',
                'description' => 'Sac à dos spacieux et confortable, avec plusieurs compartiments pour organiser vos affaires pendant vos voyages.',
                'unit_price' => 59.99,
                'shop_id' => 14,
                'category_product_id' => 2 // Mode
            ],
            [
                '_id' => Str::uuid(),
                'name' => 'Blender Haut de Gamme',
                'description' => 'Blender puissant avec différentes vitesses et programmes pour réaliser smoothies, soupes, et sauces maison.',
                'unit_price' => 149.99,
                'shop_id' => 13,
                'category_product_id' => 3 // Maison & Jardin
            ],
            [
                '_id' => Str::uuid(),
                'name' => 'Chaise de Bureau Ergonomique',
                'description' => 'Chaise de bureau avec dossier ajustable, soutien lombaire et accoudoirs réglables pour un confort optimal pendant les longues heures de travail.',
                'unit_price' => 179.99,
                'shop_id' => 6,
                'category_product_id' => 3 // Maison & Jardin
            ],
            [
                '_id' => Str::uuid(),
                'name' => 'Trousse de Maquillage Professionnelle',
                'description' => 'Trousse de maquillage avec des pinceaux de qualité professionnelle et des produits essentiels pour un look parfait.',
                'unit_price' => 49.99,
                'shop_id' => 2,
                'category_product_id' => 4 // Beauté & Santé
            ],
            [
                '_id' => Str::uuid(),
                'name' => 'Système d\'alarme sans fil',
                'description' => 'Système de sécurité sans fil avec détecteurs de mouvement et sirène, facile à installer et à configurer.',
                'unit_price' => 249.00,
                'shop_id' => 1,
                'category_product_id' => 1 // Électronique
            ]
        ]);
    }
}
