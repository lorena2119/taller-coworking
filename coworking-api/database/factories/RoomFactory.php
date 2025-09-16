<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Room;
use App\Models\Amenity;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'space_id' => null, // se asigna desde el SpaceFactory
            'name'     => fake()->unique()->bothify('Sala-###'),
            'capacity' => fake()->numberBetween(2, 30),
            'type'     => fake()->randomElement(['meeting','workshop','phonebooth','auditorium']),
            'is_active'=> true,
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Room $room) {
            $amenityIds = Amenity::inRandomOrder()
                ->limit(rand(1, 3))
                ->pluck('id');
            $room->amenities()->syncWithoutDetaching($amenityIds);
        });
    }
}
