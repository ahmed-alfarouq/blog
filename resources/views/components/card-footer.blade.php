@props(['avatar', 'name', 'date' => now()])

<div {{ $attributes(['class' => 'flex items-center justify-between mt-auto']) }}>
    <div class="flex items-center gap-2">
        <img src="{{ $avatar }}" alt="{{ $name }}" class="rounded-full size-9">
        <span class="text-secondary font-medium">{{ $name }}</span>
    </div>

    <span class="text-secondary">
        {{ \Carbon\Carbon::parse($date)->format('F j, Y') }}
    </span>
</div>
