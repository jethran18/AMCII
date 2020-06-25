<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsuarioCreateRequest;
use App\Usuario;

class UsuarioController extends Controller
{
    //
    public function index(){
        //recuperar usuarios
        return ('hola');
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
}
