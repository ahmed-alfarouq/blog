@props(['size' => 'default'])
@php
    $class = $size == 'small' ? 'text-sm' : 'text-xs sm:text-base';
@endphp

<a {{ $attributes([
    'class' => $class . ' bg-primary rounded-md px-3 py-2 text-white font-medium',
]) }}>
    {{ $slot }}
</a>
