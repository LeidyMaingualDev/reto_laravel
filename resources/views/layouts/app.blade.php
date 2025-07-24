<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Gestión de Cursos')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('courses.index') }}">Gestión de Cursos</a>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('info'))
    <div class="alert alert-info">{{ session('info') }}</div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $e)
        <div>{{ $e }}</div>
        @endforeach
    </div>
    @endif

    <nav>
        <ul>
            <li><a href="/">Inicio</a></li>
            <li><a href="{{ route('courses.index') }}">Cursos</a></li>

            @auth
            @if(auth()->user()->role === 'profesor')
            <li><a href="{{ route('admin.dashboard') }}">Panel administrativo</a></li>
            @endif

            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Cerrar sesión</button>
                </form>
            </li>
            @endauth

            @guest
            <li><a href="{{ route('login') }}">Iniciar sesión</a></li>
            @endguest
        </ul>
    </nav>

</body>

</html>