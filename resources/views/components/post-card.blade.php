@props(['title', 'link' => '/'])

<div class="flex flex-col gap-5 py-3 px-4 rounded-xl border-1 border-primary-border">
    <a href="{{ $link }}">
        <img src="{{ Vite::asset('resources/images/card-img.webp') }}" alt="{{ $title }}" class="rounded-md" />
    </a>
    <div class="ml-2">
        <x-tag size="small">Technology</x-tag>
    </div>
    <a href="{{ $link }}"
        class="text-white hover:text-primary text-2xl font-semibold leading-tight transition-all duration-200">
        {{ $title }}
    </a>
    <x-card-footer alt="name" name="Jason Francisco" date="2025-12-25" />
</div>
