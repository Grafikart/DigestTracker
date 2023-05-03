<?php

namespace App\Http\Controllers;

use App\Models\Aggregates\MovementAverage;
use App\Models\Aggregates\MovementDay;

class HomeController extends Controller
{

    public function index()
    {
        $movements = MovementDay::findForCalendar();
        $firstMovement = $movements->first() ?? new MovementDay(date: date('Y-m-d'));
        return view('home', [
            'average' => MovementAverage::findAverageDaily()->getAverage(),
            'months' => \App\Models\Month::createForYear($firstMovement->getYear(), $firstMovement->getMonth()),
            'movements' => $movements,
        ]);
    }

}
