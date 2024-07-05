
@extends('layouts.landing')

@section('title', 'index')

@section('content')

    <h1>Update the index with yield and section</h1>
    <h1>Lista Uusarios </h1>
    <ul>
        @forelse($usuarios as $usuario)
        <!-- Contenido a mostrar por cada elemento en la colección -->
            <li>{{ $usuario->name }}</li>
        @empty
        <!-- Contenido a mostrar si la colección está vacía -->
            <li>No hay elementos en la colección.</li>
        @endforelse
    
    </ul>
@endsection

