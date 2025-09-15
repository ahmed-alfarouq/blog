@props(['name'])

@error($name)
    <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
@enderror
