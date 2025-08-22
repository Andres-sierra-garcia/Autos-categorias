<?php

use Illuminate\Support\Facades\Route;
/* use App\Http\Controllers\AutosController;
use App\Http\Controllers\CategoriaController; */

// Esta es la ruta comodín modificada.
// Le decimos que capture CUALQUIER URL que NO comience con 'api/'.
Route::get('/{any?}', function () {
    return view('welcome'); 
})->where('any', '^(?!api\/).*$');


