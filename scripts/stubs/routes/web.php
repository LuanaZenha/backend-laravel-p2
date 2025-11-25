<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return redirect()->route('categorias.index');
});

Route::resource('categorias', CategoryController::class);

