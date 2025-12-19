<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    //  tabla  migración
    protected $table = 'reservaciones';

    // Campos 
    protected $fillable = [
        'nombre_cliente',
        'telefono',
        'numero_personas',
        'fecha',
        'hora',
        'estado'
    ];

    //manejo profesional de datos 
    protected $casts = [
        'fecha' => 'date',
        'numero_personas' => 'integer',
    ];
}