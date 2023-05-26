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

    <div class="relative isolate overflow-hidden py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-7xl lg:mx-0">
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="lightgreen" class="w-24 h-24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <h2 class="text-4xl font-bold tracking-tight mt-3 ml-3 sm:text-6xl">Your order is complete!</h2>
                </div>
                @auth
                    <p class="mt-6 text-lg leading-8 text-gray-500">You can view your order details <a
                            class="font-semibold hover:text-indigo-900 hover:underline"
                            href="{{ route('user.orders') }}">here</a>.
                    </p>
                    <p class="mt-6 text-lg leading-8 text-gray-500"> We will also notify you about the status of your
                        order via email!</p>
                    <a href="{{ route('home') }}"
                        class="font-semibold mt-6 text-lg leading-8 text-gray-500 hover:text-indigo-900 hover:underline">Go
                        back to site?</a>
                @else
                    <p class="mt-6 text-lg leading-8 text-gray-500">We will notify you about the status of your order via
                        email!
                    </p>
                    <a href="{{ route('home') }}"
                        class="font-semibold mt-6 text-lg leading-8 text-gray-500 hover:text-indigo-900 hover:underline">Go
                        back to site?</a>
                @endauth
            </div>
        </div>
    </div>
</body>

</html>
