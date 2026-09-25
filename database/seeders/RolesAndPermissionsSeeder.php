<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Création des rôles
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $receptionRole = Role::firstOrCreate(['name' => 'Reception']);
        $restaurantRole = Role::firstOrCreate(['name' => 'Restaurant']);

        // Assigner Admin à admin@hotel.com
        $adminUser = User::where('email', 'admin@hotel.com')->first();
        if ($adminUser) {
            $adminUser->assignRole($adminRole);
        }

        // Créer un utilisateur Réception de test
        $receptionist = User::firstOrCreate([
            'email' => 'reception@hotel.com',
        ], [
            'name' => 'Réception',
            'password' => Hash::make('password'),
        ]);
        $receptionist->assignRole($receptionRole);

        // Créer un utilisateur Restaurant de test
        $restaurateur = User::firstOrCreate([
            'email' => 'restaurant@hotel.com',
        ], [
            'name' => 'Restaurant',
            'password' => Hash::make('password'),
        ]);
        $restaurateur->assignRole($restaurantRole);
    }
}
