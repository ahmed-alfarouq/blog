@props(['title', 'img' => null, 'tags' => collect(), 'user', 'date', 'link' => '/'])

@php
    $firstTags = $tags->take(3);
@endphp

<div {{ $attributes(['class' => 'flex flex-col gap-5 pt-3 pb-5 px-4 rounded-xl border-1 border-primary-border']) }}>
    @if ($img)
        <a href="{{ $link }}" class="aspect-[16/9] w-full rounded-md overflow-hidden">
            <img src="{{ $img }}" alt="{{ $title }}" class="w-full h-full object-cover" loading="lazy" />
        </a>
    @endif

    <div class="flex flex-wrap gap-2 items-center ml-2">
        @foreach ($firstTags as $tag)
            <x-tag href="/blog/tags/{{ $tag->id }}" size="small">{{ $tag->name }}</x-tag>
        @endforeach
    </div>
    <a href="{{ $link }}"
        class="text-white hover:text-primary text-2xl font-semibold leading-tight transition-all duration-200">
        {{ $title }}
    </a>
    <x-card-footer :avatar="$user->avatar" :name="$user->name" :date="$date" />
</div>
