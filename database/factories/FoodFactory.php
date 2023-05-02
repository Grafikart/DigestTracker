<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */

class FoodFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->foodName()
        ];
    }
}
