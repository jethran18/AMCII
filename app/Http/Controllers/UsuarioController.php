<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsuarioCreateRequest;
use App\model\Actividad;
use App\Usuario;
use Carbon\Carbon;
use DB;

class UsuarioController extends Controller
{
    //
    public function index(Request $request){
        $id = $request->id;
        $tableros = DB::table('tableros')
        ->where('tableros.usuario_id', '=', $id)
        ->select('tableros.id', 'tableros.nombre')
        ->get();

        $actividades = DB::table('actividads')
        ->where('actividads.usuario_id', '=', $id)
        ->select('actividads.id', 'actividads.nombre', 'actividads.tablero_id', 'actividads.descripcion', 'actividads.fechaCreacion', 'actividads.status')
        ->get();

        $now = Carbon::now();
        $status = "";
        foreach ($actividades as $actividad){
            $fechaInicial = $actividad->fechaCreacion;
            $fechaActual= date("Y/m/d");
            $dias = (strtotime($fechaActual)-strtotime($fechaInicial))/86400;
            $dias = abs($dias); $dias = floor($dias);
            switch ($dias){
                case $dias < 0:
                    $status = "Retrasada";
                break;
                case $dias = 0 || $dias <= 3:
                    $status = "Proxima a estar retrasada";
                break;
                default:
                    $status = "Pendiente";
                break;
            }
            $actividad->status = $status;
        }

        return view('principalUsuario',['id' =>  $id ], compact('tableros', 'id', 'actividades'));
    }

    public function crearUsuario(UsuarioCreateRequest $request){
       // return $request->all();
        Usuario::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'username' =>  $request->username,
            'password' => $request->password,
            'email' => $request->correo,
            'rol' => 'user'
        ]);
       return back()->with('mensaje', 'Usuario agregado');

    }

    public function UsuarioLogin(Request $request){
        $usuario = DB::table('usuarios')
        ->where('username','=',$request->username)
        ->where('password','=', $request->password)
        ->get();

        //dd($usuario);
    
        if($usuario[0]->rol == 'user'){
            //recuperar tableros
            $id =  $usuario[0]->id;
            //recuperar activdades
            return redirect()->route('principal.usuario',['id' => $id ]);

        } else {

        }
        return back()->with('mensaje', $id);
    }
}
