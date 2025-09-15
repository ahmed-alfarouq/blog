<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Shopping') }}</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</head>

<body class="flex flex-col min-h-full bg-gray-900 font-sans">
    <nav class="bg-gray-800/50 py-3">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center w-full">
                    <a href="/" class="shrink-0">
                        <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="Meta Blog" class="h-8" />
                    </a>
                    <div class="hidden md:flex w-full justify-between items-center">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                            <x-nav-link href="/blog" :active="request()->is('blog')">blog</x-nav-link>
                            @auth
                                <x-nav-link href="/blog/create" :active="request()->is('blog/create')">create post</x-nav-link>
                            @endauth
                        </div>
                        <div>
                            @auth
                                <form method="POST" action="/logout">
                                    @csrf
                                    <x-button type="ghost">Logout</x-button>
                                </form>
                            @endauth
                            @guest
                                <x-nav-link href="/login" :active="request()->is('login')">Login</x-nav-link>
                                <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
                            @endguest
                        </div>

                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <button type="button" command="--toggle" commandfor="mobile-menu"
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            data-slot="icon" aria-hidden="true" class="size-6 in-aria-expanded:hidden">
                            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            data-slot="icon" aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
                            <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <el-disclosure id="mobile-menu" hidden
            class="flex flex-col gap-1 md:hidden px-2 pt-2 pb-3 sm:px-3 transition-all duration-300">
            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link href="/blog" :active="request()->is('blog')">blog</x-nav-link>
            @auth
                <x-nav-link href="/blog/create" :active="request()->is('blog/create')">create post</x-nav-link>
                <form method="POST" action="/logout" class="mx-auto">
                    @csrf
                    <x-button type="ghost">Logout</x-button>
                </form>
            @endauth
            @guest
                <x-nav-link href="/login" :active="request()->is('login')">Login</x-nav-link>
                <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
            @endguest
        </el-disclosure>
    </nav>
    @isset($heading)
        <header class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{ $heading }}
        </header>
    @endisset
    <main class="mx-auto min-h-[calc(100vh-400px)] max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        {{ $slot }}
    </main>
    <footer class="bg-secondary-bg mt-10">
        <section class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <section class="flex flex-col sm:flex-row gap-15">
                <div class="space-y-3 w-[280px]">
                    <h3 class="text-white text-lg font-semibold">About</h3>
                    <p class="text-secondary">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore
                        et dolore magna aliqua. Ut enim ad minim veniam
                    </p>
                    <div>
                        <p class="text-white">
                            <span class="text-secondary">Email: </span>
                            ahmed.omar.alfrouq@gmail.com
                        </p>
                        <p class="text-white">
                            <span class="text-secondary">Phone: </span>
                            +20 1018360530
                        </p>
                    </div>
                </div>
                <div class="space-y-3">
                    <h3 class="text-white text-lg font-semibold">Qucik Link</h3>
                    <nav class="flex flex-col space-y-2">
                        <x-nav-link href="/" class="!p-0 text-left w-fit">Home</x-nav-link>
                        <x-nav-link href="/blog" class="!p-0 text-left w-fit">blog</x-nav-link>
                        @auth
                            <x-nav-link href="/blog/create" class="!p-0 text-left w-fit">create post</x-nav-link>
                            <form method="POST" action="/logout">
                                @csrf
                                <x-button type="ghost">Logout</x-button>
                            </form>
                        @endauth
                        @guest
                            <x-nav-link href="/login" class="!p-0 text-left w-fit">Login</x-nav-link>
                            <x-nav-link href="/register" class="!p-0 text-left w-fit">Register</x-nav-link>
                        @endguest
                    </nav>
                </div>
            </section>
            <section
                class="flex flex-wrap justify-center sm:justify-between items-center gap-10 py-10 mt-10 border-t border-t-[#242535]">
                <div>
                    <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="logo" class="h-10" />
                    <p class="text-white">© JS Template 2023. <span class="text-secondary">All Rights Reserved.</span>
                    </p>
                </div>
                <div class="flex items-center gap-5">
                    <a href="https://github.com/ahmed-alfarouq" target="_blank"
                        class="border-r border-primary-border pr-5">
                        <x-bi-github
                            class="text-white hover:text-primary size-8 hover:translate-x-1 transition-all duration-300" />
                    </a>
                    <a href="https://www.linkedin.com/in/ahmed-alfarouq" target="_blank"
                        class="border-r border-primary-border pr-5">
                        <x-bi-linkedin
                            class="text-white hover:text-primary size-8 hover:translate-x-1 transition-all duration-300" />
                    </a>
                    <a href="https://www.youtube.com/@ahmed-alfarouq" target="_blank"
                        class="border-r border-primary-border pr-5">
                        <x-mdi-gmail
                            class="text-white hover:text-primary size-8 hover:translate-x-1 transition-all duration-300" />
                    </a>
                    <a href="https://www.youtube.com/@ahmed-alfarouq" target="_blank">
                        <x-bi-youtube
                            class="text-white hover:text-primary size-8 hover:translate-x-1 transition-all duration-300" />
                    </a>
                </div>
            </section>
        </section>
    </footer>
</body>

</html>
