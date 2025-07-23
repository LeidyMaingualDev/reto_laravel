@extends('layouts.app')

@section('title', 'Editar curso')

@section('content')
<h1 class="mb-4">Editar curso</h1>

<form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label">Título</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $course->title) }}" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descripción</label>
        <textarea name="description" id="description" class="form-control" required>{{ old('description', $course->description) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="start_date">Fecha de inicio</label>
        <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $course->start_date) }}">
    </div>

    <div class="mb-3">
        <label for="end_date">Fecha de fin</label>
        <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $course->end_date) }}">
    </div>

    <div class="mb-3">
        <label for="instructor">Instructor</label>
        <input type="text" name="instructor" class="form-control" value="{{ old('instructor', $course->instructor) }}">
    </div>

    <div class="mb-3">
        <label for="image">Imagen</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection