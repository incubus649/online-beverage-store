@extends('products.layout')

@section('content')
    <div class="bg-white">
        <div class="pt-6">

            <!-- Product info -->
            <div
                class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-full lg:mr-24 lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
                <div class="lg:col-span-2 lg:border-gray-200 lg:pr-8 ml-12">
                    <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl ">Order Checkout</h1>
                </div>

                <!-- Options -->
                <div class="mt-4 border-l pl-6 lg:row-span-3 lg:mt-0">
                    <h2 class="sr-only">Product information</h2>
                    <p class="text-3xl tracking-tight text-gray-900">Products</p>

                    <div class="mt-4 p-2">
                        @foreach (Cart::getContent() as $item)
                            <li class="flex py-6 border-b">
                                <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                    @foreach ($productsAll->where('id', $item->id) as $product)
                                        <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('/images/small-logo.png') }}"
                                            alt="{{ $product->name }}" class="h-full w-full object-cover object-center">
                                    @endforeach
                                </div>

                                <div class="ml-4 flex flex-1 flex-col">
                                    <div>
                                        <div class="flex justify-between text-base font-medium text-gray-900">
                                            <h3>
                                                @foreach ($productsAll->where('id', $item->id) as $product)
                                                    <a
                                                        href="{{ route('product.show', [
                                                            $product->categories->first()->parent->slug,
                                                            $product->categories->first()->slug,
                                                            $product->slug,
                                                            $product,
                                                        ]) }}">
                                                        {{ $item->name }}
                                                    </a>
                                                @endforeach
                                            </h3>
                                            <p class="ml-4">{{ number_format($item->price, 2) }}€</p>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500">
                                            {{ $item->attributes->category }}</p>
                                    </div>
                                    <div class="flex flex-1 items-end justify-between text-sm">
                                        <p class="text-gray-500">Quantity: {{ $item->quantity }}</p>

                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            @csrf
                                            <div class="flex">
                                                <button name="product_id" value="{{ $item->id }}"
                                                    class="font-medium text-black hover:text-indigo-950">Remove</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </li>
                        @endforeach

                        <div class="flex space-x-2 mt-6"></div>
                        @if (!Cart::isEmpty())
                            <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                                <button type="submit" class="flex space-x-2 text-red-600 hover:text-red-900"
                                    href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                    <span class="text-red-800 hover:text-red-900">Clear shopping cart</span>
                                </button>
                            </form>
                        @endif

                    </div>
                </div>

                <div class="py-10 ml-12 lg:col-span-2 lg:col-start-1 lg:pb-16 lg:pr-8 lg:pt-6">
                    <form method="POST" action="{{ route('order.store') }}">
                        @csrf
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Order Information</h2>
                                <p class="mt-1 text-sm leading-6 text-gray-600">Make sure the information you entered is
                                    correct.</p>

                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    @auth
                                        <div class="sm:col-span-4 mt-12"></div>
                                    @else
                                        <div class="sm:col-span-4">
                                            <label for="name"
                                                class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                            <div class="mt-2">
                                                <input id="name" name="name" type="text" autocomplete="name"
                                                    value="{{ old('name') }}"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>
                                            @error('name')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="sm:col-span-4">
                                            <label for="email"
                                                class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                                            <div class="mt-2">
                                                <input id="email" name="email" type="email" autocomplete="email"
                                                    value="{{ old('email') }}"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>
                                            @error('email')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endauth
                                    <div class="col-span-full">
                                        <label for="street-address"
                                            class="block text-sm font-medium leading-6 text-gray-900">Street
                                            address</label>
                                        <div class="mt-2">
                                            <input type="text" name="street" id="street" value="{{ old('street') }}"
                                                autocomplete="street-address"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        @error('street')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label for="country"
                                            class="block text-sm font-medium leading-6 text-gray-900">Country</label>
                                        <div class="mt-2">
                                            <input type="text" name="country" id="country"
                                                value="{{ old('country') }}" autocomplete="address-level1"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        @error('country')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="sm:col-span-2 sm:col-start-1">
                                        <label for="city"
                                            class="block text-sm font-medium leading-6 text-gray-900">City</label>
                                        <div class="mt-2">
                                            <input type="text" name="city" id="city"
                                                value="{{ old('city') }}" autocomplete="address-level2"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        @error('city')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label for="postal_code"
                                            class="block text-sm font-medium leading-6 text-gray-900">ZIP / Postal
                                            code</label>
                                        <div class="mt-2">
                                            <input type="text" name="postal_code" id="postal_code"
                                                value="{{ old('postal_code') }}" autocomplete="postal_code"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        @error('postal_code')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6 text-2xl font-medium text-gray-900">
                            <p>{{ number_format(Cart::getSubTotal(), 2) }}€</p>
                        </div>

                        <div class="mt-6 flex items-center justify-between gap-x-6">
                            <a href="{{ route('home') }}"
                                class="flex font-semibold text-sm text-black hover:text-indigo-950">
                                <div class="mt-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                                    </svg>
                                </div>
                                <span class="ml-2">Go Back</span>
                            </a>
                            @if (!Cart::isEmpty())
                                <button type="submit"
                                    class="pr-16 pl-16 rounded-sm border border-transparent bg-black px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-950">Checkout</button>
                            @else
                                <button type="submit" disabled
                                    class="pr-16 pl-16 rounded-sm border border-transparent bg-opacity-25 bg-black px-6 py-3 text-base font-medium text-white shadow-sm">Checkout</button>
                            @endif
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection
