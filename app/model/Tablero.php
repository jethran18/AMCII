<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Tablero extends Model
{
    protected $table = "tableros";
    protected $fillable = [
        'nombreTablero',
        'fechaCreacion',
        'usuario_id'
    ];

    public function actividades(){
        return $this->hasMany('App\Actividad');
    }

    public function usuario(){
        return $this->belongsTo('App\Usuario');
    }
}
