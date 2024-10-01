<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function showRegisterForm() {
        return view('auth.register');
    }

    // Processa o registro de um novo usuário
    public function register(Request $request) {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);

        // Faz login automaticamente após o registro
        Auth::attempt($request->only('email', 'password'));

        return redirect('/')->with('success', 'Cadastro realizado com sucesso!');
    }

    // Exibe o formulário de login
    public function showLoginForm() {
        return view('auth.login');
    }

    // Processa o login
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/')->with('success', 'Login realizado com sucesso!');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas.']);
    }

    // Processa o logout
    public function logout() {
        Auth::logout();
        return redirect('/login')->with('success', 'Você saiu da sua conta.');
    }
}
