<?php

use Illuminate\Support\Facades\Route;
use Modules\Prueba\Http\Controllers\PruebaController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('pruebas', PruebaController::class)->names('prueba');
});
