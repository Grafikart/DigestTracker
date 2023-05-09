<?php

namespace App\View\Components;

use App\Models\Aggregates\BristolAverageAggregate;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BristolScaleAverage extends Component
{

    public function render(): View|Closure|string
    {
        $days = 5;
        $averages = BristolAverageAggregate::findAverage($days);

        return view('components.number-card', [
            'value' => $averages->average,
            'label' => sprintf("Bristol (%d derniers jours)", $days),
            'icon' => 'clipboard2-data'
        ]);
    }
}
