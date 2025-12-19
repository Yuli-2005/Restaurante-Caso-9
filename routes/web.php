<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservacionController;

Route::get('/', function () {
    return redirect()->route('reservaciones.index');
});


Route::resource('reservaciones', ReservacionController::class);