@extends('layouts.app')

@section('title', 'Detalle del curso')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>{{ $course->title }}</h2>
    </div>
    <div class="card-body">

        <p><strong>Descripción:</strong> {{ $course->description }}</p>

        <p><strong>Instructor:</strong> {{ $course->instructor ?? 'No asignado' }}</p>

        <p><strong>Fecha de inicio:</strong> {{ $course->start_date ? \Carbon\Carbon::parse($course->start_date)->format('d/m/Y') : 'No definida' }}</p>

        <p><strong>Fecha de fin:</strong> {{ $course->end_date ? \Carbon\Carbon::parse($course->end_date)->format('d/m/Y') : 'No definida' }}</p>

        @if ($course->image)
            <div class="mb-3">
                <strong>Imagen del curso:</strong><br>
                <img src="{{ asset('storage/' . $course->image) }}" alt="Imagen del curso" class="img-fluid" style="max-width: 400px;">
            </div>
        @else
            <p><strong>Imagen:</strong> No disponible</p>
        @endif

        <a href="{{ route('courses.index') }}" class="btn btn-secondary mt-3">Volver</a>
    </div>
</div>
@endsection

