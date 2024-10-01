@extends('layouts.app')

@section('content')
    <h1>Catálogo de Cupcakes</h1>
    <div class="cupcakes">
        @if($cupcakes->count() > 0)
            @foreach($cupcakes as $cupcake)
                <div class="cupcake-item">
                    <h3>{{ $cupcake->nome }}</h3>
                    <img src="{{ asset('imagens/cupcakes/' . $cupcake->imagem) }}" alt="Cupcake {{ $cupcake->nome }}" width="150">
                    <p>{{ $cupcake->descricao }}</p>
                    <p>Preço: R$ {{ $cupcake->preco }}</p>
                    <form action="/add-to-cart" method="POST">
                        @csrf
                        <input type="hidden" name="cupcake_id" value="{{ $cupcake->id }}">
                        <button type="submit">Adicionar ao Carrinho</button>
                    </form>
                </div>
            @endforeach
        @else
            <p>Nenhum cupcake disponível no momento.</p>
        @endif
    </div>
@endsection
