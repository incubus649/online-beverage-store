@extends('users.layout')

@section('content')
    {{ auth()->user()->id }}

@endsection
