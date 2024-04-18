<?php

namespace App\Models\Aggregates;

use App\Models\Movement;
use Illuminate\Support\Facades\DB;

class BristolAverageAggregate
{

    public readonly float $average;

    public static function findAverage(int $days)
    {
        $value = DB::table((new Movement())->getTable())
            ->selectRaw('AVG(rating) as average')
            ->whereRaw('date > date("now", "-6 days")')
            ->get()
            ->first();
        return new self(...get_object_vars($value));
    }

    public function __construct(
        ?float $average
    ) {
        $this->average = round($average ?? 0, 2) ;
    }

}
