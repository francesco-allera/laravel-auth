@extends('templates.base')

@section('title')
    Show Product #{{ $product->id }}
@endsection

@section('content')

    <div class="card" style="width:15rem;">
        <img class="card-img-top" src="{{ $product->img_url }}" alt="">

        <div class="card-body" style="color:#1e1e1e;">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->description }}</p>
            <h4>{{ $product->price }}</h4>
        </div>
    </div>

@endsection
