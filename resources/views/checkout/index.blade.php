@extends('layouts.app')

@section('content')
    <h1>Finalizar Pedido</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(!empty($cart))
        <table>
            <thead>
                <tr>
                    <th>Cupcake</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $item)
                    <tr>
                        <td>{{ $item['nome'] }}</td>
                        <td>{{ $item['quantidade'] }}</td>
                        <td>R$ {{ $item['preco'] }}</td>
                        <td>R$ {{ $item['preco'] * $item['quantidade'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total">
            <strong>Total do Pedido: R$ {{ array_sum(array_map(fn($item) => $item['preco'] * $item['quantidade'], $cart)) }}</strong>
        </div>

        <form action="{{ route('checkout.process') }}" method="POST" style="margin-top: 20px;">
            @csrf
            <button type="submit" class="btn btn-primary">Confirmar Pedido</button>
        </form>
    @else
        <p>Seu carrinho está vazio.</p>
    @endif
@endsection
