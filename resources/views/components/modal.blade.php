@props([
    'name',
    'show' => false,
    'maxWidth' => '2xl'
])

@php
$maxWidth = [
    'sm' => 'modal-sm',
    'md' => 'modal-md',
    'lg' => 'modal-lg',
    'xl' => 'modal-xl',
    '2xl' => 'modal-xxl',
][$maxWidth];
@endphp

<div
    x-data="{
        show: @js($show),
        focusables() {
            let selector = 'a, button, input:not([type=\"hidden\"]), textarea, select, details, [tabindex]:not([tabindex=\"-1\"])'
            return [...$el.querySelectorAll(selector)].filter(el => ! el.hasAttribute('disabled'))
        },
        firstFocusable() { return this.focusables()[0] },
        lastFocusable() { return this.focusables().slice(-1)[0] },
        nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
        prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
        nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
        prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 },
    }"
    x-init="
        $watch('show', value => {
            if (value) {
                document.body.classList.add('modal-open');
                document.body.style.overflow = 'hidden';
                {{ $attributes->has('focusable') ? 'setTimeout(() => firstFocusable().focus(), 100)' : '' }}
            } else {
                document.body.classList.remove('modal-open');
                document.body.style.overflow = '';
            }
        })
    "
    x-on:open-modal.window="$event.detail === '{{ $name }}' ? show = true : null"
    x-on:close-modal.window="$event.detail === '{{ $name }}' ? show = false : null"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
    x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
    x-show="show"
    style="display: {{ $show ? 'block' : 'none' }};"
    class="modal fade show"
>

    <!-- Overlay -->
    <div
        class="modal-backdrop fade show"
        x-show="show"
        x-transition.opacity.duration.300ms
        @click="show = false">
    </div>

    <!-- Modal window -->
    <div
        class="modal-dialog {{ $maxWidth }} modal-dialog-centered"
        x-show="show"
        x-transition.opacity.duration.300ms
        x-transition.scale.duration.300ms
    >
        <div class="modal-content shadow-lg rounded">
            {{ $slot }}
        </div>
    </div>

</div>
