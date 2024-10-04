@extends('layouts.app')

@section('content')
    <h1>Pedidos</h1>

    <table>
        <thead>
            <tr>
                <th>ID do Pedido</th>
                <th>Cliente</th>
                <th>Total</th>
                <th>Itens</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>R$ {{ $order->total }}</td>
                    <td>
                        <ul>
                            @foreach($order->items as $item)
                                <li>{{ $item->cupcake->nome }} - Quantidade: {{ $item->quantidade }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
