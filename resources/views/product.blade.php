@extends('layout')

@section('content')

<h1>{{ $product->name }}</h1>
<h4>{{ $product->description }}</h4>
<h2>{{ $product->price }} /unit</h2>
<h3>Stock {{ $product->stock }}</h3>
<p>{{ $product->created_at  }}</p>

@endsection