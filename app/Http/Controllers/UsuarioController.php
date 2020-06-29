<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsuarioCreateRequest;
use App\Usuario;

class UsuarioController extends Controller
{
    //
    public function index(){
        //recuperal al usuario
        $id = 1;
        //recuperar tableros
        $tableros = DB::table('tableros')
        ->join('actividads', 'actividads.tablero_id', '=', 'tableros.id')
        ->where('actividads.usuario_id', '=', $id)
        ->select('tableros.id', 'tableros.nombre')
        ->get();

       return view('principalUsuario');
    }

    public function crearUsuario(UsuarioCreateRequest $request){
       // return $request->all();
        Usuario::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'username' =>  $request->username,
            'password' => $request->password,
            'email' => $request->correo,
            'rol' => 0
        ]);
       return back()->with('mensaje', 'Usuario agregado');

    }

    public function UsuarioLogin(){
        $id = DB::table('Usuario')->where('username', username)->where('password', password)->value('id');
    }
    return back()->with('mensaje', $id);
    }
}
