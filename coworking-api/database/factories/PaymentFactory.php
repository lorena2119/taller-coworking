<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Payment;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Payment::class;

    public function definition(): array
    {
        return [
            'booking_id' => null, 
            'method' => fake()->randomElement(['card','cash','transfer']),
            'amount' => fake()->numberBetween(5000, 50000),
            'status' => 'pending',
        ];
    }
}
