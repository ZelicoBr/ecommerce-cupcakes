@extends('layouts.app')

@section('content')
    <div class="auth-container">
        <h2>Registrar-se</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div>
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <label for="password_confirmation">Confirmar Senha</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>
            <button type="submit">Registrar</button>
        </form>
    </div>
@endsection
