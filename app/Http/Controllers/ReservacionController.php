<?php

namespace App\Http\Controllers;

use App\Models\Reservacion;
use Illuminate\Http\Request;

class ReservacionController extends Controller
{
    // Listado 
    public function index()
    {
        // Ordenamos por fecha 
        $reservaciones = Reservacion::orderBy('fecha', 'asc')->get();
        return view('reservaciones.index', compact('reservaciones'));
    }

    // Formulario de creación (Create)
    public function create()
    {
        return view('reservaciones.create');
    }

    // VALIDACIONES (Store) 
    public function store(Request $request)
    {
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

    // Formulario (Edit)
    public function edit($id)
    {
        $reservacion = Reservacion::findOrFail($id);
        return view('reservaciones.edit', compact('reservacion'));
    }

    // (Update)
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_cliente' => 'required',
            'telefono'       => 'required',
            'numero_personas'=> 'required|integer',
            'fecha'          => 'required|date',
            'hora'           => 'required',
            'estado'         => 'required' 
        ]);

        $reservacion = Reservacion::findOrFail($id);
        $reservacion->update($request->all());

        return redirect()->route('reservaciones.index')
                         ->with('success', '¡Reservación actualizada!');
    }
}