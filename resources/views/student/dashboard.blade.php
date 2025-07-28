@extends('layouts.app')

@section('title', 'Panel del Estudiante')

@section('content')
<h1 class="mb-4">Cursos disponibles</h1>

<div class="row">
    @foreach($courses as $course)
    <div class="col-md-4 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">{{ $course->title }}</h5>
                <p class="card-text">{{ $course->description }}</p>
                <p><strong>Instructor:</strong> {{ $course->instructor }}</p>
                <p><strong>Fecha de inicio:</strong> {{ $course->start_date }}</p>

                <form action="{{ route('courses.enroll', $course->id) }}" method="POST" onsubmit="return confirmEnrollment()">
                    @csrf
                    <button type="submit" class="btn btn-primary">Inscribirme</button>
                </form>

                <script>
                    function confirmEnrollment() {
                        return confirm('¿Estás seguro de que deseas inscribirte en este curso?');
                    }
                </script>

            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
