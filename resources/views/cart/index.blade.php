@extends('layouts.app')

@section('content')
    <h1>Carrinho de Compras</h1>

    @if(session('cart'))
        <form action="/update-cart" method="POST">
            @csrf
            <table>
                <thead>
                    <tr>
                        <th>Cupcake</th>
                        <th>Imagem</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Total</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(session('cart') as $id => $item)
                        <tr>
                            <td>{{ $item['nome'] }}</td>
                            <td><img src="{{ asset('/imagens/cupcakes/' . $item['imagem']) }}" alt="Cupcake {{ $item['nome'] }}" width="50"></td>
                            <td>
                                <input type="number" name="quantidade" value="{{ $item['quantidade'] }}" min="0" style="width: 50px;">
                                <input type="hidden" name="cupcake_id" value="{{ $id }}">
                            </td>
                            <td>R$ {{ $item['preco'] }}</td>
                            <td>R$ {{ $item['preco'] * $item['quantidade'] }}</td>
                            <td>
                                <a href="/remove-from-cart/{{ $id }}">Remover</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <button type="submit">Atualizar Carrinho</button>
            </div>
            <div style="font-weight: bold; font-size: 1.2em; margin-top: 20px;">
                Total: <span style="color: #e74c3c;">R$ {{ number_format(array_sum(array_map(fn($item) => $item['preco'] * $item['quantidade'], session('cart'))), 2, ',', '.') }}</span>
            </div>
        </form>

        <!-- Botão para finalizar o pedido -->
        <form action="{{ route('checkout') }}" method="GET" style="margin-top: 20px;">
            @csrf
            <button type="submit" class="btn btn-success">Finalizar Pedido</button>
        </form>

    @else
        <p>Seu carrinho está vazio.</p>
    @endif
@endsection
