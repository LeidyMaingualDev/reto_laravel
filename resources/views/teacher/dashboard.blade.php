@extends('layouts.app')

@section('title', 'Panel Administrativo')

@section('content')
<div class="admin-dashboard">
    <h1 class="dashboard-title">Panel Administrativo</h1>

    <div class="stats-cards">
        <div class="card stat-card">
            <h2>{{ $totalCursos }}</h2>
            <p>Total de cursos</p>
        </div>
        <div class="card stat-card">
            <h2>{{ $totalEstudiantes }}</h2>
            <p>Total de estudiantes</p>
        </div>
    </div>

    <div class="course-stats">
        <h3 class="section-title">Inscripciones por curso</h3>
        <ul class="course-list">
            @foreach ($inscripcionesPorCurso as $curso)
                <li>
                    <span class="course-title">{{ $curso->title }}</span>
                    <span class="badge">{{ $curso->students_count }} inscritos</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection

