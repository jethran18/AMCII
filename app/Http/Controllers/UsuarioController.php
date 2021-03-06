<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsuarioCreateRequest;
use App\Http\Requests\UsuarioLoginController;
use App\model\Actividad;
use Carbon\Carbon;
use App\model\Usuario;
use DB;

class UsuarioController extends Controller
{
    //
    public function index(Request $request){
        $id = $request->id;
        $name = $request->name;

        $tableros = DB::table('tableros')
        ->where('tableros.usuario_id', '=', $id)
        ->select('tableros.id', 'tableros.nombreTablero')
        ->get();

        $actividades = DB::table('actividads')
        ->where('actividads.usuario_id', '=', $id)
        ->select('actividads.id', 'actividads.nombre', 'actividads.tablero_id', 'actividads.descripcion', 'actividads.fechaCreacion', 'actividads.status')
        ->get();

        $now = Carbon::now();
        $status = "";
        foreach ($actividades as $actividad){
            if($actividad->status != "Realizada"){

                $fechaInicial = strtotime($actividad->fechaCreacion);
                $fechaActual= strtotime(date("Y-m-d"));
                $dias = ( $fechaActual - $fechaInicial ) / 86400;
                if($fechaInicial >= $fechaActual){
                    $dias = abs($dias); 
                    $dias = floor($dias);
                    if($dias > 3){
                        $status = "Pendiente";
                    }elseif($dias >= 0){
                        $status = "Proxima a estar retrasada";
                    }
                }else{
                    $status = "Retrasada";
                }
                
                $actividad->status = $status;
            }
        }

        return view('principalUsuario',['id' =>  $id, 'name' => $name], compact('tableros', 'id', 'actividades', 'name'));
    }

    public function getUsuario(Request $request) {
        $id = $request->id;

        $usuario = Usuario::findOrFail($id);

        //dd($usuario);
        return view('infoUsuario',['id' =>  $id ], compact('usuario'));
        
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

    public function UsuarioLogin(UsuarioLoginController $request){
        $usuario = DB::table('usuarios')
        ->where('username','=',$request->username)
        ->where('password','=', $request->password)
        ->first();

        //dd($usuario);
        if($usuario === null){
            //user is not found 
            return view('inicio')->with('mensaje', 'Datos de usuario incorrectos');
        }
     
    
        if($usuario->rol == 'user'){
            //recuperar tableros
            $id =  $usuario->id;
            $name = $request->username;
            //recuperar activdades
            return redirect()->route('principal.usuario',['id' => $id, 'name' => $name]);

        }  else {
            return view('adminMenu');
        }
        
    }

    public function updateUsuario(Request $request) {
        $id = $request->id;

        $usuario = Usuario::findOrFail($id);
        $usuario->nombre = $request->nombre;
        $usuario->apellidos = $request->apellidos;
        $usuario->username = $request->username;
        $usuario->email = $request->correo;

        $usuario->save();


        return redirect()->route('usuario.getUsuario',['id' => $id ]);        
    }

    public function getUsuarios(){
        $usuarios = DB::table('usuarios')
        ->where('rol','=','user')
        ->get();
        //dd($usuarios);

        return view('adminUsers')->with('usuarios', $usuarios);
    }
    
}
