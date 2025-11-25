@extends('layouts.app')

@section('content')
<div class="row">
    <h1>Subcategorias de {{ $categoria->nome }}</h1>
    <div>
        <a href="{{ route('categorias.index') }}" class="btn">Voltar</a>
        <a href="{{ route('categorias.subcategorias.create', $categoria) }}" class="btn primary">Nova Subcategoria</a>
    </div>
    </div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Marca</th>
            <th>Tipo</th>
            <th>Preço</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    @forelse($subcategorias as $subcategoria)
        <tr>
            <td>{{ $subcategoria->id }}</td>
            <td>{{ $subcategoria->nome }}</td>
            <td>{{ $subcategoria->marca }}</td>
            <td>{{ $subcategoria->tipo }}</td>
            <td>{{ $subcategoria->preco ? number_format($subcategoria->preco, 2, ',', '.') : '-' }}</td>
            <td>{{ $subcategoria->descricao }}</td>
            <td>
                <a href="{{ route('categorias.subcategorias.edit', [$categoria, $subcategoria]) }}" class="btn warn">Editar</a>
                <form method="POST" action="{{ route('categorias.subcategorias.destroy', [$categoria, $subcategoria]) }}" style="display:inline" onsubmit="return confirm('Excluir esta subcategoria?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn danger" type="submit">Excluir</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7">Nenhuma subcategoria cadastrada</td>
        </tr>
    @endforelse
    </tbody>
    </table>
@endsection

