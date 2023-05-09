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
            <x-average-daily />
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

                <div class="calendars">
                    @foreach($months as $month)
                        <div class="calendar">
                            <div class="calendar__month">{{ $month->getName() }}</div>
                            @foreach($month->getDays() as $k => $date)
                                <div class="calendar__day" @if($k === 0) style="grid-column: {{ $month->startDayOfWeek() }}" @endif>
                                    @if(isset($movements[$date]))
                                        @php
                                            $movement = $movements[$date];
                                        @endphp
                                        <div class="calendar__dot calendar__dot--{{ $movement->getUrgency() }} calendar__dot--{{ min($movement->getCount(), 4) }}"></div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
