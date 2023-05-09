@extends('layout')

@section('content')

<div class="">
    <a href="{{ route('listings') }}">Alcohol</a>
    @foreach ($categories as $category)
        <div class="">
            <a href=" {{ route('category', [$category]) }}"> {{ $category->name }} </a>

            @foreach ($category->children as $child)
                <div class="ml-8">
                    <a href=" {{ route('category', [$category, $child]) }} "> {{ $child->name }} </a>
                </div>
            @endforeach
        </div>
    @endforeach
</div>

@include('partials._hero')
@include('partials._search')

<div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8"> 
    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            
        <!-- show all products -->
        @foreach ($products as $product)
            <x-product-card :product="$product"/>
        @endforeach

    </div>
</div>

@endsection