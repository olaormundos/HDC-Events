@extends('layoults.main')
@section('title', 'Products')

@section('content')
<h1>Página de Produtos</h1>
<br />
<a href="/">Voltar para Home</a> | <a href="/contact">Contato</a>
<br />

@if($busca != '')

    <p>O usuário está buscando por: {{ $busca }}</p>

@endif

@endsection