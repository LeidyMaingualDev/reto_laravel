<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

//ir a index
Route::get('/courses', function () {
    $user = Auth::user();

    if ($user && $user->role === 'student') {
        return redirect()->route('student.dashboard');
    }

    return app(App\Http\Controllers\CourseController::class)->index();
})->name('courses.index');

//inicio
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

// formulario de login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Procesar login
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Autenticación - Registro
Route::get('/register', function () {
    return view('auth.register');
})->name('register.form');

Route::post('/register', [AuthController::class, 'register'])->name('register');

// Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Rutas RESTful para cursos
Route::resource('courses', CourseController::class);

// Dashboards según el rol
Route::middleware(['auth'])->group(function () {

    // Dashboard estudiante
    Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.dashboard');

    // Dashboard profesor
    Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');

});
//inscrpcion 
Route::post('/courses/{course}/enroll', [StudentController::class, 'enroll'])
    ->middleware('auth')
    ->name('courses.enroll');





