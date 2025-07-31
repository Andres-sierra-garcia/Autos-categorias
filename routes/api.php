<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutosController;
use App\Http\Controllers\CategoriaController;

Route::resource('/autos', AutosController::class);
Route::resource('/categorias', CategoriaController::class);