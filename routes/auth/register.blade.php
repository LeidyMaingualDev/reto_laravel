@extends('layouts.app')

@section('title', 'Registrarse')

@section('content')
<h1>Registro</h1>
<form method="POST" action="{{ route('register.submit') }}">
    @csrf
    <input type="text" name="name" placeholder="Nombre" required>
    <input type="email" name="email" placeholder="Correo" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required>

    <select name="role" required>
        <option value="">Seleccionar rol</option>
        <option value="student">Estudiante</option>
        <option value="teacher">Profesor</option>
    </select>

    <input type="text" name="secret_code" placeholder="Código secreto" required>

    <button type="submit">Registrarse</button>
</form>
@endsection
