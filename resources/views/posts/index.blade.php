<x-layout>
    <article class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
        @foreach ($posts as $post)
            <x-post-card :title="$post->title" :img="$post->img" link="/blog/{{ $post->id }}" :tags="$post->tags"
                :user="$post->user" :date="$post->created_at" />
        @endforeach
    </article>

    {{ $posts->links() }}
</x-layout>