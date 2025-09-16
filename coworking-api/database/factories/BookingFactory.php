<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Member;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = fake()->dateTimeBetween('+1 day', '+10 days');
        $end   = (clone $start)->modify('+2 hours');
        return [
            'member_id' => null, // se asigna en configure()
            'room_id'   => null, // se asigna en configure()
            'start_at'  => $start,
            'end_at'    => $end,
            'status'    => 'pending',
        ];
    }

    public function configure(): static
    {
        return $this->afterMaking(function (Booking $booking) {
            // Asignar member y room sin solaparse
            $booking->member_id = Member::inRandomOrder()->value('id');

            do {
                $room = Room::inRandomOrder()->first();
                $start = fake()->dateTimeBetween('+1 day', '+10 days');
                $end   = (clone $start)->modify('+2 hours');

                $solapamiento = Booking::where('room_id', $room->id)
                    ->where(function ($q) use ($start, $end) {
                        $q->whereBetween('start_at', [$start, $end])
                        ->orWhereBetween('end_at', [$start, $end]);
                    })
                    ->exists();
            } while ($solapamiento);

            $booking->room_id  = $room->id;
            $booking->start_at = $start;
            $booking->end_at   = $end;

        })->afterCreating(function (Booking $booking) {
            // Crear un pago para la reserva recién creada
            Payment::factory()->create([
                'booking_id' => $booking->id,
            ]);
        });
    }
}
