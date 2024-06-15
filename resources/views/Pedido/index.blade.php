@extends('layouts.app')

@section('content')
<div class="container mx-auto py-4">
    <h1 class="text-2xl font-semibold mb-4">Pedidos</h1>
    <a href="{{ route('pedidos.create') }}" class="btn btn-primary mb-4">Adicionar Novo Pedido</a>
    <ul class="space-y-4">
        @foreach ($pedidos as $pedido)
        <li class="flex items-center justify-between px-4 py-2 bg-white shadow-sm rounded-md">
            <div>
                Pedido #{{ $pedido->id }} - Total: R$ {{ number_format($pedido->total, 2, ',', '.') }}
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('pedidos.show', $pedido->id) }}" class="btn btn-info">Ver</a>
                <a href="{{ route('pedidos.edit', $pedido->id) }}" class="btn btn-warning">Editar</a>
                <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $pedido->id }}')">Deletar</button>
                <form id="deleteForm{{ $pedido->id }}" action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </div>
        </li>
        @endforeach
    </ul>
</div>

<script>
    function confirmDelete(pedidoId) {
        if (confirm('Tem certeza que deseja deletar este pedido?')) {
            document.getElementById('deleteForm' + pedidoId).submit();
        }
    }
</script>
@endsection
