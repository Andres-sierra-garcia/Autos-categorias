<?php

use Illuminate\Support\Facades\Route;
use Modules\Ventas\Http\Controllers\VentasController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('ventas', VentasController::class)->names('ventas');
});
