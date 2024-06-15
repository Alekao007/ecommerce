@extends('layouts.app')

@section('content')
    <!-- Inclua o Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <div class="container">
        <h1 class="text-center">Estoque</h1>
        <a href="{{ route('estoque.create') }}" class="btn btn-primary mb-3">Adicionar Novo Estoque</a>

        <div class="estoque-lista">
            <ul class="list-group">
                @foreach ($estoques as $estoque)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Quantidade: {{ $estoque->quantidade }}
                        <div class="btn-group" role="group">
                            <a href="{{ route('estoque.show', $estoque->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('estoque.edit', $estoque->id) }}" class="btn btn-warning">Editar</a>
                            <!-- Botão de deletar com alerta de confirmação -->
                            <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $estoque->id }}', '{{ $estoque->quantidade }}')">Deletar</button>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- JavaScript do Bootstrap (coloque antes do fechamento do body) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
        function confirmDelete(estoqueId, quantidade) {
            if (confirm(`Tem certeza que deseja excluir o item de estoque com quantidade ${quantidade}?`)) {
                // Submete o formulário de exclusão
                document.getElementById('deleteForm' + estoqueId).submit();
            }
        }
    </script>
@endsection
