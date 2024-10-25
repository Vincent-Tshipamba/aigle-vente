<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class CreateSuperAdmin extends Command
{
    protected $signature = 'make:superadmin {name} {email} {password}';

    protected $description = 'Commande console pour la creation d\'un super administrateur.';

    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = bcrypt($this->argument('password'));


        // Créer l'utilisateur
        $user = User::firstOrCreate([
            'name' => $name,
            'email' => $email,
            'password' => $password,

        ]);

        // Vérifier si le rôle super-admin existe, sinon le créer
        $role = Role::firstOrCreate(['name' => 'superadmin']);

        // Associer le rôle à l'utilisateur
        $user->roles()->attach($role->id);

        $this->info("Super-admin créé : {$user->name} ({$user->email}) ");
    }
}