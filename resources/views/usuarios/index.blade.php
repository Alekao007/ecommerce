@extends('layouts.app')

@section('content')
    <!-- Inclua o Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <div class="container mx-auto py-4">
        <h1 class="text-2xl font-semibold mb-4">Lista de Usuários</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                            <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning">Editar</a>
                            <!-- Botão de deletar com alerta de confirmação -->
                            <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $usuario->id }}', '{{ $usuario->name }}')">Deletar</button>

                            <!-- Formulário de exclusão -->
                            <form id="deleteForm{{ $usuario->id }}" action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('usuarios.create') }}" class="btn btn-success">Adicionar Novo Usuário</a>
    </div>

    <!-- JavaScript do Bootstrap (coloque antes do fechamento do body) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
        function confirmDelete(usuarioId, usuarioNome) {
            if (confirm(`Tem certeza que deseja excluir o usuário ${usuarioNome}?`)) {
                document.getElementById('deleteForm' + usuarioId).submit();
            }
        }
    </script>
@endsection
