@extends('layouts.app')

@section('content')
<h1>Editar Categoria</h1>

<form method="POST" action="{{ route('categorias.update', $categoria) }}">
    @csrf
    @method('PUT')
    <div>
        <label>Nome</label>
        <input type="text" name="nome" value="{{ old('nome', $categoria->nome) }}">
        @error('nome')<div>{{ $message }}</div>@enderror
    </div>
    <div style="margin-top:12px">
        <label>Descrição</label>
        <textarea name="descricao" rows="4">{{ old('descricao', $categoria->descricao) }}</textarea>
        @error('descricao')<div>{{ $message }}</div>@enderror
    </div>
    <div style="margin-top:12px">
        <button class="btn primary" type="submit">Atualizar</button>
        <a href="{{ route('categorias.index') }}" class="btn">Cancelar</a>
    </div>
</form>
@endsection