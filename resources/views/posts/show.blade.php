@php
    $tags = $post->tags;
    $user = $post->user;
@endphp
<x-layout>
    @if (!$tags->isEmpty())
        <x-tag>{{ $tags->first()->name }}</x-tag>
    @endif

    <x-title class="my-5 capitalize">{{ $post->title }}</x-title>
    <div class="flex justify-between">
        <x-card-footer class="w-fit gap-10" :avatar="$user->avatar" :name="$user->name" :date="$post->created_at" />
        @can('edit', $post)
            <a href="/blog/{{ $post->id }}/edit"
                class="block w-40 text-center px-8 py-2 border border-primary-border rounded-md bg-transparent hover:bg-primary text-lg md:text-xl text-secondary hover:text-white font-medium cursor-pointer transition-all duration-300">
                Edit
            </a>
        @endcan
    </div>

    <img src="{{ $post->img }}" alt="{{ $post->title }}" class=" aspect-[16/9] w-full rounded-md my-5" />
    <p class="text-white font-serif">
        {{ $post->content }}
    </p>
</x-layout>
