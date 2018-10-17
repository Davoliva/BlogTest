@extends('layout')
@section('contenido')


<form action="{{ route('mensajes.store') }}" method="POST">
    @include('messages.form', [
        'message' => new App\message,
        'showFields' => auth()->guest()
     ])
@endsection;
