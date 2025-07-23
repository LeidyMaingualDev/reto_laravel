<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:6',
            'role' => 'required|in:student,teacher',
            'secret_code' => 'required'
        ]);

        $validCodes = [
            'student' => 'STUDENT2025',
            'teacher' => 'TEACHER2025',
        ];

        if ($request->secret_code !== $validCodes[$request->role]) {
            return back()->withErrors([
                'secret_code' => 'Código secreto incorrecto para el rol seleccionado.'
            ])->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        Auth::login($user);

        return redirect()->route(
            $user->isStudent() ? 'student.dashboard' : 'teacher.dashboard'
        );
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            dd(get_class($user));

            if ($user->isTeacher()) {
                return redirect()->route('teacher.dashboard');
            } else {
                return redirect()->route('student.dashboard');
            }
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas'])->withInput();
    }
}
