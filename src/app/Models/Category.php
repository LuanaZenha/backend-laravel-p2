<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categorias';
    protected $fillable = ['nome', 'descricao'];

    public function subcategorias()
    {
        return $this->hasMany(Subcategory::class, 'categoria_id');
    }
}
