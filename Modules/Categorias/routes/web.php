<?php

use Illuminate\Support\Facades\Route;
use Modules\Categorias\Http\Controllers\CategoriasController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('categorias', CategoriasController::class)->names('categorias');
});
