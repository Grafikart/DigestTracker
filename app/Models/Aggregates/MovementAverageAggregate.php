<?php

namespace App\Models\Aggregates;

use App\Models\Movement;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;

class MovementAverageAggregate
{

    public readonly float $average;

    public static function findDailyAverage()
    {
        $value = DB::table((new Movement())->getTable())
            ->selectRaw('MIN(date) as min, MAX(date) as max, COUNT(id) as count')
            ->get()
            ->first();
        return new self(...get_object_vars($value));
    }

    public function __construct(
        string $min,
        string $max,
        int $count
    ) {
        $minDate = new CarbonImmutable($min);
        $maxDate = new CarbonImmutable($max);
        $days = $maxDate->diffInDays($minDate);
        $this->average = round($count / $days, 2) ;
    }

}
