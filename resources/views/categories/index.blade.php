@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Categorias</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Crear Categoria</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Prioridad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ $category->priority }}</td>
                        <td>
                            <a href="{{ route('categories.show', $category) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
