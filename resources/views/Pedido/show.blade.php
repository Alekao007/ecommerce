@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/view.css') }}">

<div class="container mx-auto py-4">
    <h1 class="text-2xl font-semibold mb-4">Detalhes do Pedido</h1>
    <div class="pedido-detalhes bg-white shadow-md rounded-lg p-6">
        <p><strong>ID:</strong> {{ $pedido->id }}</p>
        <p><strong>Usuário:</strong> {{ $pedido->usuario->nome }}</p>
        <p><strong>Forma de Pagamento:</strong> {{ $pedido->formaDePagamento->metodo }}</p>
        <p><strong>Total:</strong> R$ {{ number_format($pedido->total, 2, ',', '.') }}</p>
        <p><strong>Status:</strong> {{ $pedido->status }}</p>
        <a href="{{ route('pedidos.index') }}"
            class="inline-block px-4 py-2 mt-4 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
            Voltar para a lista
        </a>
    </div>
</div>
@endsection
