@extends('layouts.app')

@section('content')
<div class="container mx-auto py-4">
    <h1 class="text-2xl font-semibold mb-4">Editar Pedido</h1>
    <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST" class="space-y-4 max-w-lg">
        @csrf
        @method('PUT')

        <div>
            <label for="usuario_id" class="block text-sm font-medium text-gray-700">Usuário:</label>
            <select name="usuario_id" id="usuario_id"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @foreach ($usuarios as $usuario)
                <option value="{{ $usuario->id }}" {{ $pedido->usuario_id == $usuario->id ? 'selected' : '' }}>
                    {{ $usuario->nome }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="forma_de_pagamento_id" class="block text-sm font-medium text-gray-700">Forma de Pagamento:</label>
            <select name="forma_de_pagamento_id" id="forma_de_pagamento_id"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @foreach ($formasDePagamento as $forma)
                <option value="{{ $forma->id }}" {{ $pedido->forma_de_pagamento_id == $forma->id ? 'selected' : '' }}>
                    {{ $forma->metodo }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="total" class="block text-sm font-medium text-gray-700">Total:</label>
            <input type="number" name="total" id="total" step="0.01" value="{{ $pedido->total }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                required>
        </div>

        <div>
            <label for="status" class="block text-sm font-medium text-gray-700">Status:</label>
            <input type="text" name="status" id="status" value="{{ $pedido->status }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                required>
        </div>

        <div>
            <button type="submit"
                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Atualizar
            </button>
        </div>
    </form>
</div>
@endsection
