<?php
use Illuminate\Support\Facades\Route;
use Modules\Autos\App\Http\Controllers\AutosController;


Route::resource('/autos', AutosController::class);