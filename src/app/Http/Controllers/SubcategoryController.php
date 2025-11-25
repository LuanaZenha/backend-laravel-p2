<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index(Category $categoria)
    {
        $subcategorias = Subcategory::where('categoria_id', $categoria->id)->orderBy('id', 'desc')->get();
        return view('subcategorias.index', compact('categoria', 'subcategorias'));
    }

    public function create(Category $categoria)
    {
        return view('subcategorias.create', compact('categoria'));
    }

    public function store(Request $request, Category $categoria)
    {
        $data = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string'],
            'preco' => ['nullable', 'numeric'],
            'marca' => ['nullable', 'string', 'max:255'],
            'tipo' => ['nullable', 'string', 'max:255'],
        ]);
        $data['categoria_id'] = $categoria->id;
        Subcategory::create($data);
        return redirect()->route('categorias.subcategorias.index', $categoria)->with('success', 'Subcategoria criada');
    }

    public function edit(Category $categoria, Subcategory $subcategoria)
    {
        return view('subcategorias.edit', compact('categoria', 'subcategoria'));
    }

    public function update(Request $request, Category $categoria, Subcategory $subcategoria)
    {
        $data = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string'],
            'preco' => ['nullable', 'numeric'],
            'marca' => ['nullable', 'string', 'max:255'],
            'tipo' => ['nullable', 'string', 'max:255'],
        ]);
        $subcategoria->update($data);
        return redirect()->route('categorias.subcategorias.index', $categoria)->with('success', 'Subcategoria atualizada');
    }

    public function destroy(Category $categoria, Subcategory $subcategoria)
    {
        $subcategoria->delete();
        return redirect()->route('categorias.subcategorias.index', $categoria)->with('success', 'Subcategoria excluída');
    }
}

