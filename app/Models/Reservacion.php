<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Reservacion extends Model
{
    use SoftDeletes; 

    
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
        'deleted_at' => 'datetime' 
    ];
}