<x-layout>
    <x-slot:heading><x-title>Edit the post</x-title></x-slot:heading>
    <form method="POST" action="/blog/{{ $post->id }}" class="sm:w-96 flex flex-col gap-3">
        @csrf
        @method('PATCH')

        <x-input name="title" label="Title" :value="$post->title" :required="true" />
        <x-input name="image" label="Image Url" :value="$post->img" :required="true" />
        <div class="flex flex-col gap-2">
            <label for="content" class="text-white">Content</label>
            <textarea id="content" name="content"
                class="border border-primary-border rounded-sm px-2 py-2 text-white focus:outline-0" rows="8" required>{{ $post->content }}</textarea>
        </div>
        <x-input name="tags" label="Tags" placeholder="technology, programming" :value="$post->tags->pluck('name')->implode(', ')"
            :required="true" />
        <div class="flex items-center gap-2 mt-5">
            <a href="/blog/{{ $post->id }}"
                class="px-6 py-1 border border-red-700 rounded-sm text-lg font-medium text-white bg-red-700 transition-all duration-300 cursor-pointer">
                Cancel
            </a>
            <x-button>
                Update
            </x-button>
            <x-button type="ghost" form="delete-form">
                Delete
            </x-button>
        </div>
    </form>
    <form method="POST" action="/blog/{{ $post->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
