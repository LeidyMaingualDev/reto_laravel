@extends('layouts.app')

@section('title', 'Listado de cursos')

@section('content')
<div class="container-cursos">
    <h1 class="mb-4">Listado de cursos</h1>



    @if ($courses->isEmpty())
    <p>No hay cursos registrados.</p>
    @else
    <ul class="list-group">
        @foreach ($courses as $course)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <strong>{{ $course->title }}</strong><br>
                {{ $course->description }}
            </div>
            <div>
                @auth
                @if(auth()->user()->role === 'estudiante')
                <form action="{{ route('student.enroll', $course->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-info btn-sm">Inscribirme</button>
                </form>
                @else
                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este curso?')">Eliminar</button>
                </form>
                @endif
                @endauth

                @guest
                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info btn-sm">Ver</a>
                @endguest
            </div>
        </li>
        @endforeach
    </ul>
    @endif
</div>
@endsection