<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['nome' => 'Tecnologia', 'descricao' => 'Itens de TI']);
        Category::create(['nome' => 'Livros', 'descricao' => 'Categorias de livros']);
        Category::create(['nome' => 'Casa', 'descricao' => 'Produtos para casa']);
    }
}
