<?php

namespace App\View\Components;

use App\Models\Aggregates\MovementAverageAggregate;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AverageDaily extends Component
{
    public function __construct()
    {
    }

    public function render(): View|Closure|string
    {
        $averages = MovementAverageAggregate::findDailyAverage();

        return view('components.number-card', [
            'value' => $averages->average,
            'label' => 'Moyenne par jour',
            'icon' => 'calendar-event'
        ]);
    }
}
