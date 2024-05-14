@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Productos</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Crear Producto</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Tamaño</th>
                    <th>Color</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->size }}</td>
                        <td>{{ $product->color }}</td>
                        <td>
                            @if ($product->photo)
                                <img src="{{ asset($product->photo) }}" alt="Product Photo" style="max-width: 100px;">
                            @else
                                Sin imagen
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('products.show', $product) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
