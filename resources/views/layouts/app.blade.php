<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Gestión de Cursos')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
            <div class="logo">
                <img src="{{ asset('images/EvoZone.png') }}" alt="EvoZone Logo">
            </div>
            <nav>
                <ul>
                    <li><a href="{{ route('home.index') }}">Inicio</a></li>
                    <li><a href="{{ route('courses.index') }}">Cursos</a></li>
                    @guest
                    <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                    <li><a href="{{ route('register.form') }}">Registrarse</a></li>
                    @endguest

                    @auth
                <li><a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Cerrar Sesión
                </a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endauth
                </ul>
            </nav>
    </header>


    <div class="container mt-4">
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

    

</body>
<footer class="site-footer">
    <div class="footer-content">
        <p>&copy; {{ date('Y') }} EvoZone. Todos los derechos reservados.</p>
        <p>Contacto: info@evozone.com | Síguenos en redes sociales</p>
    </div>
</footer>

</html>



