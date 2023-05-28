@extends('users.layout')

@section('content')
    <div>
        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">Products Information</h3>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">All products.</p>
        </div>
        <div class="mt-6 border-t border-gray-500 gap-x-8">
            <dl>
                @foreach ($products as $product)
                    <a href="{{ route('product.show', [
                        $product->categories->first()->parent->slug,
                        $product->categories->first()->slug,
                        $product->slug,
                        $product,
                    ]) }}"
                        class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0 hover:bg-gray-200">
                        <dt class="text-sm font-medium leading-6 text-gray-900 col-span-2">Product Nr. <span
                                class="font-bold">{{ $product->id }}</span></dt>
                        <dt class="text-sm font-medium leading-6 text-gray-900 col-span-1">Date added <span
                                class="font-bold">{{ $product->created_at }}</span></dt>

                        <dd class="mt-1 text-sm font-medium leading-6 text-gray-700 sm:mt-0">
                            Product name:
                            <span class="font-normal">{{ $product->name }} </span>.
                        </dd>
                        <dd class="mt-1 text-sm font-medium leading-6 text-gray-700 sm:mt-0 ">Product category: <span
                                class="font-normal">{{ $product->categories->first()->parent->name }} /
                                {{ $product->categories->first()->name }}</span></dd>
                        <dd class="text-sm font-medium leading-6 text-gray-900">Product price <span
                                class="font-normal">{{ number_format($product->price, 2) }}€</span></dd>
                    </a>

                    <dd class="text-sm font-medium leading-6 text-gray-900 mb-2">
                        <a class="flex space-x-2"
                            href="{{ route('product.edit', [
                                $product->categories->first()->parent->slug,
                                $product->categories->first()->slug,
                                $product->slug,
                                $product,
                            ]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="darkgreen" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            <span class="text-gray-900">Edit</span>
                        </a>
                    </dd>

                    <dd class="text-sm font-medium leading-6 text-gray-900 border-b border-gray-500 pb-6">
                        <form method="POST"
                            action="{{ route('product.destroy', [
                                $product->categories->first()->parent->slug,
                                $product->categories->first()->slug,
                                $product->slug,
                                $product,
                            ]) }}">
                            @csrf
                            @method('DELETE')

                            <button class="flex space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="darkred" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                                <span class="text-gray-900">Delete</span>
                            </button>
                        </form>
                    </dd>
                @endforeach
            </dl>
        </div>
    </div>
@endsection
