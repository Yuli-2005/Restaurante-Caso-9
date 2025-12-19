<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservacionController;

//  listado 
Route::get('/', function () {
    return redirect()->route('reservaciones.index');
});

//CRUD
Route::resource('reservaciones', ReservacionController::class);