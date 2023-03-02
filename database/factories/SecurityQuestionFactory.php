<?php

namespace Database\Factories;

use App\Models\SecurityQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;

class SecurityQuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SecurityQuestion::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'momentum_id' => $this->faker->randomNumber(8, true),
            'question' => $this->faker->sentence(2) . '?',
        ];
    }
}
