<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Room;
use App\Models\Space;

class SpaceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'address' => fake()->streetAddress(),
        ];
    }

    /**
     * Se ejecuta automáticamente después de crear cada Space.
     */
    public function configure(): static
    {
        return $this->afterCreating(function (Space $space) {
            Room::factory()
                ->count(rand(3, 5))
                ->create(['space_id' => $space->id]);
        });
    }
}

