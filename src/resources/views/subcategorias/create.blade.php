@extends('layouts.app')

@section('content')
<h1>Nova Subcategoria em {{ $categoria->nome }}</h1>

<form method="POST" action="{{ route('categorias.subcategorias.store', $categoria) }}">
    @csrf
    @include('subcategorias._form')
    <div style="margin-top:12px">
        <button class="btn primary" type="submit">Salvar</button>
        <a href="{{ route('categorias.subcategorias.index', $categoria) }}" class="btn">Cancelar</a>
    </div>
</form>
@endsection

