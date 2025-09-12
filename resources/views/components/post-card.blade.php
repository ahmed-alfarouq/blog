@props(['title'])

<div class="flex flex-col gap-5 py-3 px-4 rounded-xl border-1 border-primary-border">
    <img src="{{ Vite::asset('resources/images/card-img.webp') }}" alt="{{ $title }}" class="rounded-md" />
    <div class="ml-2">
        <x-tag size="small">Technology</x-tag>
    </div>
    <p class="text-white text-2xl font-semibold leading-tight">
        {{ $title }}
    </p>
    <x-card-footer alt="name" name="Jason Francisco" date="2025-12-25" />
</div>
