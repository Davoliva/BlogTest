@extends('layout')

@section('contenido')

<div class="row">
    <div class="col-md-12 py-3 ">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
                
            </div>
        @endif
        <h1>Bienvenidos</h1>
    </div>
    
</div>
 
@endsection
