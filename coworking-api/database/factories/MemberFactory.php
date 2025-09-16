<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Member;
use App\Models\Plan;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => null, // asignado en el seeder 
            'plan_id' => Plan::inRandomOrder()->first(), // asignado en el configure
            'company' => fake()->sentence(10),
            'joined_at' => now()->subDays(rand(1, 365)),
        ];
    }
}
