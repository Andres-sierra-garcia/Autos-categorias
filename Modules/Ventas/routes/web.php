<?php

use Illuminate\Support\Facades\Route;
use Modules\Ventas\Http\Controllers\VentasController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('ventas', VentasController::class)->names('ventas');
});
