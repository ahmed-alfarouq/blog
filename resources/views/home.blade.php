@php
    $highlightedPost = $posts->first();
@endphp
<x-layout>
    <section class="relative min-h-[300px] md:min-h-[600px]">
        <img src="{{ Vite::asset('resources/images/main-banner.webp') }}" alt="" class="rounded-xl w-full" />
        <x-post-card
            class="w-10/12 sm:w-8/12 md:w-9/12 lg:w-6/12 absolute -bottom-18 md:-bottom-0 lg:-bottom-15 xl:-bottom-20 left-10 p-4 sm:px-10 sm:py-9 bg-[#181A2A] border border-[#242535] rounded-xl"
            :title="$highlightedPost->title" link="/blog/{{ $highlightedPost->id }}" :tags="$highlightedPost->tags" :user="$highlightedPost->user"
            :date="$highlightedPost->created_at" />
    </section>

    <section class="space-y-4 mt-27 md:mt-20 xl:mt-30">
        <h2 class="text-2xl font-bold text-white">Latest Posts</h2>
        <article class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
            @foreach ($posts as $post)
                <x-post-card :title="$post->title" :img="$post->img" link="/blog/{{ $post->id }}" :tags="$post->tags"
                    :user="$post->user" :date="$post->created_at" />
            @endforeach
        </article>
        <a href="/blog"
            class="block w-40 text-center mx-auto px-8 py-2 border border-primary-border rounded-md bg-transparent hover:bg-primary text-lg md:text-xl text-secondary hover:text-white font-medium cursor-pointer transition-all duration-300">
            View All
        </a>
    </section>
</x-layout>
