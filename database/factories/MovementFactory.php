<?php

namespace Database\Factories;

use App\Models\Movement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movement>
 */
class MovementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $urgencyOptions = array_keys(Movement::URGENCY_OPTIONS);
        return [
          'rating' => $this->faker->numberBetween(1, 7),
          'urgency' => $urgencyOptions[array_rand(array_keys($urgencyOptions))],
          'pain' => $this->faker->boolean(),
          'date' => $this->faker->dateTimeBetween('-1 year')
        ];
    }
}
