@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/estoque.css') }}"> <!-- Incluir o arquivo de estilo específico -->

<h1>Editar Estoque</h1>
<form action="{{ route('estoque.update', $estoque->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="quantidade">Quantidade:</label>
    <input type="number" name="quantidade" id="quantidade" value="{{ $estoque->quantidade }}" required>
    <button type="submit" class="btn btn-atualizar-estoque">Atualizar Estoque</button>
</form>
@endsection