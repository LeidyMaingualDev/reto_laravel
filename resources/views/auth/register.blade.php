@extends('layouts.app')

@section('title', 'Registro')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="form-session">
    <h1>Registro de Usuario</h1>

    @if(session('success'))
        <div class="alert-danger">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <label for="name">Nombre</label>
        <input 
            type="text" 
            name="name" 
            id="name"
            class="controls" 
            required 
            value="{{ old('name') }}"
        >
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <label for="email">Correo electrónico</label>
        <input 
            type="email" 
            name="email" 
            id="email"
            class="controls" 
            required 
            value="{{ old('email') }}"
        >
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <label for="password">Contraseña</label>
        <input 
            type="password" 
            name="password" 
            id="password"
            class="controls" 
            required
        >
        @error('password')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <label for="password_confirmation">Confirmar contraseña</label>
        <input 
            type="password" 
            name="password_confirmation" 
            id="password_confirmation"
            class="controls" 
            required
        >

        <label for="role">Rol</label>
        <select 
            name="role" 
            id="role" 
            class="controls" 
            required
        >
            <option value="">Selecciona tu rol</option>
            <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Estudiante</option>
            <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>Docente</option>
        </select>
        @error('role')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <label for="secret_code">Código secreto</label>
        <input 
            type="text" 
            name="secret_code" 
            id="secret_code"
            class="controls" 
            required
        >
        @error('secret_code')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="controls">Registrarse</button>
    </form>
</div>
@endsection
