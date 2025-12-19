<?php

namespace App\Http\Controllers;

use App\Models\Reservacion;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReservacionController extends Controller
{
    public function index()
    {
        $reservaciones = Reservacion::orderBy('fecha', 'asc')->get();
        return view('reservaciones.index', compact('reservaciones'));
    }

    public function create()
    {
        return view('reservaciones.create');
    }

    public function store(Request $request)
    {
        $request->merge([
            'fecha'  => Carbon::now()->toDateString(),
            'hora'   => Carbon::now()->toTimeString(),
            'estado' => 'confirmada'
        ]);

        $request->validate([
            'nombre_cliente' => 'required|string|min:3',
            'telefono'       => 'required',
            'numero_personas'=> 'required|integer|min:1',
            'fecha'          => 'required|date',
            'hora'           => 'required',
        ]);

        Reservacion::create($request->all());
        return redirect()->route('reservaciones.index')->with('success', '¡Reserva anotada!');
    }

    public function edit($id)
    {
        $reservacion = Reservacion::findOrFail($id);
        return view('reservaciones.edit', compact('reservacion'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_cliente' => 'required|string',
            'telefono'       => 'required',
            'numero_personas'=> 'required|integer|min:1',
            'fecha'          => 'required|date',
            'hora'           => 'required',
            'estado'         => 'required|string'
        ]);

        $reservacion = Reservacion::findOrFail($id);
        $reservacion->update($request->all());

        return redirect()->route('reservaciones.index')->with('success', '¡Actualizada correctamente!');
    }

    // ESTA ES LA FUNCIÓN QUE DABA ERROR - Ya está corregida
    public function destroy($id)
    {
        $reservacion = Reservacion::findOrFail($id);
        $reservacion->delete(); 

        return redirect()->route('reservaciones.index')->with('success', 'Movida al historial.');
    }
}