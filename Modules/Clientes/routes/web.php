<?php

use Illuminate\Support\Facades\Route;
use Modules\Clientes\Http\Controllers\ClientesController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('clientes', ClientesController::class)->names('clientes');
});
