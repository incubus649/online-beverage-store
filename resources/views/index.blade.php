@extends('layout')

@section('content')

<div class="">
    <h1 class="text-3xl font-bold">Listings</h1>
    <ul>

    </ul>
</div>

@include('partials._hero')

<div class="bg-gray-100">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8"> 
        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            
            <!-- show all products -->
            @foreach ($products as $product)
                <x-product-card :product="$product"/>
            @endforeach

        </div>
    </div>
</div>

@endsection