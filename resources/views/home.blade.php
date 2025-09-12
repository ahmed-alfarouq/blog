<x-layout>
    <x-slot:heading><x-title>All Posts</x-title></x-slot:heading>
    <section class="relative min-h-[300px] md:min-h-[600px]">
        <img src="{{ Vite::asset('resources/images/main-banner.webp') }}" alt="" class="rounded-xl w-full" />
        <div
            class="w-10/12 sm:w-8/12 md:w-9/12 lg:w-6/12 2xl:w-6/12 absolute -bottom-18 md:-bottom-9 lg:-bottom-15 xl:-bottom-20 left-10 p-4 sm:px-10 sm:py-9 bg-[#181A2A] border border-[#242535] rounded-xl">
            <x-tag>Technology</x-tag>
            <p class="text-white text-2xl sm:text-3xl md:text-4xl font-semibold leading-tight my-4">The Impact of
                Technology on the
                Workplace: How Technology is
                Changing</p>
            <x-card-footer alt="name" name="Jason Francisco" date="2025-12-25" />
        </div>
    </section>

    <section class="space-y-4 mt-27 md:mt-20 xl:mt-30">
        <h2 class="text-2xl font-bold text-white">Latest Posts</h2>
        <article class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
            <x-post-card title="The Impact of Technology on the Workplace: How Technology is Changing" />
            <x-post-card title="The Impact of Technology on the Workplace: How Technology is Changing" />
            <x-post-card title="The Impact of Technology on the Workplace: How Technology is Changing" />
            <x-post-card title="The Impact of Technology on the Workplace: How Technology is Changing" />
            <x-post-card title="The Impact of Technology on the Workplace: How Technology is Changing" />
            <x-post-card title="The Impact of Technology on the Workplace: How Technology is Changing" />
        </article>
    </section>
</x-layout>
