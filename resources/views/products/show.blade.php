@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $product->name }}</h1>
        <p><strong>Descripción:</strong> {{ $product->description }}</p>
        <p><strong>Precio:</strong> {{ $product->price }}</p>
        <p><strong>Tamaño:</strong> {{ $product->size }}</p>
        <p><strong>Color:</strong> {{ $product->color }}</p>
        @if ($product->photo)
            <img src="{{ asset($product->photo) }}" alt="Product Photo" style="max-width: 100%;">
        @else
            Sin imagen
        @endif
        <a href="{{ route('home') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection
