<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite('resources/css/app.css')
        <title>Necromancer Nectar</title>
        <script src="//unpkg.com/alpinejs" defer></script>
    </head>
    <x-flash-message/>
    <body>
        <a href="{{ route('home')}}"><img src="{{asset('images/logo.png')}}" alt="Necromancer Nectar" class="w-96"></a>
        <a href="#"> Signup </a>
        <a href="#"> Login </a>
        {{--VIEW OUTPUT--}}
        @yield('content')
    </body>
</html>