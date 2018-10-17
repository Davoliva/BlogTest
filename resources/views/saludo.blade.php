@extends('layout')
@section('contenido')

<h1>saludos a {{ $nombre }}</h1>

<ul>
    @forelse ($consolas as $consola)
        <li>{{ $consola }}</li>
    @empty
        <p>No hay consolas. :(</p>
    @endforelse

</ul>
@endsection