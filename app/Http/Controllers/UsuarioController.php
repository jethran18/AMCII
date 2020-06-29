<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsuarioCreateRequest;
use App\Usuario;
use DB;

class UsuarioController extends Controller
{
    //
    public function index(){
        
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
            $tableros = DB::table('tableros')
            ->join('actividads', 'actividads.tablero_id', '=', 'tableros.id')
            ->where('actividads.usuario_id', '=', $usuario[0]->id)
            ->select('tableros.id', 'tableros.nombre')
            ->get();

            //recuperar activdades

            return view('principalUsuario', compact('tableros'));
        } else {

        }
        return back()->with('mensaje', $id);
    }
}
