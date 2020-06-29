<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsuarioCreateRequest;
use App\Tablero;
use Carbon\Carbon;
use DB;


class TableroController extends Controller
{
    //
    public function getTableros($id){
        //Recuper todas los tableros 
       
        return $tableros;
    }

    public function crearTablero(UsuarioCreateRequest $request){
       // return $request->all();
        $now = Carbon::now();

        Tablero::create([
            'nombre' => $request->nombre,
            'fechaCreacion' => $now->format('d-m-Y'),
        ]);

        return back()->with('mensaje', 'Tablero agregado');    
    }
}