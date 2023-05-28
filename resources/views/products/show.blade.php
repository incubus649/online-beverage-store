@extends('products.layout')

@section('content')
    <div class="bg-white">
        <div class="pt-6">

            @include('partials._breadcrumbs-product')

            <!-- Image -->
            <div class="mx-auto mt-6 max-w-md sm:px-6 lg:px-8">
                <div class="aspect-h-4 aspect-w-3 overflow-hidden rounded-lg block">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('/images/small-logo.png') }}"
                        alt="{{ $product->name }}" alt="{{ $product->name }}"
                        class="h-full w-full object-scale-down object-center">
                </div>
            </div>

            <!-- Product info -->
            <div
                class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
                <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                    <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{{ $product->name }}</h1>
                </div>

                <!-- Options -->
                <div class="mt-4 lg:row-span-3 lg:mt-0">
                    <h2 class="sr-only">Product information</h2>
                    <p class="text-3xl tracking-tight text-gray-900">{{ number_format($product->price, 2) }}€</p>


                    <form action="{{ route('cart.store') }}" method="POST" class="mt-10">
                        @csrf

                        @if (!$product->stock > 0)
                            <p class="bg-black font-semibold rounded-sm text-white text-sm p-2 text-center">OUT OF STOCK</p>
                            <button name="product_id" value="{{ $product->id }}" type="submit" disabled
                                class="mt-2 flex w-full items-center justify-center rounded-sm border border-transparent bg-black bg-opacity-25 px-8 py-3 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-indigo-950 focus:ring-offset-2">
                                Add to cart
                            </button>
                        @else
                            <button name="product_id" value="{{ $product->id }}" type="submit"
                                class="mt-10 flex w-full items-center justify-center rounded-sm border border-transparent bg-black px-8 py-3 text-base font-medium text-white hover:bg-indigo-950 focus:outline-none focus:ring-2 focus:ring-indigo-950 focus:ring-offset-2">
                                Add to cart
                            </button>
                        @endif
                    </form>


                    <form action="{{ route('wishlist.store') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="mt-2 flex w-full items-center justify-center rounded-sm border border-transparent bg-black px-8 py-3 text-base font-medium text-white hover:bg-green-950 focus:outline-none focus:ring-2 focus:ring-indigo-950 focus:ring-offset-2"
                            value="{{ $product->id }}">
                            Add to wishlist
                        </button>
                    </form>

                    <div class="mt-4 p-2 border border-gray-200 rounded-sm shadow-md">
                        <div class="px-4 py-6 flex space-x-2 justify-center">
                            <img src="{{ $product->user->logo ? asset('storage/' . $product->user->logo) : asset('/images/logo.png') }}"
                                alt="{{ $product->user->name }}" class="object-scale-down">
                        </div>
                    </div>

                    <div class="mt-4 p-2">
                        <p class="text-gray-700 ">Brough to you by <span class="text-gray-800 font-semibold">{{ $product->user->name }}</span></p>
                        <p class="text-gray-700 ">You can find them at <span class="text-gray-800 font-semibold">{{ $product->user->address }}</span></p>
                    </div>
                </div>

                <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
                    <!-- Description and details -->
                    <div>
                        <h3 class="sr-only">Description</h3>

                        <div class="space-y-6">
                            <p class="text-base text-gray-900">{{ $product->description }}</p>
                        </div>
                    </div>

                    <div class="mt-10">
                        <h3 class="text-sm font-medium text-gray-900">Details</h3>

                        <div class="mt-4">
                            <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                                <li class="text-gray-600"><span class="text-gray-700">Brand: </span> {{ $product->brand }}
                                </li>
                                <li class="text-gray-600"><span class="text-gray-700">Country: </span>
                                    {{ $product->country }}</li>
                                <li class="text-gray-600"><span class="text-gray-700">Size: </span> {{ $product->size }}L
                                </li>
                                <li class="text-gray-600"><span class="text-gray-700">Alcohol ABV: </span>
                                    {{ $product->alcohol_vlm }}%</li>
                                <li class="text-gray-600"><span class="text-gray-700">Stock: </span> {{ $product->stock }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
