<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BreakSuf</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header>
    <h1>BreakSuf</h1>
    <nav>
        <div style="margin-bottom: 10px">
        <a href="/">Home</a>
        @if(auth()->check() && auth()->user()->is_admin)
            <a href="{{ route('admin.dashboard') }}" class="btn btn-admin-panel">Painel Administrativo</a>
            @endif
        </div>
        @guest
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Registrar</a>
        @else
            <span>Bem-vindo, {{ Auth::user()->name }}</span>

            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit">Sair</button>
            </form>

            <a href="/cart">
                Carrinho ({{ session('cart') ? count(session('cart')) : 0 }}) 
            </a>
        @endguest
    </nav>
</header>



    <div class="container">
        @yield('content')
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} BreakSuf</p>
    </footer>
</body>
</html>
