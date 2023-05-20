@props(['product'])

<div class="group hover:drop-shadow-md">
    <a
    href="{{ route('product.show', [
        $product->categories->first()->parent->slug,
        $product->categories->first()->slug,
        $product->slug,
        $product
      ]) }}">

        <!-- image -->
        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden xl:aspect-h-8 xl:aspect-w-7 text-white">
            <img src="{{$product->image ? asset('storage/'.$product->image) : asset('/images/small-logo.png')}}" alt="{{ $product->name }}" class="h-full w-full object-cover object-center group-hover:opacity-90">
        </div>

        <!-- name -->
        <h3 class="mt-4 text-md text-gray-700 truncate">{{ $product->name }}</h3>

        <!-- subcategory and tags -->
        <span>
            <ul class="flex">
                <x-product-att :product="$product"></x-product-att>
            </ul>
        </span>

        <!-- price -->
        <p class="mt-1 text-lg font-medium text-gray-900">{{ number_format($product->price, 2) }}€</p>
    </a>
    <!-- add to cart and save for later -->
    <form action="{{ route('cart.store') }}" method="POST">
    <div class="flex text-center font-bold opacity-0 group-hover:opacity-100">
            @csrf
            <button 
                name="product_id" 
                value="{{ $product->id }}" 
                id="fillWhite"
                class="inline-flex justify-center gap-4 flex-1 w-1/2 rounded-sm mt-2 mr-2 p-2 text-white bg-black"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>                          
                <p>Add to cart</p>
            </button>

        <a id="fillBlack" class="shrink inline-block w-1/6 mt-2 pb-0 p-2 text-white" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-7 h-7 block">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
            </svg>                                                     
        </a>
    </div>
    </form>
</div>