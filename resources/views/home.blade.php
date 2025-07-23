@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <div class="text-center mb-5">
        <h1>Bienvenido al Sistema de Gestión de Cursos</h1>
        <p>Visualiza los cursos disponibles. Para inscribirte, debes iniciar sesión o registrarte.</p>

        <a href="{{ route('login') }}" class="btn btn-primary m-2">Iniciar Sesión</a>
        <a href="{{ route('register') }}" class="btn btn-success m-2">Registrarse</a>
    </div>

    <h2 class="mb-4">Cursos disponibles</h2>

    <div class="row">
        @foreach($courses as $course)
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->title }}</h5>
                        <p class="card-text">{{ $course->description }}</p>
                        <p><strong>Instructor:</strong> {{ $course->instructor }}</p>
                        <p><strong>Inicio:</strong> {{ $course->start_date }}</p>

                        {{-- Botón que exige login para inscribirse --}}
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-outline-primary">Inscribirse</a>
                        @else
                            <span class="text-muted">Ya iniciaste sesión</span>
                        @endguest
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
