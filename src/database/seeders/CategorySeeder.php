<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('subcategorias')->truncate();
        DB::table('categorias')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Category::create(['nome' => 'PC Gamer', 'descricao' => 'Computadores e componentes para jogos']);
        Category::create(['nome' => 'Consoles', 'descricao' => 'Videogames e acessórios']);
        Category::create(['nome' => 'Periféricos', 'descricao' => 'Teclados, mouses, monitores, SSDs, memória']);
    }
}
