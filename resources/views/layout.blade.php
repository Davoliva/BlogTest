{{--  {{ dd( auth()->user()->roles->toArray()) }}  --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel ={
            csrfToken: "{{ csrf_token() }}"
        }
    </script>
    <title>Mi sitio</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <header>
        <?php function activeMenu($url){
            return request()->is($url) ? 'active' : '';
        }?>
        <div class="container">
        <nav class="d-flex flex-column flex-md-row navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mr-auto">
                    <li class="{{ url('/') }}">
                        <a class="nav-link" href="{{ route('home') }} ">Inicio</a>
                    </li>
                    <li class="{{ url('saludos/*') }} ">
                        <a class="nav-link" href="{{ route('saludo', 'David') }} ">Saludo</a>
                    </li>
                    <li class="{{ url('mensaje/create') }}" >
                        <a class="nav-link" href="{{ route('mensajes.create') }} ">Contactos</a>
                    </li>
                    @if (auth()->check())
                        <li class="{{ url('mensajes') }}" >
                            <a class="nav-link" href="{{ route('mensajes.index') }} ">Mensajes</a>
                        </li>
                        @if (auth()->user()->hasRoles(['Admin']))
                            <li class="{{ url('usuarios') }}" >
                                <a class="nav-link" href="{{ route('usuarios.index') }} ">Usuario</a>
                            </li>
                        @endif

                    @endif
                </ul>
                <div>
                    <ul class="navbar-nav">
                        @if (auth()->guest())
                            <a class="{{ url('login') }}  btn btn-outline-primary" href="/login ">Login</a>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ auth()->user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/usuarios/{{ auth()->id() }}/edit" >Mi Cuenta</a>
                                    <a class="dropdown-item"onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" href="{{ route('logout') }}">Cerrar sesión</a>
                                </div>
                            </li>
                        @endif

                    </ul>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                </form>
            </div>
        </nav>

        </div>


        <script>
            $('#navId a').click(e => {
                e.preventDefault();
                $(this).tab('show');
            });
        </script>

    </header>
    <div class="container">
        @yield('contenido')
        <footer>Copyright {{ date('Y') }}</footer>
    </div>
    <script src="/js/app.js"></script>
</body>
</html>

