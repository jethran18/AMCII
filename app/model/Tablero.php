<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Tablero extends Model
{
    protected $table = "Tablero";
    protected $fillable = [
        'nombre',
        'fechaCreacion'
    ];

    public function actividades(){
        return $this->hasMany('App\Actividad');
    }
}
