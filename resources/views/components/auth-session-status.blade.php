@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'small fw-medium text-success']) }}>
        {{ $status }}
    </div>
@endif
