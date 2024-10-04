@extends('layouts.app')

@section('content')
    <div class="form-container">
        <h1>Editar Cupcake: {{ $cupcake->nome }}</h1>

        <form action="{{ route('cupcakes.update', $cupcake->id) }}" method="POST" enctype="multipart/form-data" class="cupcake-form">
            @csrf
            @method('PUT') <!-- Método para atualização -->

            <!-- Nome do Cupcake -->
            <div class="form-group">
                <label for="nome">Nome do Cupcake:</label>
                <input type="text" name="nome" id="nome" value="{{ $cupcake->nome }}" placeholder="Ex: Cupcake de Chocolate" required>
            </div>

            <!-- Descrição do Cupcake -->
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" rows="4" placeholder="Descreva o cupcake..." required>{{ $cupcake->descricao }}</textarea>
            </div>

            <!-- Preço do Cupcake -->
            <div class="form-group">
                <label for="preco">Preço (R$):</label>
                <input type="number" name="preco" id="preco" value="{{ $cupcake->preco }}" placeholder="Ex: 9.99" step="0.01" required>
            </div>

            <!-- Categoria do Cupcake -->
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <select name="categoria" id="categoria" required>
                    <option value="chocolate" {{ $cupcake->categoria == 'doce' ? 'selected' : '' }}>Doce</option>
                    <option value="frutas" {{ $cupcake->categoria == 'vegan' ? 'selected' : '' }}>Vegano</option>
                </select>
            </div>

            <!-- Imagem do Cupcake -->
            <div class="form-group file-input">
                <label for="imagem">Imagem do Cupcake:</label>
                <input type="file" name="imagem" id="imagem">
                <small>Deixe em branco para manter a imagem atual.</small>
            </div>

            <!-- Botão de Submissão -->
            <button type="submit" class="btn-submit">Atualizar Cupcake</button>
        </form>
    </div>
@endsection
