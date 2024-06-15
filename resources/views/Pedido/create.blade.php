@extends('layouts.app')

@section('content')
<div class="container mx-auto py-4">
    <h1 class="text-2xl font-semibold mb-4">Criar Novo Pedido</h1>
    <form action="{{ route('pedidos.store') }}" method="POST" class="space-y-4 max-w-lg">
        @csrf

        <div>
            <label for="usuario_id" class="block text-sm font-medium text-gray-700">Usuário:</label>
            <select name="usuario_id" id="usuario_id"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                required>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="forma_de_pagamento_id" class="block text-sm font-medium text-gray-700">Forma de Pagamento:</label>
            <select name="forma_de_pagamento_id" id="forma_de_pagamento_id"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                required>
                @foreach ($formasDePagamento as $forma)
                    <option value="{{ $forma->id }}">{{ $forma->metodo }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="total" class="block text-sm font-medium text-gray-700">Total:</label>
            <input type="number" name="total" id="total" step="0.01"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                required>
        </div>

        <div>
            <label for="status" class="block text-sm font-medium text-gray-700">Status:</label>
            <input type="text" name="status" id="status"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                required>
        </div>

        <div>
            <button type="submit"
                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Salvar
            </button>
        </div>
    </form>
</div>
@endsection
