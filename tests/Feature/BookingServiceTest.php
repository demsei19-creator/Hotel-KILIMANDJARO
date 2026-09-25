<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Room;
use App\Models\RoomType;
use App\Services\BookingService;
use Tests\TestCase;

class BookingServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_book_available_room()
    {
        $type = RoomType::create(['name' => 'Suite', 'capacity' => 2, 'base_price' => 100]);
        $room = Room::create(['room_type_id' => $type->id, 'number' => '101']);

        $service = new BookingService();
        $reservation = $service->bookRoom(
            $type->id, 
            'John Doe', 
            'john@example.com', 
            '2026-10-01', 
            '2026-10-05'
        );

        $this->assertNotNull($reservation);
        $this->assertEquals('101', $reservation->room->number);
        $this->assertEquals('pending', $reservation->status);
    }
}
