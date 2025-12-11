@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white'])

@php
$alignmentClasses = match ($align) {
    'left' => 'start-0',
    'top' => 'top-0 start-50 translate-middle-x',
    default => 'end-0',
};

$widthClass = match ($width) {
    '48' => 'dropdown-width-48',
    default => 'w-auto',
};
@endphp

<div class="position-relative" 
     x-data="{ open: false }" 
     @click.outside="open = false" 
     @close.stop="open = false">

    <div @click="open = !open">
        {{ $trigger }}
    </div>

    <!-- MENU -->
    <div x-show="open"
        x-transition:enter="fade show"
        x-transition:leave="fade"
        class="dropdown-menu show mt-2 position-absolute {{ $alignmentClasses }} {{ $widthClass }}"
        style="display: none;"
        @click="open = false">

        <div class="rounded shadow {{ $contentClasses }}">
            {{ $content }}
        </div>

    </div>
</div>
