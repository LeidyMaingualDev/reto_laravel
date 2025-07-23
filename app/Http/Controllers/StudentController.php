<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class StudentController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('student.dashboard', compact('courses'));
    }
}

