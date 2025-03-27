<?php

use App\Http\Controllers\UsuariController;
use Illuminate\Support\Facades\Route;

// Redirigir la ruta raíz a usuaris
Route::get('/', function () {
    return redirect('/usuaris');
});

Route::resource('usuaris', UsuariController::class);