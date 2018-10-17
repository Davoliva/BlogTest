@extends('layout')

@section('contenido')

    <div class="row">
        <div class="col-md-12 py-5">
            <h1>Todos los mensajes</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Mensajes</th>
                        <th>Notas</th>
                        <th>Etiquetas</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        <tr>
                            <td>{{ $message->id }}</td>
                            <td>{{ $message->present()->userName() }}</td>
                            <td>{{ $message->present()->userEmail() }}</td>
                            <td>{{ $message->present()->link() }}</td>
                            <td>{{ $message->present()->notes() }}</td>
                            <td>{{ $message->present()->tags() }}</td>
                            <td>
                                <a class="btn btn-info btn-group-xs" href="{{ route('mensajes.edit', $message->id) }}">Editar</a>
                                <form style="display:inline" method="POST" action="{{ route('mensajes.destroy', $message->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    {!! $messages->fragment('hash')->appends(request()->query())->links('pagination::bootstrap-4') !!}
                </tbody>
            </table>
        </div>
    </div>
@endsection
