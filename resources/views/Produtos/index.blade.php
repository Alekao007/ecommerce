@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/produtos.css') }}">

<h1>Produtos</h1>
<div class="container-produto">
    <a href="{{ route('produtos.create') }}" class="btn btn-primary">Adicionar Novo Produto</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Categoria</th>
                <th>Estoque</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                    <td>{{ optional($produto->categoria)->nome }}</td>
                    <td>{{ optional($produto->estoque)->quantidade }}</td>
                    <td>
                        <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning">Editar</a>
                        <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $produto->id }}')">Deletar</button>
                        <form id="deleteForm{{ $produto->id }}" action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function confirmDelete(produtoId) {
        if (confirm('Tem certeza que deseja deletar este produto?')) {
            document.getElementById('deleteForm' + produtoId).submit();
        }
    }
</script>
@endsection
