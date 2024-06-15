@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes da Forma de Pagamento</h1>
        <p>Método: {{ $forma->metodo }}</p>
        <a href="{{ route('formaPagamento.index') }}" class="btn btn-secondary">Voltar para a lista</a>
    </div>
@endsection
