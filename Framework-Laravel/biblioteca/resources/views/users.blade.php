@extends('layout.app')

@section('title', 'Users')

@section('body')
    @include('layout.partials.sidebar')
    @livewire('users-table')
@endsection
