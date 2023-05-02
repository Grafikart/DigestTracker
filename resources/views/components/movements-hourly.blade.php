<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-header-title fw-bold">
                Rapport par heures
            </h4>
        </div>

        <div class="card-body">

            <div class="bars">
                @for($i = $firstHour; $i < $lastHour; $i++)
                    <div class="bars__column">
                        <div class="bars__wrapper">
                            @foreach($hours[$i] ?? [] as $name => $count)
                                <div class="bars__bar bars__bar--{{ $name }}" style="height: {{ round($count / $max, 4) * 100 }}%"></div>
                            @endforeach
                        </div>
                        <div class="bars__label text-muted text-center">
                            {{ str_pad($i, 2, '0') }}h
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>
