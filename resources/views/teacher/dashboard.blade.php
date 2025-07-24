@extends('layouts.app')

@section('title', 'Panel Administrativo')

@section('content')
    <h1 class="mb-4">Panel Administrativo</h1>

    <div class="mb-4">
        <strong>Total de cursos:</strong> {{ $totalCursos }}
    </div>

    <div class="mb-4">
        <strong>Total de estudiantes:</strong> {{ $totalEstudiantes }}
    </div>

    <div>
        <h3>Inscripciones por curso</h3>
        <ul>
            @foreach ($inscripcionesPorCurso as $curso)
                <li>{{ $curso->title }} - {{ $curso->students_count }} inscripciones</li>
            @endforeach
        </ul>
    </div>
@endsection
