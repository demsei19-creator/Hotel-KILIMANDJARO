<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomType;
use App\Models\Room;
use App\Models\Reservation;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        if (!User::where('email', 'demsei19@gmail.com')->exists()) {
            User::factory()->create([
                'name' => 'Admin',
                'email' => 'demsei19@gmail.com',
                'password' => bcrypt('Bigidev@99'),
            ]);
        }

        $roomTypes = RoomType::factory()->count(6)->create();

        foreach ($roomTypes as $type) {
            Room::factory()->count(rand(2, 6))->create([
                'room_type_id' => $type->id
            ]);
        }
        
        $rooms = Room::all();
        foreach ($rooms->random(min(10, $rooms->count())) as $room) {
            Reservation::factory()->count(rand(1, 3))->create([
                'room_id' => $room->id
            ]);
        }
    }
}
