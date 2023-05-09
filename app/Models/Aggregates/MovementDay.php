<?php

namespace App\Models\Aggregates;

use App\Models\Movement;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MovementDay
{

    static ?Collection $calendar = null;

    public static function findForCalendar(): Collection
    {
        if (!self::$calendar) {
            self::$calendar = DB::table((new Movement())->getTable())
                ->groupByRaw('DATE(`date`)')
                ->selectRaw('DATE(`date`) as date, MAX(urgency) as urgency, COUNT(id) as count')
                ->orderByRaw('DATE(`date`) ASC')
                ->get()
                ->map(fn (\stdClass $data) => new self(...get_object_vars($data)))
                ->keyBy(fn (MovementDay $day) => $day->getDate());
        }
        return self::$calendar;
    }

    public function __construct(private string $date, private string $urgency = 'none', private int $count = 1) {

    }

    public function getYear(): int
    {
        return substr($this->date, 0, 4);
    }

    public function getMonth(): int
    {
        return substr($this->date, 5, 2);
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getUrgency(): string
    {
        return $this->urgency;
    }

    public function getCount(): int
    {
        return $this->count;
    }

}
