@extends('layouts.app')

@section('content')
    <div class="admin-panel">

        <!-- Navegação Lateral -->
        <div class="admin-container">
            <aside class="admin-sidebar">
                <ul>
                    <li><a href="{{ route('cupcakes.index') }}" class="btn">Gerenciar Cupcakes</a></li>
                    <li><a href="{{ route('admin.orders.index') }}" class="btn">Ver Pedidos</a></li>
                </ul>
            </aside>

            <!-- Conteúdo Principal -->
            <main class="admin-content">
                <h2>Bem-vindo ao painel administrativo</h2>
                <p>Aqui você pode gerenciar cupcakes, visualizar pedidos e ajustar configurações.</p>
                <div class="admin-cards">
                    <div class="card">
                        <h3>Cupcakes</h3>
                        <p>Gerencie seus produtos.</p>
                        <a href="{{ route('cupcakes.index') }}" class="btn">Ver Cupcakes</a>
                    </div>
                    <div class="card">
                        <h3>Pedidos</h3>
                        <p>Veja os pedidos feitos pelos clientes.</p>
                        <a href="{{ route('admin.orders.index') }}" class="btn">Ver Pedidos</a>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
