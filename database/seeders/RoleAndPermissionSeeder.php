<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer les rôles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $receptionRole = Role::firstOrCreate(['name' => 'reception']);
        $restaurantRole = Role::firstOrCreate(['name' => 'restaurant']);

        // Créer un utilisateur Admin par défaut s'il n'existe pas
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@kilimandjaro.com'],
            [
                'name' => 'Direction Kilimandjaro',
                'password' => Hash::make('password'),
            ]
        );

        // Assigner le rôle admin à l'utilisateur admin
        if (!$adminUser->hasRole('admin')) {
            $adminUser->assignRole($adminRole);
        }
        
        // Créer un utilisateur Reception
        $receptionUser = User::firstOrCreate(
            ['email' => 'reception@kilimandjaro.com'],
            [
                'name' => 'Réception',
                'password' => Hash::make('password'),
            ]
        );
        if (!$receptionUser->hasRole('reception')) {
            $receptionUser->assignRole($receptionRole);
        }
        
        // Créer un utilisateur Restaurant
        $restaurantUser = User::firstOrCreate(
            ['email' => 'restaurant@kilimandjaro.com'],
            [
                'name' => 'Gérant Restaurant',
                'password' => Hash::make('password'),
            ]
        );
        if (!$restaurantUser->hasRole('restaurant')) {
            $restaurantUser->assignRole($restaurantRole);
        }
    }
}
