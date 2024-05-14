@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Productos Disponibles</h1>
        @foreach ($categories as $category)
            <h2>{{ $category->name }}</h2>
            <div class="row">
                @foreach ($category->products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            @if ($product->photo)
                                <img src="{{ asset($product->photo) }}" alt="Product Photo" style="max-width: 100px;">
                            @else
                                Sin imagen
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-text">Precio: ${{ $product->price }}</p>
                                <a href="{{ route('productos.showBySlug', $product->sku) }}" class="btn btn-primary">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
