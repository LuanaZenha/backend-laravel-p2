@extends('layouts.app')

@section('content')
<h1>Editar Subcategoria</h1>

<form method="POST" action="{{ route('categorias.subcategorias.update', [$categoria, $subcategoria]) }}">
    @csrf
    @method('PUT')
    @include('subcategorias._form')
    <div style="margin-top:12px">
        <button class="btn primary" type="submit">Atualizar</button>
        <a href="{{ route('categorias.subcategorias.index', $categoria) }}" class="btn">Cancelar</a>
    </div>
</form>
@endsection

