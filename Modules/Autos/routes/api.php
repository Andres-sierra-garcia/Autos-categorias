<?php

use Illuminate\Support\Facades\Route;
use Modules\Autos\Http\Controllers\AutosController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('autos', AutosController::class)->names('autos');
});
