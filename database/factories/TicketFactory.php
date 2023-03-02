<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => str()->uuid(),
            'user_id' => fake()->numberBetween(1,10),
            'subject' => fake()->sentence(1),
            'message' => fake()->sentence(10),
            'status' => fake()->randomElement(['pending', 'in-progress', 'approved', 'completed']),
            'created_at' => Carbon::now()
        ];
    }
}
