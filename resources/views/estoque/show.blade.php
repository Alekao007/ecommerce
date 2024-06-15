@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/estoque.css') }}">

<div class="container">
    <h1>Detalhes do Estoque</h1>
    <p>Quantidade: {{ $estoque->quantidade }}</p>
    <a href="{{ route('estoque.index') }}" class="btn-voltar">Voltar para a lista</a>
</div>
@endsection