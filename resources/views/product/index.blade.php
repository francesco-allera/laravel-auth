@extends('templates.base')

@section('title', 'Product Index')

@section('content')

    @if (Auth::check())
    <div class="pb-5 text-center">
        <a href="{{ route('product.create') }}">
            <button>add example</button>
        </a>
    </div>
    @endif

    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td class="text-capitalize">{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td><img src="{{ $product->img_url }}" alt=""></td>
                <td class="text-center">
                    <a href="{{ route('public.product.show', compact('product')) }}">
                        <button class="btn btn-primary my-2">
                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        </button>
                    </a>

                    @if (Auth::check())
                    <br>
                    <a href="{{ route('product.edit', compact('product')) }}">
                        <button class="btn btn-primary my-2">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </a>
                    <br>
                    <form action="{{ route('product.destroy', compact('product')) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-primary my-2">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection
