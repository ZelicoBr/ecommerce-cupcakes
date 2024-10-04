@extends('layouts.app')

@section('content')
    <div class="form-container">
        <h1>Adicionar Novo Cupcake</h1>

        <form action="{{ route('cupcakes.store') }}" method="POST" enctype="multipart/form-data" class="cupcake-form">
            @csrf

            <!-- Nome do Cupcake -->
            <div class="form-group">
                <label for="nome">Nome do Cupcake:</label>
                <input type="text" name="nome" id="nome" placeholder="Ex: Cupcake de Chocolate" required>
            </div>

            <!-- Descrição do Cupcake -->
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" rows="4" placeholder="Descreva o cupcake..." required></textarea>
            </div>

            <!-- Preço do Cupcake -->
            <div class="form-group">
                <label for="preco">Preço (R$):</label>
                <input type="number" name="preco" id="preco" placeholder="Ex: 9.99" step="0.01" required>
            </div>

            <!-- Categoria do Cupcake -->
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <select name="categoria" id="categoria" required>
                    <option value="doce">Doce</option>
                    <option value="vegan">Vegano</option>
                </select>
            </div>

            <!-- Imagem do Cupcake -->
            <div class="form-group file-input">
                <label for="imagem">Imagem do Cupcake:</label>
                <input type="file" name="imagem" id="imagem" required>
            </div>

            <!-- Botão de Submissão -->
            <button type="submit" class="btn-submit">Adicionar Cupcake</button>
        </form>
    </div>
@endsection
