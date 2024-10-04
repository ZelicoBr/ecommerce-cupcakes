@extends('layouts.app')

@section('content')
    <h1>Gerenciar Cupcakes</h1>
    <a href="{{ route('cupcakes.create') }}" class="btn btn-primary">Adicionar Cupcake</a>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cupcakes as $cupcake)
                <tr>
                    <td>{{ $cupcake->nome }}</td>
                    <td>{{ $cupcake->descricao }}</td>
                    <td>R$ {{ number_format($cupcake->preco, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('cupcakes.edit', $cupcake->id) }}">Editar</a>
                        <form action="{{ route('cupcakes.destroy', $cupcake->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
