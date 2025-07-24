@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Iniciar sesión</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input 
                type="email" 
                name="email" 
                id="email"
                class="form-control" 
                value="{{ old('email') }}" 
                required
            >
            @error('email')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input 
                type="password" 
                name="password" 
                id="password"
                class="form-control" 
                required
            >
            @error('password')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
</div>
@endsection
