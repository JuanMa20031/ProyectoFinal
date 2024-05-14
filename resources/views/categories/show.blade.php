@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $category->name }}</h1>
        <p><strong>Descripcion:</strong> {{ $category->description }}</p>
        <p><strong>Prioridad:</strong> {{ $category->priority }}</p>
        <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection
