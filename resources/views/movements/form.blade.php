@extends('base')

@section('content')

    <main class="container">

        <header class="header mt-md-5">
            <div class="header-body">

                <h6 class="header-pretitle">
                    <a href="{{ route('movements.index') }}">Mouvements</a>
                </h6>

                <div class="d-flex justify-content-between">
                    <h1 class="header-title display-4">
                        @if($movement->exists)
                            Editer un mouvement
                        @else
                            Créer un mouvement
                        @endif
                    </h1>
                </div>

            </div>
        </header>

        <form method="post" action="{{ $movement->exists ? route('movements.update', $movement) : route('movements.store') }}">
            <div class="card">
                <div class="card-body">
                    @csrf
                    @method($movement->exists ? 'PUT' : 'POST')
                    <x-input :value="$movement->urgency" name="urgency" label="Urgence"
                             :options="\App\Models\Movement::URGENCY_OPTIONS"/>
                    <x-input :value="$movement->rating" name="rating" label="Type"
                             :options="\App\Models\Movement::BRISTOL_SCALE"/>
                    <x-input :value="$movement->pain" type="checkbox" name="pain" label="Douleur abdominale"/>
                    <x-input :value="$movement->date" type="datetime-local" name="date" label="Date"/>
                    <x-input :value="$movement->comment" type="textarea" name="comment" label="Commentaire" />
                    <x-food-input :movement="$movement"/>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary">Enregistrer</button>
                        @if($movement->exists)
                            <button value="1" name="delete" onclick="return confirm('Voulez vous vraiment supprimer ?')" class="btn btn-outline-danger text-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        @endif
                    </div>
                </div>
            </div>

        </form>

    </main>

@endsection
