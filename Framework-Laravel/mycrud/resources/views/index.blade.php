@extends('layouts.layout')


@section('title', 'CRUD DE NOTAS')

@section('content')
    <a href="{{route('create')}}">Insertar Datos</a>
    <ul>    
        @forelse ($datos as $dato)
            <li>
                <a href="{{route('select', $dato->id)}}">{{$dato->titulo}}</a> 
                <a href="{{route('edit',  $dato->id)}}">Editar</a> 
                <form action="{{route('delete', $dato->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete">
                </form>
            </li>    
        @empty
            <li>No hay datos en la base de datos</li>
        @endforelse
    </ul>
@endsection