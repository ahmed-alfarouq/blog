<x-layout>
    <x-slot:heading><x-title>Welcome Back</x-title></x-slot::heading>
        <form method="POST" action="/login" class="sm:w-96 flex flex-col gap-3">
            @csrf
            <x-input name="email" type="email" label="Your Email" :value="@old('email')" required />
            <x-input type="password" name="password" label="Password" :value="@old('password')" required />
            <x-form-error name="login" />
            <x-button class="w-fit">Login</x-button>
        </form>
</x-layout>
