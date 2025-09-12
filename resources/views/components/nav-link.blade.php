@props(['active' => false])

@php
    $activeClass = $active ? 'text-primary' : 'text-white hover:text-primary';
    $class =
        $activeClass .
        ' capitalize rounded-sm px-6 py-2 text-center font-medium transition-all duration-300';
@endphp

<a {{ $attributes(['class' => $class]) }} aria-current="{{ $active ? 'page' : false }}">
    {{ $slot }}
</a>
