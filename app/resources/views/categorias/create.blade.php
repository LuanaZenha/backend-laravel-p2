@extends('layouts.app')

@section('content')
<h1>Nova Categoria</h1>

<form method="POST" action="{{ route('categorias.store') }}">
    @csrf
    <div>
        <label>Nome</label>
        <input type="text" name="nome" value="{{ old('nome') }}">
        @error('nome')<div>{{ $message }}</div>@enderror
    </div>
    <div style="margin-top:12px">
        <label>Descrição</label>
        <textarea name="descricao" rows="4">{{ old('descricao') }}</textarea>
        @error('descricao')<div>{{ $message }}</div>@enderror
    </div>
    <div style="margin-top:12px">
        <button class="btn primary" type="submit">Salvar</button>
        <a href="{{ route('categorias.index') }}" class="btn">Cancelar</a>
    </div>
</form>
@endsection