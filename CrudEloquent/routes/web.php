<?php

use App\Http\Controllers\UsuariController;
use Illuminate\Support\Facades\Route;

Route::resource('usuaris', UsuariController::class);