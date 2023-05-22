<div 
    x-show="open" 
    class="relative z-10" 
    style="display: none;"
>
  <div
    x-show="open" 
    x-transition:enter="ease-in-out duration-500" 
    x-transition:enter-start="opacity-0" 
    x-transition:enter-end="opacity-100" 
    x-transition:leave="ease-in-out duration-500" 
    x-transition:leave-start="opacity-100" 
    x-transition:leave-end="opacity-0" 
    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
  ></div>

  <div class="fixed inset-0 overflow-hidden">
    <div class="absolute inset-0 overflow-hidden">
      <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
        <div 
            x-show="open" 
            x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700" 
            x-transition:enter-start="translate-x-full" 
            x-transition:enter-end="translate-x-0" 
            x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700" 
            x-transition:leave-start="translate-x-0" 
            x-transition:leave-end="translate-x-full" 
            class="pointer-events-auto w-screen max-w-md" 
            @click.away="open = false"
        >
          <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
            <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
              <div class="flex items-start justify-between">
                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping cart</h2>
                <div class="ml-3 flex h-7 items-center">
                  <button 
                    type="button" 
                    class="-m-2 p-2 text-gray-400 hover:text-gray-500"
                    @click="open = false"
                  >
                    <span class="sr-only">Close panel</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>
              </div>

              <div class="mt-8">
                <div class="flow-root">
                  <ul role="list" class="-my-6 divide-y divide-gray-200">
                    @foreach (Cart::getContent() as $item)
                        <li class="flex py-6">
                        <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                          @foreach ($productsAll->where('id', $item->id) as $product)
                            <img src="{{$product->image ? asset('storage/'.$product->image) : asset('/images/small-logo.png')}}" alt="{{ $product->name }}" class="h-full w-full object-cover object-center">
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
                                            $product
                                        ]) }}"
                                        >
                                            {{ $item->name }}
                                        </a>
                                    @endforeach
                                </h3>
                                <p class="ml-4">{{ number_format($item->price, 2) }}€</p>
                            </div>
                            <p class="mt-1 text-sm text-gray-500">{{ $item->attributes->category }}</p>
                            </div>
                            <div class="flex flex-1 items-end justify-between text-sm">
                            <p class="text-gray-500">Quantity: {{ $item->quantity }}</p>

                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <div class="flex">
                                    <button 
                                        name="product_id" 
                                        value="{{ $item->id }}" 
                                        class="font-medium text-black hover:text-indigo-950"
                                    >Remove</button>
                                </div>
                            </form>

                            </div>
                        </div>
                        </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>

            <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
              <div class="flex justify-between text-base font-medium text-gray-900">
                <p>Subtotal</p>
                <p>{{ number_format(Cart::getSubTotal(), 2) }}€</p>
              </div>
              <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
              <div class="mt-6">
                <a href="#" class="flex items-center justify-center rounded-sm border border-transparent bg-black px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-950">Checkout</a>
              </div>
              <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                <p>
                  or
                  <button 
                    type="button" 
                    class="font-medium text-black hover:text-indigo-950"
                    @click="open = false"
                  >
                    Continue Shopping
                    <span aria-hidden="true"> &rarr;</span>
                  </button>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
