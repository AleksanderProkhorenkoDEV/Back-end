@extends('layout.app')
@section('title', 'Register Form')

@section('cuerpo')
    <div class="cotenedor-form">
        <h2>Register Form</h2>
        <form action="{{route('register.store')}}" method="post">
            @csrf

            <label for="">Name:</label>
            <input type="text" name="name" required>
            <br>
            <label for="">Email:</label >
            <input type="email" name="email" required>
            <br>
            <label for="">Password:</label>
            <input type="password" name="password" required>
            <br>
            <input type="submit" value="Enviar">
        </form>
    </div>
@endsection