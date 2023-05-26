<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @livewireStyles
    <title>Necromancer Nectar</title>
    <script src="https://unpkg.com/alpinejs" defer></script>

</head>

<body>
    <div x-data="{ open: false }" @keydown.window.escape="open = false">

        <div class="fixed mr-12 right-0 text-gray-500">
            <button type="button" @click="open = true">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-10 h-10">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                </svg>

            </button>
        </div>

        <div x-show="open" class="relative z-10" style="display: none;">

            <div x-show="open" x-transition:enter="ease-in-out duration-500" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-500"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                        <div x-show="open"
                            x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                            x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                            x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                            class="pointer-events-auto relative w-screen max-w-md" @click.away="open = false">

                            <div x-show="open" x-transition:enter="ease-in-out duration-500"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="ease-in-out duration-500" x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                class="absolute left-0 top-0 -ml-8 flex pr-2 pt-4 sm:-ml-10 sm:pr-4">

                                <button type="button"
                                    class="rounded-md text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white"
                                    @click="open = false">
                                    <span class="sr-only">Close panel</span>
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <div class="flex h-full flex-col bg-white py-6 border-r">

                                <div class="px-4 mt-6 sm:px-6">
                                    <h2 class="text-xl font-semibold leading-6 text-gray-700" id="slide-over-title">
                                        Dashboard, <span class="uppercase text-gray-800"> {{ auth()->user()->name }}
                                        </span>
                                    </h2>
                                </div>
                                <div class="relative mt-12 flex-1 px-4 sm:px-6">

                                    <ul class="text-left border-t text-base font-semibold text-gray-500">
                                        <li class="block border-b pt-4 pb-4 pr-48 hover:text-gray-700">
                                            <a href="{{ route('user.dashboard') }}">Dashboard</a>
                                        </li>
                                        <li class="block border-b pt-4 pb-4 pr-48 hover:text-gray-700">
                                            <a href="{{ route('user.orders') }}">Orders</a>
                                        </li>
                                        <li class="block border-b pt-4 pb-4 pr-48 hover:text-gray-700">
                                            <a href="{{ route('wishlist.index') }}">Wishlist</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="bottom-0 px-4 mt-6 sm:px-6">
                                    <a href="{{ route('home') }}"
                                        class="flex font-semibold text-sm text-indigo-500 hover:text-indigo-700">
                                        <div class="mt-0.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                                            </svg>
                                        </div>
                                        <span class="ml-2">Back to site</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="m-12">
        {{-- VIEW OUTPUT --}}
        @yield('content')
    </div>

    <footer class="bottom-0 pt-2 bg-white border-t">
        <div class="mx-auto max-w-full px-4 sm:px-6 lg:px-8">
            <nav class="items-center mb-12 mt-12">
                <p class="text-center font-semibold text-sm text-gray-500">Necromancer's Nectar © 2023 </p>
                <p class="text-center font-semibold text-sm pt-4 text-gray-400">Qualification work, PIKC Rīgas Valsts
                    Tehnikums </p>
            </nav>
    </footer>

    @yield('scripts')
    @livewireScripts
    <x-flash-message />


</body>

</html>
