@props(['active'])

@php
$classes = ($active ?? false)
    ? 'nav-link active fw-semibold'
    : 'nav-link fw-normal';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
