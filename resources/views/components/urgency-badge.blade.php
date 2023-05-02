
@php
$class = [
    'none' => 'success',
    'moderate' => 'warning',
    'urgent' => 'danger',
][$level];
$label = \App\Models\Movement::URGENCY_OPTIONS[$level];
@endphp

<span>
    <span class="text-{{ $class }}">●</span>
</span>
