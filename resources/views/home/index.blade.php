@extends('layout')
@section('content')

@include('partials._hero')

<div class="flex-1 mx-auto max-w-5xl visible lg:invisible" >
    @include('partials._search')
</div>

<div class=""> 
    <h1>THIS IS A WONDERFUL WEBSITE</h1>
    <a href="/alcohol">CLICK HERE TO SEE OUR FULL CATALOGUE :)</a>
</div>


<div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8"> 
    <h1>NEW ARRIVES</h1>
    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            
        <!-- show all products -->
        @foreach ($products as $product)
            <x-product-card :product="$product"/>
        @endforeach

    </div>
</div>

@endsection