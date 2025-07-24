@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')
    <h1 class="mb-4">Iniciar sesión</h1>

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf
        <div>
            <label for="email">Correo:</label>
            <input type="email" name="email" required>
        </div>

        <div>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit">Entrar</button>
    </form>
@endsection
