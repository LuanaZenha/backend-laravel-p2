<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('categorias.index', compact('categories'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string'],
        ]);
        Category::create($data);
        return redirect()->route('categorias.index')->with('success', 'Categoria criada');
    }

    public function edit(Category $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Category $categoria)
    {
        $data = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string'],
        ]);
        $categoria->update($data);
        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada');
    }

    public function destroy(Category $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoria excluída');
    }
}

