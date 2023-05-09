<?php

namespace App\View\Components;

use App\Models\Aggregates\MovementDay;
use App\Models\Month;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UrgencyCalendar extends Component
{

    public function render(): View|Closure|string
    {
        $movements = MovementDay::findForCalendar();
        $firstMovement = $movements->first() ?? new MovementDay(date: date('Y-m-d'));
        $months = Month::createForYear($firstMovement->getYear(), $firstMovement->getMonth());
        return view('components.urgency-calendar', [
            'months' => $months,
            'movements' => $movements
        ]);
    }
}
