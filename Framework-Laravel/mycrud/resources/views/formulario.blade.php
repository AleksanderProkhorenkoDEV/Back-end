@extends('layouts.layout')

@section('title', 'AGREGAR NUEVA NOTA')


@section('content')

    <form action="{{ route('storage') }}" method="POST">
        @csrf
        <label for="">Inserte el titulo de la nota</label>
        <input type="text" name="titulo" required>
        <label for="">Inserte la descripcion de la nota</label>
        <input type="textArea" name="descripcion" required>
        <input type="submit" value="Añadir">
    </form>
@endsection