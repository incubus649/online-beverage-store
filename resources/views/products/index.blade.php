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

@include('partials._search')

<form method="get" action="{{ url()->current() }}">
    <div class="form-group">
        <label for="brand">Brand</label>
        <select class="form-control" id="brand" name="brand">
            <option value="">-- Select Brand --</option>
            @foreach($brands as $brand)
                <option value="{{ $brand->brand }}" {{ request('brand') == $brand->brand ? 'selected' : '' }}>
                    {{ $brand->brand }} ({{ $brand->brandcount }})
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="country">Country</label>
        <select class="form-control" id="country" name="country">
            <option value="">-- Select Country --</option>
            @foreach($countries as $country)
                <option value="{{ $country->country }}" {{ request('country') == $country->country ? 'selected' : '' }}>
                    {{ $country->country }} ({{ $country->countrycount }})
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="size">Size</label>
        <select class="form-control" id="size" name="size">
            <option value="">-- Select Size --</option>
            @foreach($sizes as $size)
                <option value="{{ $size->size }}" {{ request('size') == $size->size ? 'selected' : '' }}>
                    {{ $size->size }}L ({{ $size->sizecount }})
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="alcohol_vlm">Alcohol Volume</label>
        <select class="form-control" id="alcohol_vlm" name="alcohol_vlm">
            <option value="">-- Select Alcohol Volume --</option>
            @foreach($alcohol_vlms as $alcohol_vlm)
                <option value="{{ $alcohol_vlm->alcohol_vlm }}" {{ request('alcohol_vlm') == $alcohol_vlm->alcohol_vlm ? 'selected' : '' }}>
                    @if ($alcohol_vlm->alcohol_vlm == 0)
                        Non Alcoholic ({{ $alcohol_vlm->alcohol_vlmcount }})
                    @else
                        {{ $alcohol_vlm->alcohol_vlm }}% ({{ $alcohol_vlm->alcohol_vlmcount }})
                    @endif
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Filter</button>
</form>

<div class="bg-gray-100">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8"> 
        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            
            <!-- show all products -->
            @forelse ($products as $product)
                <x-product-card :product="$product"/>
            @empty
                <div>
                    No products found!
                    Return to 
                    <a href="/" class="text-slate-950 font-bold">home</a>?
                </div>
            @endforelse

        </div>
    </div>
</div>

@endsection