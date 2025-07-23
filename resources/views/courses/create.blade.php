@extends('layouts.app')

@section('title', 'Crear curso')

@section('content')
<h1 class="mb-4">Crear nuevo curso</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Título</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descripción</label>
        <textarea name="description" id="description" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
        <label for="start_date">Fecha de inicio</label>
        <input type="date" name="start_date" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="end_date">Fecha de fin</label>
        <input type="date" name="end_date" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="instructor">Instructor</label>
        <input type="text" name="instructor" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="image">Imagen</label>
        <input type="file" name="image" class="form-control" required>
    </div>



    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancelar</a>

</form>
@endsection