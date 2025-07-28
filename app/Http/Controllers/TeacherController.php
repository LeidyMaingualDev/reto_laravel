<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function dashboard()
    {
        // Total de cursos
        $totalCursos = Course::count();

        // Total de estudiantes
        $totalEstudiantes = User::where('role', 'student')->count();

        // Inscripciones por curso
        $inscripcionesPorCurso = Course::withCount('students')->get();

        return view('teacher.dashboard', compact('totalCursos', 'totalEstudiantes', 'inscripcionesPorCurso'));
    }
}

