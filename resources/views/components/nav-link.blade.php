@props(['active' => false])

@php
    $activeClass = $active ? 'bg-gray-950/50' : 'text-gray-300 hover:bg-white/5';
    $class =
        $activeClass .
        ' capitalize rounded-sm px-6 py-2 text-sm text-center font-medium text-white transition-all duration-300';
@endphp

<a {{ $attributes(['class' => $class]) }} aria-current="{{ $active ? 'page' : false }}">
    {{ $slot }}
</a>
