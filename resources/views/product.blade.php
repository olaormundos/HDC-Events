@extends('layoults.main')
@section('title', 'Product')

@section('content')
<h1>Página de Produtos</h1>
<br />
<a href="/">Voltar para Home</a> | <a href="/contact">Contato</a>
<br />

@if($id != null)

    <p>Exibindo o produto id {{ $id }}</p>

@else

    <p>Sem resultados para a busca</p>

@endif    

@endsection