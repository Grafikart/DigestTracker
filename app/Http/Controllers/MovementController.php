<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovementFormRequest;
use App\Models\Movement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MovementController extends Controller
{
    public function index()
    {
        return view('movements.index', [
            'movements' => Movement::orderBy('date', 'DESC')->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movement = new Movement();
        $movement->date = new \DateTime();
        $movement->rating = 3;
        return view('movements.form', [
            'movement' => $movement
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovementFormRequest $request): RedirectResponse
    {
        $movement = Movement::create($request->validated());
        $movement->setFoodFromSelect($request->input('food'));
        return to_route('movements.index')->with('success', 'Donnée enregistrée avec succès');
    }

    public function edit(Movement $movement)
    {
        return view('movements.form', [
            'movement' => $movement
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MovementFormRequest $request, Movement $movement)
    {
        if ($request->input('delete')) {
            $movement->delete();
            return to_route('movements.index')->with('success', 'Donnée supprimée avec succès');
        }
        $movement->update($request->validated());
        $movement->setFoodFromSelect($request->input('food'));
        return to_route('movements.index')->with('success', 'Donnée enregistrée avec succès');
    }
}
