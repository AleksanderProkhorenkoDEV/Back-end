@extends('layout.app')

@section('title', 'Home Page')

@section('cuerpo')
    <a href="{{route('register.create')}}">Register</a>
@endsection