@extends('layouts.app')

@section('content')
    <!-- Inclua o Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <div class="container">
        <h1 class="text-center">Formas de Pagamento</h1>
        <a href="{{ route('formaPagamento.create') }}" class="btn btn-primary mb-3">Adicionar Nova Forma de Pagamento</a>

        <ul class="list-group">
            @foreach ($formas as $forma)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Método: {{ $forma->metodo }}
                    <div class="btn-group" role="group">
                        <a href="{{ route('formaPagamento.show', $forma->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('formaPagamento.edit', $forma->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <!-- Botão de deletar com alerta de confirmação -->
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $forma->id }}', '{{ $forma->metodo }}')">Deletar</button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- JavaScript do Bootstrap (coloque antes do fechamento do body) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
        function confirmDelete(formaId, formaMetodo) {
            if (confirm(`Tem certeza que deseja excluir a forma de pagamento "${formaMetodo}"?`)) {
                // Submete o formulário de exclusão
                document.getElementById('deleteForm' + formaId).submit();
            }
        }
    </script>
@endsection
