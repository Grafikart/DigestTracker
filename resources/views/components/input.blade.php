@php
    $type ??= 'text';
    $class ??= null;
    $options ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
@endphp
<div @class(["form-group", $class, 'form-switch' => $type === 'checkbox'])>
    @if($type !== 'checkbox')
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    @endif
    @if($options)
        <select class="form-select @error($name) is-invalid @enderror" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}">
            @foreach($options as $k => $v)
            <option value="{{ $k }}" @selected(old($name, $value) === $k)>{{ $v }}</option>
            @endforeach
        </select>
    @elseif($type === 'textarea')
        <textarea class="form-control @error($name) is-invalid @enderror" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}">{{ old($name, $value) }}</textarea>
    @elseif($type === 'checkbox')
        <input type="hidden" name="{{ $name }}" value="0">
        <input class="form-check-input @error($name) is-invalid @enderror" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" @checked(old($name, $value))" value="1">
        <label for="{{ $name }}" class="form-check-label">{{ $label }}</label>
    @else
        <input class="form-control @error($name) is-invalid @enderror" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}">
    @endif
    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
