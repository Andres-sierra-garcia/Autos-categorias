<?php

use Illuminate\Support\Facades\Route;
use Modules\Prueba\Http\Controllers\PruebaController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('pruebas', PruebaController::class)->names('prueba');
});
