<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Reservacion extends Model
{
    use SoftDeletes;

    protected $table = 'reservaciones';
    
    protected $fillable = [
        'nombre_cliente', 'telefono', 'numero_personas', 'fecha', 'hora', 'estado'
    ];

    protected $casts = [
        'fecha' => 'date',
        'numero_personas' => 'integer',
        'deleted_at' => 'datetime'
    ];

    
    public static function getReservations()
    {
        return self::orderBy('fecha', 'asc')
                    ->orderBy('hora', 'asc')
                    ->get();
    }

   
    public static function storeReservation($data)
    {
        $data['fecha']  = Carbon::now()->toDateString();
        $data['hora']   = Carbon::now()->toTimeString();
        $data['estado'] = 'confirmada';
        return self::create($data);
    }

    public static function updateReservation($id, $data)
    {
        $reservacion = self::findOrFail($id);
        return $reservacion->update($data);
    }

    public static function deleteReservation($id)
    {
        $reservacion = self::findOrFail($id);
        return $reservacion->delete();
    }
}