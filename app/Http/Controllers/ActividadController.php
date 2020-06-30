<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ActividadCreateRequest;
use App\model\Actividad;
use Carbon\Carbon;
use DB;


class ActividadController extends Controller
{
    
    //
    public function index(Request $request){
       
        //recuperar todas las actividades 

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

    public function getActividadesUsuario(Request $request) {
        $id = $request->id;
        $headers=['Tablero', 'Actividad', 'Estatus', 'Fecha', 'Realizada' ];
        
        $actividades = DB::table('actividads')
            ->where('actividads.usuario_id', '=', $id)
            ->join('tableros', 'tableros.id', '=', 'actividads.tablero_id')
            ->select('actividads.id', 'actividads.nombre','actividads.status','actividads.fechaCreacion', 'tableros.nombreTablero')
            ->get();
            
        //dd($headers);

        return view('totalActividadesUsuario',['id' =>  $id ], compact('actividaes', 'headers'));
    }

    public function getActividadesAll(){
        $actividades = DB::table('actividads')
        ->join('usuarios', 'actividads.usuario_id', '=', 'usuarios.id')
        ->join('tableros', 'actividads.tablero_id', '=', 'tableros.id')
        ->select('tableros.nombreTablero', 'actividads.nombre','actividads.fechaCreacion','actividads.status', 'usuarios.username')
        ->get();

        //dd($actividades);

        return view('admin_Activities')->with('actividades', $actividades);
    }
}