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
    <x-flash-message/>
    <body >
        <header class="sticky top-0 z-10 pt-2 bg-white border-b">
            <div class="mx-auto max-w-full px-4 sm:px-6 lg:px-8">
                <nav class="flex justify-between items-center mb-4">
                    <a href="{{ route('home') }}"><img class="w-72" src="{{ asset('images/logo.png') }}" alt="" class="logo" /></a>
                    <div class="flex-1 mx-auto max-w-5xl invisible lg:visible" >
                        @include('partials._search')
                    </div>
                    <ul class="flex space-x-6 mr-6 text-lg">
                        <li class="flex" id="fillBlack">
                            <a href="{{ route('home') }}">
                                <div class="flex space-x-2">
                                    <span> </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg> 
                                </div>
                            </a>
                        </li>
                        <li id="fillBlack">
                            <a href="{{ route('home') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                            </a>
                        </li>
                        <li id="fillBlack">
                            <div 
                                x-data="{ open: false }" 
                                @keydown.window.escape="open = false" 
                            >         
                                <button 
                                    type="button" 
                                    @click="open = true"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>                                      
                                </button>                   
                                @include('partials._cart')
                            </div>
                        </li>
                    </ul>
                </nav>
                

                
                <ul class="flex justify-center space-x-12 mr-6 pb-2 text-lg">
                    <div>
                        @include('partials._catalogue')
                    </div>
                    <li class="hover:text-indigo-950 hover:font-semibold">
                        <a href="{{ route('about') }}" class="hover:drop-shadow-md"> About Us</a>
                    </li>
                    <li class="hover:text-indigo-950 hover:font-semibold">
                        <a href="{{ route('contacts') }}" class="hover:drop-shadow-md"> Contacts</a>
                    </li>
                    <li class="hover:text-indigo-950 hover:font-semibold">
                        <a href="{{ route('home') }}" class="hover:drop-shadow-md"> For Suppliers</a>
                    </li>
                </ul>
            </div>
        </header>

          

        {{--VIEW OUTPUT--}}
        @yield('content')

        @yield('scripts')
        @livewireScripts
    </body>
</html>
