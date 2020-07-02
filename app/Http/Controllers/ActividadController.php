<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ActividadCreateRequest;
use App\model\Actividad;
use Carbon\Carbon;


class ActividadController extends Controller
{
    
    //
    public function index(Request $request){
        //Recuper todas las actividades 
        
        return 'listo'; 
    }

    public function store(Request $request) {

        $now = Carbon::now();
        Actividad::create([
            'nombre' => $request->nombreActividad,
            'fechaCreacion' => $request->fechaCreacionActividad,
            'descripcion' => $request->descripcionActividad,
            'status' => 'pendiente',
            'tablero_id' => $request->tablero_id,
            'usuario_id' => $request->id,
        ]);

        return redirect()->route('principal.usuario',['id' => $request->id ]);
    }

    public function create(Request $request){
      
    }

    public function edit(Actividad $actividad)
    {
        return view('principal.usuario', compact('actividad'));
    }

    public function update(Request $request, Actividad $actividad)
    {
        $request->validate([
            'nombreActividad' => 'required',
            'descripcionActividad' => 'required',
        ]);
  
        $actividad->update([
            'nombre' => $request->nombreActividad,
            'fechaCreacion' => $request->fechaCreacionActividad,
            'descripcion' => $request->descripcionActividad,
            'tablero_id' => $request->tablero_id,
        ]);
  
        return redirect()->route('principal.usuario', ['id' => $actividad->usuario_id ]);
    }

    public function destroy(Request $request, Actividad $actividad)
    {
        $actividad->delete();
  
        return redirect()->route('principal.usuario',['id' => $actividad->usuario_id ])
                        ->with('success','actividad eliminada correctamente.');
    }
}