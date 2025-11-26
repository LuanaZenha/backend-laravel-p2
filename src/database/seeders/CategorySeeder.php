<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Subcategory;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $driver = DB::getDriverName();
        if ($driver === 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('subcategorias')->truncate();
            DB::table('categorias')->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        } else {
            DB::table('subcategorias')->delete();
            DB::table('categorias')->delete();
            DB::statement('DELETE FROM sqlite_sequence WHERE name IN ("categorias","subcategorias")');
        }

        $pcGamer = Category::create(['nome' => 'PC Gamer', 'descricao' => 'Computadores e componentes para jogos']);
        $consoles = Category::create(['nome' => 'Consoles', 'descricao' => 'Videogames e acessórios']);
        $perifericos = Category::create(['nome' => 'Periféricos', 'descricao' => 'Teclados, mouses, monitores, SSDs, memória']);

        foreach ([
            [$pcGamer->id, [
                ['nome' => 'Placas de Vídeo', 'descricao' => 'GPUs dedicadas para alto desempenho', 'preco' => 1999.90, 'marca' => 'NVIDIA', 'tipo' => 'GPU'],
                ['nome' => 'Processadores', 'descricao' => 'CPUs de múltiplos núcleos', 'preco' => 1299.00, 'marca' => 'AMD', 'tipo' => 'CPU'],
                ['nome' => 'Memória RAM', 'descricao' => 'DDR4 e DDR5 para jogos', 'preco' => 299.90, 'marca' => 'Corsair', 'tipo' => 'RAM'],
                ['nome' => 'SSDs NVMe', 'descricao' => 'Armazenamento rápido PCIe', 'preco' => 399.90, 'marca' => 'Samsung', 'tipo' => 'SSD'],
                ['nome' => 'Gabinetes', 'descricao' => 'Gabinetes ATX/MicroATX com airflow', 'preco' => 499.90, 'marca' => 'NZXT', 'tipo' => 'Gabinete'],
            ]],
            [$consoles->id, [
                ['nome' => 'PlayStation 5', 'descricao' => 'Console Sony PS5', 'preco' => 3499.00, 'marca' => 'Sony', 'tipo' => 'Console'],
                ['nome' => 'Xbox Series X', 'descricao' => 'Console Microsoft Series X', 'preco' => 3499.00, 'marca' => 'Microsoft', 'tipo' => 'Console'],
                ['nome' => 'Nintendo Switch', 'descricao' => 'Console híbrido portátil', 'preco' => 2299.00, 'marca' => 'Nintendo', 'tipo' => 'Console'],
                ['nome' => 'Acessórios de Console', 'descricao' => 'Controles, bases, carregadores', 'preco' => 299.90, 'marca' => 'Diversos', 'tipo' => 'Acessório'],
                ['nome' => 'Jogos Físicos', 'descricao' => 'Mídias físicas para consoles', 'preco' => 299.90, 'marca' => 'Diversos', 'tipo' => 'Jogo'],
            ]],
            [$perifericos->id, [
                ['nome' => 'Teclados Mecânicos', 'descricao' => 'Switches lineares e táteis', 'preco' => 399.90, 'marca' => 'HyperX', 'tipo' => 'Teclado'],
                ['nome' => 'Mouses Gamer', 'descricao' => 'Alta DPI e sensores precisos', 'preco' => 249.90, 'marca' => 'Logitech', 'tipo' => 'Mouse'],
                ['nome' => 'Headsets', 'descricao' => 'Som surround e microfone', 'preco' => 349.90, 'marca' => 'Razer', 'tipo' => 'Headset'],
                ['nome' => 'Monitores', 'descricao' => '144Hz/240Hz e resoluções altas', 'preco' => 1299.00, 'marca' => 'AOC', 'tipo' => 'Monitor'],
                ['nome' => 'Mousepads', 'descricao' => 'Superfícies speed/control', 'preco' => 99.90, 'marca' => 'SteelSeries', 'tipo' => 'Mousepad'],
            ]],
        ] as [$categoriaId, $items]) {
            foreach ($items as $item) {
                Subcategory::create(array_merge($item, ['categoria_id' => $categoriaId]));
            }
        }
    }
}
