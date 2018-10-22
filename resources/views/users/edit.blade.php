@extends('layout')

@section('contenido')

    <div class="row justify-content-md-center">
        <div class="col-md-6 py-5">
            <h1>Editar usuario</h1>
            @if (session()->has('info'))
                <div class="alert alert-success" role="alert">
                    {{ session('info') }}
                </div>
            @endif
            <form action="{{ route('usuarios.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')

                <img width="100px" src="{{ Storage::url($user->avatar) }}" alt="">
                @include('users.form')
            </form>
        </div>
    </div>
@endsection
