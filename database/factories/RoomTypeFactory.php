<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoomTypeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement(['Suite Royale', 'Chambre Deluxe', 'Chambre Familiale', 'Suite Exécutive', 'Chambre Standard', 'Suite Présidentielle', 'Bungalow sur l\'eau', 'Villa Privée', 'Chambre Océan', 'Suite Panoramique']),
            'base_price' => $this->faker->randomFloat(2, 50, 500),
            'capacity' => $this->faker->numberBetween(1, 6),
        ];
    }
}
