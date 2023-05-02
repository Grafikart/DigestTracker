<?php

namespace App\View\Components;

use App\Models\Food;
use App\Models\Movement;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FoodInput extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(private Movement $movement)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.food-input', [
            'foods'     => Food::pluck('name', 'id'),
            'selection' => $this->movement->getFoodIds(),
        ]);
    }
}
