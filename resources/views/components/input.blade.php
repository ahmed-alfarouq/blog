@props(['name', 'type' => 'text', 'label', 'value' => '', 'placeholder' => '', 'required' => false])

<div class="flex flex-col gap-2">
    <label for="{{ $name }}" class="text-white">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}"
        placeholder="{{ $placeholder }}"
        class="border border-primary-border rounded-sm px-2 py-2 text-white focus:outline-0"
        @if ($required) required @endif />
    <x-form-error :name="$name" />
</div>
