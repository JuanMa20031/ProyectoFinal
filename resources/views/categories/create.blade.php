@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Categoria</h1>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

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
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="description">Descripcion</label>
                <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="priority">Prioridad</label>
                <input type="number" class="form-control" id="priority" name="priority" value="{{ old('priority', 0) }}">
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
@endsection
