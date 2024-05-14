@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Producto</h1>
        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="form-group">
                <label for="category_id">Categoría</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}">
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $product->description) }}</textarea>
            </div>
            <div class="form-group">
                <label for="sku">SKU</label>
                <input type="text" class="form-control" id="sku" name="sku" value="{{ old('sku', $product->sku) }}">
            </div>
            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}">
            </div>
            <div class="form-group">
                <label for="size">Tamaño</label>
                <input type="text" class="form-control" id="size" name="size" value="{{ old('size', $product->size) }}">
            </div>
            <div class="form-group">
                <label for="color">Color</label>
                <input type="text" class="form-control" id="color" name="color" value="{{ old('color', $product->color) }}">
            </div>
            <div class="form-group">
                <label for="photo">Foto</label>
                <input type="file" class="form-control-file" id="photo" name="photo">
                @if ($product->photo)
                    <img src="{{ asset($product->photo) }}" alt="Product Photo" style="max-width: 100px;">
                @else
                    <p>Sin imagen</p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
