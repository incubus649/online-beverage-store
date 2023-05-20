@extends('layout')
@section('content')

<div class="flex-1 mx-auto max-w-5xl visible lg:invisible" >
    @include('partials._search')
</div>

<div class="mx-auto max-w-7xl pb-8"> 
    <a href="{{ route('listings') }}">
        <img 
            class="object-fit shadow-lg hover:shadow-xl h-72 w-full object-cover object-center rounded-xl"
            src="{{ asset('images/catalogue-image.png') }}" 
            alt="Check out our catalogue"
        >
    </a>
</div>


<div class="mx-auto max-w-7xl px-4 pt-4 pb-8 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8"> 
    <h1 class="text-center text-4xl font-semibold text-black">NEW ARRIVES</h1>
    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            
        <!-- show all products -->
        @foreach ($products as $product)
            <x-product-card :product="$product"/>
        @endforeach

    </div>
</div>

@endsection