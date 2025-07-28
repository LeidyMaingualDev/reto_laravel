@extends('layouts.app')

@section('title', 'Cursos disponibles')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Cursos disponibles</h1>

    @if($courses->isEmpty())
        <p>No hay cursos disponibles en este momento.</p>
    @else
        <div class="courses-grid">
            @foreach($courses as $course)
                <div class="course-card">
                    <h3>{{ $course->title }}</h3>
                    <p><strong>Descripción:</strong> {{ Str::limit($course->description, 100) }}</p>
                    <p><strong>Instructor:</strong> {{ $course->instructor ?? 'No asignado' }}</p>
                    
                    <a href="{{ route('courses.show', $course->id) }}" class="btn-ver">Ver detalles</a>
                </div>
            @endforeach
        </div>
    @endif
</div>

<style>
.container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
}
.courses-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
}
.course-card {
    background-color: #f9f9f9;
    padding: 20px;
    border-left: 6px solid #333;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    position: relative;
}
.course-card h3 {
    margin-top: 0;
    margin-bottom: 10px;
    font-size: 1.3rem;
    color: #222;
}
.course-card p {
    margin: 6px 0;
    color: #555;
}
.btn-ver {
    display: inline-block;
    margin-top: 10px;
    padding: 8px 12px;
    background-color: #000;
    color: #fff;
    text-decoration: none;
    border-radius: 6px;
    transition: background 0.3s ease;
}
.btn-ver:hover {
    background-color: #444;
}
</style>
@endsection
