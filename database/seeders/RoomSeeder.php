<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomType;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run()
    {
        // Nettoyer les anciennes données pour éviter les doublons si relancé
        Room::truncate();
        RoomType::truncate();

        $type1 = RoomType::create([
            'name' => 'Suite Royale',
            'base_price' => 350.00,
            'capacity' => 2,
        ]);

        $type2 = RoomType::create([
            'name' => 'Chambre Deluxe',
            'base_price' => 150.00,
            'capacity' => 2,
        ]);
        
        $type3 = RoomType::create([
            'name' => 'Chambre Familiale',
            'base_price' => 180.00,
            'capacity' => 4,
        ]);

        Room::create(['room_type_id' => $type1->id, 'number' => '101', 'is_active' => true]);
        Room::create(['room_type_id' => $type2->id, 'number' => '201', 'is_active' => true]);
        Room::create(['room_type_id' => $type2->id, 'number' => '202', 'is_active' => true]);
        Room::create(['room_type_id' => $type3->id, 'number' => '301', 'is_active' => true]);
    }
}
