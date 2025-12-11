@props(['value'])

<label {{ $attributes->merge(['class' => 'form-label small fw-medium text-body']) }}>
    {{ $value ?? $slot }}
</label>
