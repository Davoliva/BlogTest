@extends('layout')

@section('contenido')
    <div class="row justify-content-md-center">
        <div class="col-md-6 py-5">
            <h1>Crear usuario nuevo</h1>
            @if (session()->has('info'))
                <div class="alert alert-success" role="alert">
                    {{ session('info') }}
                </div>
            @endif
           <form method="POST" action="{{ route('usuarios.store') }}">
                @include('users.form', ['user' => new App\user])


           </form>
        </form>
        </div>
    </div>
@endsection
