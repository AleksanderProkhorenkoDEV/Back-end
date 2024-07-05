@extends('layout.app')

@section('title', 'Rents')

@section('body')
    @include('layout.partials.sidebar')
    @livewire('rents-table')
@endsection
