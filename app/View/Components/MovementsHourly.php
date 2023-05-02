<?php

namespace App\View\Components;

use App\Models\Movement;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class MovementsHourly extends Component
{
    public function render(): View|Closure|string
    {
        /** @var Collection $hours */
        $hours = DB::table((new Movement())->getTable())
            ->selectRaw('STRFTIME(\'%H\', date) as hour, COUNT(id) as count, urgency')
            ->groupByRaw('hour, urgency')
            ->orderByRaw('hour ASC')
            ->get()
            ->groupBy(fn (\stdClass $item) => intval($item->hour))
            ->map(fn (Collection $items) => $items->keyBy('urgency')->map(fn(\stdClass $item) => $item->count));
        $max = $hours->max(fn (Collection $items) => $items->sum());
        $firstHour = $hours->keys()->first();
        $lastHour = $hours->keys()->last();
        return view('components.movements-hourly', [
            'hours' => $hours,
            'max' => $max,
            'firstHour' => $firstHour,
            'lastHour' => $lastHour,
        ]);
    }
}
