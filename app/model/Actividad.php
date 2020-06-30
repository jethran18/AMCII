<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = "actividads";
    protected $fillable = [
        'nombre',
        'fechaCreacion',
        'descripcion',
        'status',
        'tablero_id',
        'usuario_id'
    ];

    public function tablero(){
        return $this->belongsTo('App\Tablero');
    }

    public function usuario(){
        return $this->belongsTo('App\Usuario');
    }
}
