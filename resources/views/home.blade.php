@extends('base')

@section('content')
    <div class="header">
        <div class="container">
            <div class="header-body">
                <div class="row align-items-end">
                    <div class="col">
                        <h6 class="header-pretitle">
                            Aperçu
                        </h6>
                        <h1 class="header-title">
                            Dashboard
                        </h1>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('movements.create') }}" class="btn btn-primary lift">
                            Ajouter un mouvement
                        </a>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <x-average-daily />
            </div>
            <div class="col">
                <x-bristol-scale-average />
            </div>
        </div>
    </div>

    <x-movements-hourly />

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-header-title fw-bold">
                    Suivi des mouvements
                </h4>
            </div>

            <div class="card-body">
                <x-urgency-calendar />
            </div>
        </div>
    </div>
@endsection
