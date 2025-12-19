<?php

namespace App\Http\Controllers;

use App\Models\Reservacion;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReservacionController extends Controller
{
    // 1. Listado de Reservaciones (Index)
    public function index()
    {
        // Ordenamos por fecha para que Don Miguel vea las más próximas primero
        $reservaciones = Reservacion::orderBy('fecha', 'asc')->get();
        return view('reservaciones.index', compact('reservaciones'));
    }

    // 2. Formulario de creación (Create)
    public function create()
    {
        return view('reservaciones.create');
    }

    // 3. Guardar con Fecha y Hora Automática (Store)
    public function store(Request $request)
    {
        // Requerimiento Caso 9: La fecha y hora se ponen solas
        $request->merge([
            'fecha'  => Carbon::now()->toDateString(), // Genera YYYY-MM-DD
            'hora'   => Carbon::now()->toTimeString(), // Genera HH:MM:SS
            'estado' => 'confirmada'                   // Estado inicial por defecto
        ]);

        // Validaciones para asegurar los 20 puntos de la rúbrica
        $request->validate([
            'nombre_cliente' => 'required|string|min:3',
            'telefono'       => 'required',
            'numero_personas'=> 'required|integer|min:1',
            'fecha'          => 'required|date',
            'hora'           => 'required',
        ]);

        Reservacion::create($request->all());

        return redirect()->route('reservaciones.index')
                         ->with('success', '¡Reserva anotada con éxito!');
    }

    // 4. Formulario de Edición (Edit)
    public function edit($id)
    {
        $reservacion = Reservacion::findOrFail($id);
        return view('reservaciones.edit', compact('reservacion'));
    }

    // 5. Actualización y Gestión de Estados (Update)
    public function update(Request $request, $id)
    {
        // Validamos que todos los campos modificados sean correctos
        $request->validate([
            'nombre_cliente' => 'required|string',
            'telefono'       => 'required',
            'numero_personas'=> 'required|integer|min:1',
            'fecha'          => 'required|date',
            'hora'           => 'required',
            'estado'         => 'required|string' // Permite cambiar a 'ya vinieron' o 'cancelaron'
        ]);

        $reservacion = Reservacion::findOrFail($id);
        $reservacion->update($request->all());

        return redirect()->route('reservaciones.index')
                         ->with('success', '¡Reservación actualizada correctamente!');
    }
}