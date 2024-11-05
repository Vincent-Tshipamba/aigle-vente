<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Créer des permissions spécifiques à votre contexte
        Permission::firstOrCreate(['name' => 'voir les produits']);
        Permission::firstOrCreate(['name' => 'acheter des produits']);
        Permission::firstOrCreate(['name' => 'gérer les commandes']);
        Permission::firstOrCreate(['name' => 'accéder aux rapports de vente']);
        Permission::firstOrCreate(['name' => 'gérer l\'inventaire']);
        Permission::firstOrCreate(['name' => 'voir les clients']);
        Permission::firstOrCreate(['name' => 'créer une boutique']);
        Permission::firstOrCreate(['name' => 'modifier une boutique']);
        Permission::firstOrCreate(['name' => 'supprimer une boutique']);
        Permission::firstOrCreate(['name' => 'gérer les utilisateurs']);
        Permission::firstOrCreate(['name' => 'gérer tout']);

        // Créer des rôles et assigner des permissions
        $clientRole = Role::firstOrCreate(['name' => 'client']);
        $sellerRole = Role::firstOrCreate(['name' => 'vendeur']);
        $superadminRole = Role::firstOrCreate(['name' => 'superadmin']);

        // Assigner des permissions aux rôles
        $clientRole->givePermissionTo(['voir les produits', 'acheter des produits']);
        $sellerRole->givePermissionTo(['créer une boutique', 'modifier une boutique', 'supprimer une boutique', 'gérer les commandes', 'accéder aux rapports de vente', 'gérer l\'inventaire', 'voir les clients']);
        $superadminRole->givePermissionTo(Permission::all());  // Le superadmin a toutes les permissions
    }
}