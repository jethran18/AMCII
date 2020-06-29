<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsuarioCreateRequest;
use App\Tablero;
use Carbon\Carbon;


class TableroController extends Controller
{
    //
    public function getTableros($id){
        //Recuper todas los tableros 
       
        return $tableros;
    }

    public function crearTablero(TableroCreateRequest $request){
        $now = Carbon::now();

        Tablero::create([
            'nombre' => $request->input('nombreTablero'),
            'fechaCreacion' => $now->format('d-m-Y'),
        ]);

        return back()->with('mensaje', 'Tablero agregado');    
    }
}