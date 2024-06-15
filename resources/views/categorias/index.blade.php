@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/categories.css') }}">

    <h1>Categorias</h1>
    <a href="{{ route('categorias.create') }}" class="btn btn-primary">Adicionar Nova Categoria</a>
    <div class="categorias-lista">
        <ul>
            @foreach ($categorias as $categoria)
                <li>
                    {{ $categoria->nome }}
                    <div>
                        <a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning">Editar</a>
                        <!-- Botão de deletar com alerta de confirmação -->
                        <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $categoria->id }}', '{{ $categoria->nome }}')">Deletar</button>
                        <!-- Formulário de exclusão -->
                        <form id="deleteForm{{ $categoria->id }}" action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- JavaScript para confirmar exclusão -->
    <script>
        function confirmDelete(categoriaId, categoriaNome) {
            if (confirm(`Tem certeza que deseja excluir a categoria "${categoriaNome}"?`)) {
                // Mostra o formulário de exclusão e submete-o
                document.getElementById('deleteForm' + categoriaId).style.display = 'block';
                document.getElementById('deleteForm' + categoriaId).submit();
            }
        }
    </script>
@endsection
