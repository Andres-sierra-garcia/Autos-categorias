<?php
use Illuminate\Support\Facades\Route;
use Modules\app\Http\Controllers\AutosController;
/* use Modules\app\Http\Controllers\CategoriaController; */

Route::resource('/autos', AutosController::class);
/* Route::resource('/categorias', CategoriaController::class); */