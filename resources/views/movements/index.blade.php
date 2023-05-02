@extends('base')

@section('content')

    <main class="container">

        <header class="header mt-md-5">
            <div class="header-body">

                <h6 class="header-pretitle">
                    Mouvements
                </h6>

                <div class="d-flex justify-content-between">
                    <h1 class="header-title display-4">
                        Tous les mouvements
                    </h1>
                    <a class="btn btn-primary" href="{{ route('movements.create') }}">
                        <i class="bi bi-plus-circle"></i>
                        Ajouter
                    </a>
                </div>

            </div>
        </header>

        <div class="table-responsive mb-0">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-sm table-nowrap card-table">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Urgence</th>
                            <th class="text-end">Actions</th>
                        </tr>
                        </thead>
                        @foreach($movements as $movement)
                            <tr>
                                <td>
                                    <a href="{{ route('movements.edit', $movement) }}">
                                        {{ ucfirst($movement->date->isoFormat('dddd DD MMMM à kk\h')) }}
                                    </a>
                                </td>
                                <td>
                                    <x-urgency-badge :level="$movement->urgency"></x-urgency-badge>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('movements.edit', $movement) }}" class="text-muted">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="px-4 pt-3">
                    {{ $movements->links() }}
                </div>
        </div>
    </div>


@endsection
