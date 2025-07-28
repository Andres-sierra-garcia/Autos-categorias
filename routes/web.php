<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('autos/index');
});

Route::get('/crearAuto', function () {
    return view('autos/create');
});

Route::get('/editarAuto', function () {
    return view('autos/edit');
});

// categorias

Route::get('/verCategorias',CategoriaController::class . '@index');

Route::delete('/categorias/{id}',CategoriaController::class . '@destroy');
