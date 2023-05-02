<?php

namespace Database\Seeders;

use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Food;
use App\Models\Movement;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    use WithoutModelEvents;

    public function __construct(private Generator $faker){

    }

    public function run(): void
    {
        \App\Models\User::factory(1)->create();

        $foods = Food::factory(15)->create();

        Movement::factory(500)
            ->create()
            ->each(function(Movement $movement) use ($foods) {
                $movement->foods()->attach($foods->random($this->faker->numberBetween(1, 3)));
            });
    }
}
