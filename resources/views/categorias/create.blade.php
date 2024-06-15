@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/categories.css') }}">

    <div class="container">
        <h1>Criar Nova Categoria</h1>
        <div class="categorias-container">
            <form action="{{ route('categorias.store') }}" method="POST" class="form-categoria">
                @csrf

                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <textarea name="descricao" id="descricao" class="form-control" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Salvar Categoria</button>
            </form>
        </div>
    </div>
@endsection
