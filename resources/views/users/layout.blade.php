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
    <header class="sticky top-0 z-10 bg-white border-b">
        <div class="relative z-10">
            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="fixed inset-y-0 left-0 flex max-w-full pr-10">
                        <div class="relative w-screen max-w-sm">
                            <div class="flex h-full flex-col bg-white py-6 border-r">

                                <div class="px-4 mt-6 sm:px-6">
                                    <h2 class="text-xl font-semibold leading-6 text-gray-700" id="slide-over-title">
                                        Dashboard, <span class="uppercase text-gray-800"> {{ auth()->user()->name }}
                                        </span>
                                    </h2>
                                </div>
                                <div class="relative mt-12 flex-1 px-4 sm:px-6">
                                    <!-- Your content -->
                                    <ul class="text-left border-t text-base font-semibold text-gray-500">
                                        <li class="block border-b pt-4 pb-4 pr-48 hover:text-gray-700">
                                            <a href="{{ route('user.dashboard') }}">Dashboard</a>
                                        </li>
                                        <li class="block border-b pt-4 pb-4 pr-48 hover:text-gray-700">
                                            <a href="">Orders</a>
                                        </li>
                                        <li class="block border-b pt-4 pb-4 pr-48 hover:text-gray-700">
                                            <a href="">Wishlist</a>
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
    </header>



    {{-- VIEW OUTPUT --}}
    @yield('content')


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
