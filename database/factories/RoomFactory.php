<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\RoomType;

class RoomFactory extends Factory
{
    public function definition(): array
    {
        return [
            'room_type_id' => RoomType::factory(),
            'number' => (string) $this->faker->unique()->numberBetween(100, 999),
            'is_active' => $this->faker->boolean(90),
        ];
    }
}
