@extends('users.layout')

@section('content')
    <div>
        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">Orders Information</h3>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Your orders.</p>
        </div>
        <div class="mt-6 border-t border-gray-500 gap-x-8">
            <dl class="divide-y divide-gray-500 border-b border-gray-500">
                @foreach ($orders as $order)
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0 hover:bg-gray-200 ">
                        <dt class="text-sm font-medium leading-6 text-gray-900 col-span-2">Order Nr. <span
                                class="font-bold">{{ $order->id }}</span></dt>
                        <dt class="text-sm font-medium leading-6 text-gray-900">Order date <span
                                class="font-bold">{{ $order->created_at }}</span></dt>

                        <dt class="text-sm font-medium leading-6 text-gray-900">Customer name: <span
                                class="font-bold">{{ $order->name }}</span></dt>
                        <dt class="text-sm font-medium leading-6 text-gray-900">Customer email: <span
                                class="font-bold">{{ $order->email }}</span></dt>
                        <dt class="text-sm font-medium leading-6 text-gray-900">Customer address: <span
                                class="font-bold">{{ $order->address }}</span></dt>
                        @foreach ($order->products->where('user_id', auth()->user()->id) as $product)
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-0">
                                <span class="font-bold">Product</span>
                                {{ $product->name }}.
                            </dd>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-0">
                                <span class="font-bold">Price</span>
                                {{ number_format($product->price * $product->pivot->quantity, 2) }}€
                            </dd>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-0">
                                <span class="font-bold">Quantity</span>
                                {{ $product->pivot->quantity }}
                            </dd>
                        @endforeach
                    </div>
                @endforeach
            </dl>
            <div class="mt-6 p-4">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
