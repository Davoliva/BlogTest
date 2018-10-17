@extends('layout')

@section('contenido')
    <div class="row">
        <div class="col-md-12 py-5">
            <h1>Usuarios</h1>

            <a class="btn btn-primary btn-lg btn-block" href="{{ route('usuarios.create') }}">Crear nuevo usuario</a>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Notas</th>
                        <th>Etiquetas</th>
                        <th>Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->present()->link() }}</a></td>
                            <td>{{ $user->email }}</td>
                            <td>
                                {{ $user->present()->roles() }}

                            </td>
                            <td>{{ $user->present()->notes() }}</td>
                            <td>{{ $user->present()->tags() }}</td>
                            <td>
                                <a class="btn btn-info btn-group-xs" href="{{ route('usuarios.edit', $user->id) }}">Editar</a>
                                <form style="display:inline" method="POST" action="{{ route('usuarios.destroy', $user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
