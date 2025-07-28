<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Http\Controllers\Controller;


class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('enroll');
    }
    // Mostrar todos los cursos
   public function index()
{
    $courses = Course::all();

    if (Auth::check()) {
        $user = Auth::user();

        if ($user->isTeacher()) {
            return view('courses.index', compact('courses'));
        }

        if ($user->isStudent()) {
            return view('student.dashboard', compact('courses'));
        }
    }

    
    return view('courses.public', compact('courses'));
}



    
    public function create()
    {
        return view('courses.create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'instructor' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        Course::create($validated);

        return redirect()->route('courses.index')->with('success', 'Curso creado correctamente.');
    }

   
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.show', compact('course'));
    }

    
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'instructor' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $course = Course::findOrFail($id);

        
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        $course->update($validated);

        return redirect()->route('courses.index')->with('success', 'Curso actualizado correctamente.');
    }


    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Curso eliminado correctamente.');
    }

    public function enroll($courseId)
{
    $user = Auth::user();

    
    if ($user->role !== 'estudiante') {
        return redirect()->back()->with('error', 'Solo los estudiantes pueden inscribirse.');
    }

    
    if ($user->courses()->where('course_id', $courseId)->exists()) {
        return redirect()->back()->with('info', 'Ya estás inscrito en este curso.');
    }

   
    $user->courses()->attach($courseId);

    return redirect()->back()->with('success', 'Inscripción exitosa.');
}

}


