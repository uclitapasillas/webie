@props(['options' => [], 'default' => 'Seleccione una opción', 'disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-select w-full']) !!}>
    <option value=""  selected>{{ $default }}</option>
    @foreach ($options as $value => $label)
        <option value="{{ $value }}">{{ $label }}</option>
    @endforeach
</select>
