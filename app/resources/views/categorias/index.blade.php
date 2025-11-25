@extends('layouts.app')

@section('content')
<div class="row">
    <h1>Categorias</h1>
    <a href="{{ route('categorias.create') }}" class="btn primary">Nova Categoria</a>
    </div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    @forelse($categories as $categoria)
        <tr>
            <td>{{ $categoria->id }}</td>
            <td>{{ $categoria->nome }}</td>
            <td>{{ $categoria->descricao }}</td>
            <td>
                <a href="{{ route('categorias.edit', $categoria) }}" class="btn warn">Editar</a>
                <form method="POST" action="{{ route('categorias.destroy', $categoria) }}" style="display:inline" onsubmit="return confirm('Excluir esta categoria?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn danger" type="submit">Excluir</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4">Nenhuma categoria encontrada</td>
        </tr>
    @endforelse
    </tbody>
</table>

@endsection