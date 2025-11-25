<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $table = 'subcategorias';
    protected $fillable = ['categoria_id', 'nome', 'descricao', 'preco', 'marca', 'tipo'];

    public function categoria()
    {
        return $this->belongsTo(Category::class, 'categoria_id');
    }
}

