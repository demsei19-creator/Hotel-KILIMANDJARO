<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Room;

class ReservationFactory extends Factory
{
    public function definition(): array
    {
        $checkIn = fake()->dateTimeBetween('-1 month', '+2 months');
        $checkOut = (clone $checkIn)->modify('+' . fake()->numberBetween(1, 14) . ' days');
        
        return [
            'room_id' => Room::factory(),
            'customer_name' => fake()->name(),
            'customer_email' => fake()->safeEmail(),
            'check_in' => $checkIn->format('Y-m-d'),
            'check_out' => $checkOut->format('Y-m-d'),
            'total_amount' => fake()->randomFloat(2, 100, 2000),
            'status' => fake()->randomElement(['pending', 'confirmed', 'cancelled']),
        ];
    }
}
