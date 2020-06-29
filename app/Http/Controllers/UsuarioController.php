<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsuarioCreateRequest;
use App\Usuario;
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

        return view('principalUsuario',['id' =>  $id ], compact('tableros', 'id'));
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
