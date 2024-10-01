<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request) {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|min:8',
        ]);

        User::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
        ]);

        return response()->json(['message' => 'Usuário registrado com sucesso!'], 201);
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'senha');

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['senha']])) {
            return response()->json(['message' => 'Login bem-sucedido!']);
        }

        return response()->json(['message' => 'Credenciais inválidas'], 401);
    }
}
