@extends('layout.app')

@section('title', 'Books')

@section('body')
    @include('layout.partials.sidebar')
    @livewire('book-table')
@endsection