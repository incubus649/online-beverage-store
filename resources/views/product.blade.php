@extends('layout')

@section('content')

<h1>Name: {{ $product->name }} </h1>
<h4>Country: {{ $product->country }} </h4>
<p>Brand: {{ $product->brand }} </p>
<h2>Alcohol volume: {{ $product->alcohol_vlm }}% </h2>
<h2>Size: {{ $product->size }}L </h2>
<h2>Price: {{ $product->price }} /unit</h2>
<h3>Stock: {{ $product->stock }}</h3>

@endsection