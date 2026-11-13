<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //Mostrar login
    public function showLogin()
    {
        if (auth()->check()) {
             return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    //Procesar el Login
    public function login(Request $request)
    {
         $credenciales = $request->validate([
            'email' => ['required', 'email', 'ends_with:@disfarma.hn'],
            'password' => ['required'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt([
            'email' => $credenciales['email'],
            'password' => $credenciales['password']
        ], $remember)) {

            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'))
                ->with('success', 'Bienvenido, ' . Auth::user()->name);
        }

        return back()->withErrors([
            'email' => 'EL correo o contraseña son incorrectas.',
        ])->onlyInput('email');
    }

    //Mostrar form de registros
    public function showRegister()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.register');
    }

    //Procesar nueva sesion
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users|ends_with:@disfarma.hn',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('dashboard')
            ->with('success', 'Bienvenido, ' . $user->name);
    }

    //Cerrar sesion
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'sesion cerrada.');
    }



}
