<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TableroCreateRequest;
use App\model\Tablero;
use Carbon\Carbon;


class TableroController extends Controller
{
    
    //
    public function index(){
        //Recuper todas los tableros 
       
        return 'listo'; 
    }

    public function store(Request $request) {

        $now = Carbon::now();

        Tablero::create([
            'nombre' => $request->nombreTablero,
            'fechaCreacion' => $now->format('Y-m-d'),
            'usuario_id' => $request->id,
        ]);

        return redirect()->route('principal.usuario',['id' => $request->id ]);
    }

    public function create(Request $request){
      
    }
}