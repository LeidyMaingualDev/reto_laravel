@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')

<div class="form-session">
    <h1>Iniciar sesión</h1>

    @if(session('error'))
        <div class="alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf

        <label for="email">Correo electrónico</label>
        <input 
            type="email" 
            name="email" 
            id="email"
            class="controls" 
            value="{{ old('email') }}" 
            required
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

        <button type="submit" class="controls">Ingresar</button>
    </form>
</div>
@endsection

