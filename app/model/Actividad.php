<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    //
    protected $table = "Actividad";
    protected $fillable = [
        'nombre',
        'fechaRegistro',
        'descripcion',
        'status'
    ]; 

    public function tablero()
    {
        return $this->belongsTo('App\Tablero');
    }


    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }
}
