@props(['type' => 'primary'])

@php
    $class =
        $type == 'primary'
            ? 'px-6 py-1 border border-primary-border rounded-sm text-secondary hover:text-white hover:bg-primary'
            : 'text-red-500 hover:text-red-700';
@endphp

<button {{ $attributes(['class' => $class . ' text-lg font-medium disabled:hover:bg-transparent disabled:opacity-50 transition-all duration-300 cursor-pointer disabled:cursor-not-allowed']) }}>
    {{ $slot }}
</button>
