@extends('layout.app')

@section('title', 'Authors')

@section('body')
    @include('layout.partials.sidebar')
    @livewire('authors-table')
@endsection
