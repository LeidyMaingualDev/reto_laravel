<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    // Mostrar todos los cursos
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    // Mostrar formulario para crear un nuevo curso
    public function create()
    {
        return view('courses.create');
    }

    // Guardar nuevo curso
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

        // Subir imagen y guardar ruta
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        Course::create($validated);

        return redirect()->route('courses.index')->with('success', 'Curso creado correctamente.');
    }

    // Mostrar un curso específico
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.show', compact('course'));
    }

    // Mostrar formulario para editar un curso
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    // Actualizar curso
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

        // Si se sube nueva imagen, reemplazar
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        $course->update($validated);

        return redirect()->route('courses.index')->with('success', 'Curso actualizado correctamente.');
    }

    // Eliminar curso
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Curso eliminado correctamente.');
    }
}


