@extends('layout')

@section('contenido')
    <h1>Editar mensaje</h1>

    <form method="POST" action="{{ route('mensajes.update', $message->id) }}" >
        @method('PUT')
        @include('messages.form', [
            'btnText' => 'Actualizar',
            'showFields' => ! $message->user_id,
        ])
    </form>

@endsection
