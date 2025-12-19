<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    //  tabla  migración
    protected $table = 'reservaciones';


    protected $fillable = [
        'nombre_cliente',
        'telefono',
        'numero_personas',
        'fecha',
        'hora',
        'estado'
    ];

    
    protected $casts = [
        'fecha' => 'date',
        'numero_personas' => 'integer',
    ];
}