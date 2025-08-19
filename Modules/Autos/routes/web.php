<?php

use Illuminate\Support\Facades\Route;
use Modules\Autos\Http\Controllers\AutosController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('autos', AutosController::class)->names('autos');
});
