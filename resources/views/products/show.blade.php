@extends('products.layout')

@section('content')
    <div class="bg-white">
        <div class="pt-6">

            @include('partials._breadcrumbs-product')

            <!-- Image -->
            <div class="mx-auto mt-6 max-w-md sm:px-6 lg:px-8">
                <div class="aspect-h-4 aspect-w-3 hidden overflow-hidden rounded-lg lg:block">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('/images/small-logo.png') }}"
                        alt="{{ $product->name }}" alt="{{ $product->name }}" class="h-full w-full object-cover object-center">
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
                        <button name="product_id" value="{{ $product->id }}" type="submit"
                            class="mt-10 flex w-full items-center justify-center rounded-sm border border-transparent bg-black px-8 py-3 text-base font-medium text-white hover:bg-indigo-950 focus:outline-none focus:ring-2 focus:ring-indigo-950 focus:ring-offset-2">
                            Add to cart
                        </button>
                    </form>

                    <div class="mt-4 p-2 border-2 border-indigo-950 rounded-md">
                        <a class="flex space-x-2"
                            href="{{ route('product.edit', [
                                $product->categories->first()->parent->slug,
                                $product->categories->first()->slug,
                                $product->slug,
                                $product,
                            ]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            <span class="text-gray-900">Edit</span>
                        </a>
                    </div>

                    <form class="mt-4 p-2 border-2 border-red-700 rounded-md" method="POST"
                        action="{{ route('product.destroy', [
                            $product->categories->first()->parent->slug,
                            $product->categories->first()->slug,
                            $product->slug,
                            $product,
                        ]) }}">
                        @csrf
                        @method('DELETE')

                        <button class="flex space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                            <span class="text-gray-900">Delete</span>
                        </button>
                    </form>
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
                                <li class="text-gray-600"><span class="text-gray-700">Size: </span> {{ $product->size }}
                                </li>
                                <li class="text-gray-600"><span class="text-gray-700">Alcohol ABV: </span>
                                    {{ $product->alcohol_vlm }}</li>
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
