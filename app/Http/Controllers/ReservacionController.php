<?php

namespace App\Http\Controllers;

use App\Models\Reservacion;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReservacionController extends Controller
{
    public function index()
{
    $reservaciones = Reservacion::getReservations(); 
    
    return view('reservaciones.index', compact('reservaciones'));
}

    public function create()
    {
        return view('reservaciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_cliente' => 'required|string|min:3',
            'telefono'       => 'required',
            'numero_personas'=> 'required|integer|min:1',
        ]);

        $data = $request->all();
        $data['fecha']  = Carbon::now()->toDateString();
        $data['hora']   = Carbon::now()->toTimeString();
        $data['estado'] = 'confirmada';

        Reservacion::create($data);
        
        return redirect()->route('reservaciones.index')->with('success', '¡Reserva anotada con éxito!');
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

        return redirect()->route('reservaciones.index')->with('success', '¡Reserva actualizada!');
    }

    public function destroy($id)
    {
        $reservacion = Reservacion::findOrFail($id);
        $reservacion->delete(); 

        return redirect()->route('reservaciones.index')->with('success', 'Se movió al historial correctamente.');
    }
}