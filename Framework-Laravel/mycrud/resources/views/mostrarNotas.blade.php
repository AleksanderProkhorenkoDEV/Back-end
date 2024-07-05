@extends('layouts.layout')
@section('title', $note->titulo)

@section('content')
    <h1>{{$note->titulo}}</h1>
    <p>
        {{$note->descripcion}}
    </p>

    <a href="{{route('index')}}">Volver</a>
@endsection