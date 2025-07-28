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

        {{-- Formulario para inscribirse (solo si está autenticado y es estudiante) --}}
        @auth
            @if(auth()->user()->role === 'estudiante')
                <form action="{{ route('courses.enroll', $course->id) }}" method="POST" class="mt-3">
                    @csrf
                    <button type="submit" class="btn btn-primary">Inscribirme</button>
                </form>
            @endif
        @endauth

        {{-- Mensajes de sesión --}}
        @if(session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger mt-3">{{ session('error') }}</div>
        @endif

        @if(session('info'))
            <div class="alert alert-info mt-3">{{ session('info') }}</div>
        @endif

        <div class="volver-container mt-4">
            <a href="{{ route('courses.index') }}" class="btn-volver">Volver al listado</a>
        </div>

    </div>
</div>
@endsection
