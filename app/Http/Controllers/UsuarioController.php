<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsuarioCreateRequest;
use App\model\Usuario;
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

        return view('principalUsuario',['id' =>  $id ], compact('tableros', 'id', 'actividades'));
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
}
