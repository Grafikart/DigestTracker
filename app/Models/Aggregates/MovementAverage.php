<?php

namespace App\Models\Aggregates;

use App\Models\Movement;
use Illuminate\Support\Facades\DB;

class MovementAverage
{

    public static function findAverageDaily(): self
    {
        return DB::table((new Movement())->getTable())
            ->selectRaw('COUNT(id) / COUNT(DISTINCT DATE(date)) as average')
            ->get()
            ->map(fn (\stdClass $data) => new self(...get_object_vars($data)))
            ->first();
    }

    public function __construct(private ?float $average) {
    }

    public function getAverage(): float
    {
        return $this->average ?? 0;
    }
}
