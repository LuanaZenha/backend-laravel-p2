<div>
    <label>Nome</label>
    <input type="text" name="nome" value="{{ old('nome', $subcategoria->nome ?? '') }}">
    @error('nome')<div>{{ $message }}</div>@enderror
</div>
<div style="margin-top:12px">
    <label>Descrição</label>
    <textarea name="descricao" rows="3">{{ old('descricao', $subcategoria->descricao ?? '') }}</textarea>
    @error('descricao')<div>{{ $message }}</div>@enderror
</div>
<div style="margin-top:12px; display:flex; gap:12px">
    <div style="flex:1">
        <label>Preço</label>
        <input type="text" name="preco" value="{{ old('preco', $subcategoria->preco ?? '') }}">
        @error('preco')<div>{{ $message }}</div>@enderror
    </div>
    <div style="flex:1">
        <label>Marca</label>
        <input type="text" name="marca" value="{{ old('marca', $subcategoria->marca ?? '') }}">
        @error('marca')<div>{{ $message }}</div>@enderror
    </div>
    <div style="flex:1">
        <label>Tipo</label>
        <input type="text" name="tipo" value="{{ old('tipo', $subcategoria->tipo ?? '') }}">
        @error('tipo')<div>{{ $message }}</div>@enderror
    </div>
</div>

