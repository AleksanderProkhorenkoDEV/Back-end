@extends('layouts.layout')

@section('title', 'Formulario de edicion')

@section('content')

<form action="{{ route('update', $note->id) }}" method="POST">
    @csrf
    @method('PUT');
    <label for="">Titulo:</label>
    <input type="text" name="titulo" required value="{{$note->titulo}}">
    <label for="">Descripcion:</label>
    <input type="textArea" name="descripcion" required value="{{$note->descripcion}}">
    <input type="submit" value="Update">
</form>

@endsection