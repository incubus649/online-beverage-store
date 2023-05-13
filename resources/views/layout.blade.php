<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite('resources/css/app.css')
        <title>Necromancer Nectar</title>
        <script src="https://unpkg.com/alpinejs" defer></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <x-flash-message/>
    <body >
        <header class="sticky top-0 z-10 pt-2 bg-white border-b">
            <div class="mx-auto max-w-full px-4 sm:px-6 lg:px-8">
                <nav class="flex justify-between items-center mb-4">
                    <a href="{{ route('home')}}"><img class="w-72" src="{{asset('images/logo.png')}}" alt="" class="logo" /></a>
                    <div class="flex-1 mx-auto max-w-5xl invisible lg:visible" >
                        @include('partials._search')
                    </div>
                    <ul class="flex space-x-6 mr-6 text-lg">
                        <li>
                            <a href="{{route('home')}}" class=""><i class="fa-solid fa-user-plus"></i> Register / Login</a>
                        </li>
                        <li>
                            <a href="{{route('home')}}" class=""><i class="fa-solid fa-arrow-right-to-bracket"></i> Wishlist</a>
                        </li>
                        <li>
                            <a href="{{route('home')}}" class=""><i class="fa-solid fa-arrow-right-to-bracket"></i> Cart</a>
                        </li>
                    </ul>
                </nav>
                

                
                <ul class="flex justify-center space-x-12 mr-6 pb-2 text-lg">
                    <div>
                        @include('partials._catalogue')
                    </div>
                    <li class="hover:text-indigo-950 hover:font-semibold">
                        <a href="{{route('home')}}" class="hover:drop-shadow-md"> About Us</a>
                    </li>
                    <li class="hover:text-indigo-950 hover:font-semibold">
                        <a href="{{route('home')}}" class="hover:drop-shadow-md"> Contacts</a>
                    </li>
                    <li class="hover:text-indigo-950 hover:font-semibold">
                        <a href="{{route('home')}}" class="hover:drop-shadow-md"> Gift Cards</a>
                    </li>
                    <li class="hover:text-indigo-950 hover:font-semibold">
                        <a href="{{route('home')}}" class="hover:drop-shadow-md"> For Suppliers</a>
                    </li>
                </ul>
                
            </div>
        </header>

          

        {{--VIEW OUTPUT--}}
        @yield('content')

        @yield('scripts')
    </body>
</html>
