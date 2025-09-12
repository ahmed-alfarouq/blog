@props(['size' => 'default'])
@php
    $class = $size == 'small' ? 'text-sm' : 'text-xs sm:text-base';
@endphp

<span {{ $attributes([
    'class' => $class . ' bg-[#4B6BFB] rounded-md px-3 py-2 text-white font-medium',
]) }}>
    {{ $slot }}
</span>
