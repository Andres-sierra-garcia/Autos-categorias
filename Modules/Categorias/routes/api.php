<?php

use Illuminate\Support\Facades\Route;
use Modules\Categorias\Http\Controllers\CategoriasController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('categorias', CategoriasController::class)->names('categorias');
});
