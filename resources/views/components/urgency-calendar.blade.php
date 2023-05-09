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
