@extends('templates.base')

@section('title')
    Edit Product #{{ $product->id }}
@endsection

@section('content')

    @include('templates.form')

@endsection
