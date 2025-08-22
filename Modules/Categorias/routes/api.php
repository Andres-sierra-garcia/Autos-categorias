<?php

use Illuminate\Support\Facades\Route;
use Modules\Categorias\app\Http\Controllers\CategoriasController;

Route::resource('/categorias', CategoriasController::class);