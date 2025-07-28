<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('student.dashboard', compact('courses'));
    }

//incripcion
    public function enroll($courseId)
{
    $user = Auth::user();

    // Solo estudiantes pueden inscribirse
    if (!$user->isStudent()) {
        return redirect()->back()->withErrors(['Solo los estudiantes pueden inscribirse.']);
    }

    $course = \App\Models\Course::findOrFail($courseId);

    //duplicados
    if ($user->enrolledCourses()->where('course_id', $courseId)->exists()) {
        return redirect()->back()->with('info', 'Ya estás inscrito en este curso.');
    }

    $user->enrolledCourses()->attach($courseId);

    return redirect()->back()->with('success', '¡Te has inscrito exitosamente!');
}

public function dashboard()
{
    $user = Auth::user();
    $courses = $user->courses; 
return view('student.dashboard', compact('courses'));

}


}

