<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;

Route::get('/', function () {
    return redirect()->route('categorias.index');
});

Route::resource('categorias', CategoryController::class);
Route::resource('categorias.subcategorias', SubcategoryController::class);
