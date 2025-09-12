@props(['alt', 'name', 'date' => now()])

<div {{ $attributes(['class' => 'flex items-center justify-between']) }}>
    <div class="flex items-center gap-3">
        <img src="{{ Vite::asset('resources/images/avatar.png') }}" alt="{{ $alt }}" class="size-9">
        <span class="text-secondary font-medium">{{ $name }}</span>
    </div>

    <span class="text-secondary">
        {{ \Carbon\Carbon::parse($date)->format('F j, Y') }}
    </span>
</div>
