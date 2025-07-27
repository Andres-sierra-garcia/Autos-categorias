<?php

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

Route::get('/verCategorias', function () {
    return view('categorias/index');
});
