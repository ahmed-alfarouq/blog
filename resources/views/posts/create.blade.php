<x-layout>
    <x-slot:heading><x-title>Create a new post</x-title></x-slot:heading>
    <form method="POST" action="/blog" class="sm:w-96 flex flex-col gap-3">
        @csrf
        <x-input name="title" label="Title" placeholder="How to improve yourself." :required="true" />
        <x-input name="image" label="Image Url" placeholder="https://fastly.picsum.photos/id/26/640" :required="true" />
        <div class="flex flex-col gap-2">
            <label for="content" class="text-white">Content</label>
            <textarea id="content" name="content" placeholder=""
                class="border border-primary-border rounded-sm px-2 py-2 text-white focus:outline-0" rows="8" required></textarea>
        </div>
        <x-input name="tags" label="Tags" placeholder="technology, programming" :required="true" />
        <x-button class="w-fit">
            Publish
        </x-button>
    </form>
</x-layout>
