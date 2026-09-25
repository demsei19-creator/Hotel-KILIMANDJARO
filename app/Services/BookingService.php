<?php

namespace App\Services;

use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use Exception;

class BookingService
{
    public function bookRoom(int $roomTypeId, string $name, string $email, string $checkIn, string $checkOut)
    {
        return DB::transaction(function () use ($roomTypeId, $name, $email, $checkIn, $checkOut) {
            // Cherche une chambre qui n'a aucune réservation chevauchant les dates
            $availableRoom = Room::where('room_type_id', $roomTypeId)
                ->where('is_active', true)
                ->whereDoesntHave('reservations', function ($query) use ($checkIn, $checkOut) {
                    $query->where(function ($q) use ($checkIn, $checkOut) {
                        $q->where('check_in', '<', $checkOut)
                          ->where('check_out', '>', $checkIn)
                          ->whereIn('status', ['pending', 'confirmed']);
                    });
                })
                ->first();

            if (!$availableRoom) {
                throw new Exception("Aucune chambre disponible pour ces dates.");
            }

            $days = (strtotime($checkOut) - strtotime($checkIn)) / (60 * 60 * 24);
            $totalAmount = $availableRoom->roomType->base_price * $days;

            return Reservation::create([
                'room_id' => $availableRoom->id,
                'customer_name' => $name,
                'customer_email' => $email,
                'check_in' => $checkIn,
                'check_out' => $checkOut,
                'total_amount' => $totalAmount,
                'status' => 'pending'
            ]);
        });
    }
}
