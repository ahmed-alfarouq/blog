@php
    $availableAt = session('otp_resend_available_at');
    $canResend = !$availableAt || now()->greaterThan($availableAt);
    $remaining = $availableAt ? now()->diffInSeconds($availableAt, false) : 0;
@endphp

<x-layout>
    <form method="POST" action="/otp" id="otp" class="sm:w-96 flex flex-col gap-3">
        @csrf
        <x-input name="code" label="Your OTP code" :value="@old('otp')" required />
        <x-form-error name="otp" />
    </form>
    <form method="POST" action="/resend-otp" id="resend-otp"></form>

    <div class="flex items-center gap-3 mt-3">
        <x-button form="otp" class="w-fit">Submit Code</x-button>
        @if ($canResend)
            <x-button form="resend-otp" type="outline" class="w-fit">Re-send Code</x-button>
        @else
            <x-button type="danger" disabled class="opacity-50 cursor-not-allowed w-fit">
                Re-send Code (wait {{ $remaining }}s)
            </x-button>
        @endif

    </div>
</x-layout>
