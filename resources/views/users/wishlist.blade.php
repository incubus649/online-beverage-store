@extends('users.layout')

@section('content')
    <div>
        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">Wishlist</h3>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Your wishlisted products.</p>
        </div>
        <div class="mt-6 border-t border-gray-500 gap-x-8">
            @if ($wishlist->count() > 0)
                <dl class="divide-y divide-gray-500 border-b border-gray-500 ">
                    @foreach ($wishlist as $item)
                        <a class="flex hover:bg-gray-200"
                            href="{{ route('product.show', [
                                $item->product->categories->first()->parent->slug,
                                $item->product->categories->first()->slug,
                                $item->product->slug,
                                $item->product,
                            ]) }}">

                            <dt class="mt-6 h-36 w-36 flex-shrink-0 overflow-hidden rounded-md border border-gray-200 mb-6">
                                <img src="{{ $item->product->image ? asset('storage/' . $item->product->image) : asset('/images/small-logo.png') }}"
                                    alt="{{ $item->product->name }}" alt="{{ $item->product->name }}"
                                    class="h-full w-full object-scale-down object-center">
                            </dt>

                            <div class="ml-12 px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-gray-900 col-span-3">Date added <span
                                        class="font-bold">{{ $item->created_at }}</span>
                                </dt>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-0 col-span-3">
                                    <span class="font-bold">Product name </span>
                                    {{ $item->product->name }}.
                                </dd>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-0 col-span-3 ">
                                    <span class="font-bold">Price</span>
                                    {{ number_format($item->product->price, 2) }}€
                                </dd>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-0 col-span-3 ">
                                    <span class="font-bold">Stock</span>
                                    {{ $item->product->stock }}
                                </dd>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-0 col-span-3 ">
                                    <span class="font-bold">Supplier</span>
                                    {{ $item->product->user->company_name }}
                                </dd>
                                <form action="{{ route('wishlist.clear') }}" method="POST">
                                    @csrf
                                    <button type="submit" name="product_id" value="{{ $item->product->id }}"
                                        class="rounded-sm bg-red-900 px-6 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                                        Remove from wishlist
                                    </button>
                                </form>
                            </div>
                        </a>
                </dl>
            @endforeach
            @else
            <div class="text-3xl pt-4">
                <p class="font-medium text-gray-900">No products in wishlist!</p>
                <a href="{{ route('home') }}" class="text-base font-semibold text-gray-900 hover:text-indigo-900 hover:underline">Back to site?</a>
            </div>
            @endif
        </div>
    </div>
@endsection
