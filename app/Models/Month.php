<?php

namespace App\Models;

use Carbon\CarbonImmutable;

class Month
{

    /**
     * @return Month[]
     */
    public static function createForYear(int $yearStart, int $monthStart): array
    {
        $months = [];
        for($i = 0; $i < 12; $i++) {
            $months[] = new Month($yearStart, $monthStart + $i);
        }
        return $months;
    }

    public function __construct(private int $year, private int $month){

    }

    public function getName (): string
    {
        return CarbonImmutable::create($this->year, $this->month)->isoFormat('MMMM');
    }

    public function startDayOfWeek (): int
    {
        return CarbonImmutable::create($this->year, $this->month, 1)->dayOfWeekIso;
    }

    /**
     * @return string[]
     */
    public function getDays(): array
    {
        $days = [];
        $daysInMonth = CarbonImmutable::create($this->year, $this->month, 1)->daysInMonth;
        for($i = 0; $i < $daysInMonth; $i++) {
            $days[] = CarbonImmutable::create($this->year, $this->month, 1 + $i)->format('Y-m-d');
        }
        return $days;
    }

}
