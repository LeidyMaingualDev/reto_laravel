@extends('layouts.app')

@section('title', 'Listado de cursos')

@section('content')
    <h1 class="mb-4">Listado de cursos</h1>
    <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Crear curso</a>

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
                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este curso?')">Eliminar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
