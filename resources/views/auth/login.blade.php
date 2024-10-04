@extends('layouts.app')

@section('content')
    <div class="auth-container">
        <h2>Login</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit">Entrar</button>
        </form>
        <p>Não tem uma conta? <a href="{{ route('register') }}">Registre-se</a></p>
    </div>
@endsection
