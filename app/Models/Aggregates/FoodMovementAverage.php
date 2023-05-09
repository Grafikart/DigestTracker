<?php

namespace App\Models\Aggregates;

use App\Models\Movement;
use Illuminate\Support\Facades\DB;

/**
 * Find the most "risky" food item (the one that cause the most urgency)
 */
class FoodMovementAverage
{

    public static function findMostRiskyFood(): self
    {
        dd(DB::table('movements', 'm')
            ->limit(10)
            ->join('food_movement', 'm.id', '=', 'food_movement.movement_id')
            ->join('food_movement', 'm.id', '=', 'food_movement.movement_id')
        );
    }

    public function __construct(private ?float $average) {
    }

    public function getAverage(): float
    {
        return $this->average ?? 0;
    }
}
