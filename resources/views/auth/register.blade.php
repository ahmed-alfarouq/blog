<x-layout>
    <x-slot:heading><x-title>Welcome to MetaBlog</x-title></x-slot::heading>
        <form method="POST" action="/register" class="sm:w-96 flex flex-col gap-3">
            @csrf
            <x-input name="name" label="Full Name" placeholder="Ahmed Al-Farouq" :value="@old('name')" required />
            <x-input name="email" type="email" label="Your Email" placeholder="ahmed.omar.alfarouq@gmail.com"
                :value="@old('email')" required />
            <x-input type="password" name="password" label="Password" :value="@old('password')" placeholder="********"
                required />
            <x-input type="password" name="password_confirmation" label="Confirm Password" :value="@old('password_confirmation')"
                placeholder="********" required />
            <x-button class="w-fit">Register</x-button>
        </form>
</x-layout>
